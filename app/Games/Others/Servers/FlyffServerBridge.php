<?php

namespace Azuriom\Games\Others\Servers;

use Exception;
use Azuriom\Models\User;
use Azuriom\Games\ServerBridge;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Exceptions\HttpResponseException;


class FlyffServerBridge extends ServerBridge
{
    public function getServerData()
    {
        try {
            config(['database.odbc.odbc_datasource_name' => config('CHARACTER_01_DBF', 'character01')]);
            $connected = DB::table('CHARACTER_TBL')->where('MultiServer', '1')->count();

            config(['database.odbc.odbc_datasource_name' => config('LOGGING_01_DBF', 'log01')]);
            $users_max = DB::connection('flyff.LOGGING_01_DBF')
                ->table('LOG_USER_CNT_TBL')->select('number')->orderByDesc('number')->first()->number;

            return [
                'players' => $connected,
                'max_players' => $users_max,
            ];
        } catch (Exception $e) {
            return null;
        }
    }

    /**
     * If we can navigate on the site, DB is enough to send items
     */
    public function verifyLink()
    {
        return true;
    }

    /**
     * 'm_idPlayer' and 'm_nServer' are set if the user open the shop in-game
     * using session vars set in the theme.
     * 
     * $player_name_if_website is set by user when paying in the theme
     * 
     * if the shop has been open on regular navigator we look for the character
     * with $player_name_if_website if none is provided it fallback
     * on the first character that is not deleted using the Azuriom_user_id
     * in ACCOUNT_DBF
     * 
     * if 
     * 
     * the character is connected in game webshop interface or MultiServer !=0
     * We will use TCP socket to the WorldServer to send the items
     * 
     * else
     * 
     * insert into the database (the game will handle it in the next login of the character)
     * 
     * endif
     * 
     * @return void
     */
    public function sendCommands(array $commands, User $user = null, bool $needConnected = false)
    {

        $id_Player = session('m_idPlayer');
        $id_Server = session('m_nServer');
        $is_connected = true;


        if (empty($id_Player) || empty($id_Server)) {
            $player_name_if_website = request()->flyff_player_name;

            $character = null;

            if(empty($player_name_if_website)) { // if user didn't add username fallback to first character
                config(['database.odbc.odbc_datasource_name' => config('ACCOUNT_DBF', 'login')]);
                $account = DB::table('ACCOUNT_TBL')
                ->select('account')->where('Azuriom_user_id', $user->id)->first();
        
                config(['database.odbc.odbc_datasource_name' => config('CHARACTER_01_DBF', 'character01')]);
                $character = DB::table('CHARACTER_TBL')
                ->select('m_idPlayer', 'serverindex', 'MultiServer')->where([ //get first not deleted character
                    ['account', $account->account],
                    ['isblock', 'F']
                ])->first();
            } else {
                config(['database.odbc.odbc_datasource_name' => config('CHARACTER_01_DBF', 'character01')]);
                $character = DB::table('CHARACTER_TBL')
                ->select('m_idPlayer', 'serverindex', 'MultiServer')->where([ //get first not deleted character
                    ['m_szName', $player_name_if_website],
                    ['isblock', 'F']
                ])->first();
            }

            if(!$character) {
                abort(403,'Character not found');
            }
                

            if($character->MultiServer != '0')
                $is_connected = false;
            

            $id_Player =  $character->m_idPlayer;
            $id_Server = $character->serverindex;
        } else {
            $id_Player = str_pad($id_Player, 7, "0", STR_PAD_LEFT);
            $id_Server = str_pad($id_Server, 2, "0", STR_PAD_LEFT);
        }

        
        $socket = null;
        if($is_connected) {
            $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
            if(!socket_connect($socket, "127.0.0.1", 29000)){
                socket_close($socket);
                throw new Exception('Worldserver unreachable, verify the port');
            }
            
        }
        foreach ($commands as $command) {
            $name_and_id = explode(',', $command);// name, id, quantity

            if($is_connected) {
                $packet = pack("VVVVV", $id_Server, $id_Player, 0, trim($name_and_id[1]), trim($name_and_id[2])) . str_pad("8b8d0c753894b018ce454b2e", 21, ' ') . pack("V", 1);
                socket_write($socket, $packet, strlen($packet));

            } else {
                config(['database.odbc.odbc_datasource_name' => config('CHARACTER_01_DBF', 'character01')]);
                $res = DB::table('ITEM_SEND_TBL')
                ->insert([
                    'm_idPlayer' => $id_Player,
                    'serverindex' => $id_Server,
                    'Item_Name' => trim($name_and_id[0]),
                    'Item_count' => trim($name_and_id[2]),
                    'idSender' => '0000000',
                    'adwItemId0' => trim($name_and_id[1])
                ]);
            }
        }

        if($socket)
            socket_close($socket);
    }

    public function canExecuteCommand()
    {
        return true;
    }
}