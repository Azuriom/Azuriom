<?php

namespace Azuriom\Games\Others\Servers;

use Azuriom\Games\ServerBridge;
use Azuriom\Models\User;
use Illuminate\Support\Facades\DB;
use RuntimeException;

/**
 * CHARACTER_01_DBF
 * LOGGING_01_DBF
 * ACCOUNT_DBF.
 */
class FlyffServerBridge extends ServerBridge
{
    protected const DEFAULT_PORT = 29000;

    /**
     * Here the $users_max represents the record of users connected simultaneously.
     */
    public function getServerData()
    {
        $connected = DB::table('CHARACTER_01_DBF.dbo.CHARACTER_TBL')->where('MultiServer', '1')->count();
        $users_max = (int) DB::table('LOGGING_01_DBF.dbo.LOG_USER_CNT_TBL')->select('number')->orderByDesc('number')->first()->number;

        return [
            'players' => $connected,
            'max_players' => $users_max,
        ];
    }

    /**
     * We check if the table CHARACTER_01_DBF.dbo.BASE_VALUE_TBL contains atleast one value
     * it means the flyff database is properly setup and accessible, enough to send items.
     */
    public function verifyLink()
    {
        return DB::table('CHARACTER_01_DBF.dbo.BASE_VALUE_TBL')->count() > 0;
    }

    /**
     * $m_idPlayer and $m_nServer are set if the user open the shop in-game
     * using session vars set in the default theme.
     *
     * $player_name_if_navigator is set with the theme when the user buy in the shop
     * outside of the game, from his phone for example.
     */
    public function sendCommands(array $commands, User $user = null, bool $needConnected = false)
    {
        if ($user === null) {
            throw new RuntimeException('User is required to send commands.');
        }

        $id_Player = session('m_idPlayer');
        $id_Server = session('m_nServer');
        $player_name_if_navigator = request()->flyff_player_name;

        if (empty($id_Player) || empty($id_Server)) {
            $this->get_character_from_name_or_fallback($player_name_if_navigator, $user, $id_Player, $id_Server);
        } else {
            $id_Player = str_pad($id_Player, 7, '0', STR_PAD_LEFT); //formating nothing important
            $id_Server = str_pad($id_Server, 2, '0', STR_PAD_LEFT);
        }

        if ($this->character_is_connected($id_Player, $id_Server)) {
            $this->send_items_with_socket($id_Player, $id_Server, $commands);
        } else {
            $this->send_items_with_database($id_Player, $id_Server, $commands);
        }
    }

    public function canExecuteCommand()
    {
        return true;
    }

    public function getDefaultPort()
    {
        return self::DEFAULT_PORT;
    }

    private function get_character_from_name_or_fallback($player_name_if_navigator, $user, &$id_Player, &$id_Server)
    {
        if (empty($player_name_if_navigator)) {
            //this is the fallback, it gets the first character, not deleted of the Azuriom connected user.
            $account = DB::table('ACCOUNT_DBF.dbo.ACCOUNT_TBL')
                ->select('account')->where('Azuriom_user_id', $user->id)->first();

            $character = DB::table('CHARACTER_01_DBF.dbo.CHARACTER_TBL')
                ->select('m_idPlayer', 'serverindex', 'MultiServer')
                ->where(
                    [
                        ['account', $account->account],
                        ['isblock', 'F'],
                    ])->first();

            $id_Player = $character->m_idPlayer;
            $id_Server = $character->serverindex;
        } else {
            $character = DB::table('CHARACTER_01_DBF.dbo.CHARACTER_TBL')
                ->select('m_idPlayer', 'serverindex', 'MultiServer')
                ->where([ //get first not deleted character
                    ['m_szName', $player_name_if_navigator],
                    ['isblock', 'F'],
                ])->first();

            if (! $character) {
                abort(403, 'Character not found');
            }

            $id_Player = $character->m_idPlayer;
            $id_Server = $character->serverindex;
        }
    }

    private function character_is_connected($id_Player, $id_Server)
    {
        $character = DB::table('CHARACTER_01_DBF.dbo.CHARACTER_TBL')
            ->select('MultiServer')
            ->where([ //get first not deleted character
                ['m_idPlayer', $id_Player],
                ['serverindex', $id_Server],
            ])->first();

        return $character->MultiServer === '1';
    }

    /**
     * $command should look like : 26228,Elixir of Stone,1
     * which is : id,name,quantity.
     */
    private function send_items_with_database($id_Player, $id_Server, $commands)
    {
        foreach ($commands as $command) {
            $id_name_quantity = explode(',', $command);
            DB::table('CHARACTER_01_DBF.dbo.ITEM_SEND_TBL')
                ->insert([
                    'm_idPlayer' => $id_Player,
                    'serverindex' => $id_Server,
                    'Item_Name' => trim($id_name_quantity[1]),
                    'Item_count' => trim($id_name_quantity[2]),
                    'idSender' => '0000000',
                    'adwItemId0' => trim($id_name_quantity[0]),
                ]);
        }
    }

    private function send_items_with_socket($id_Player, $id_Server, $commands)
    {
        $fp = fsockopen($this->server->address, $this->server->port, $errno, $errstr);
        if (! $fp) {
            throw new RuntimeException("$errstr ($errno)");
        }

        foreach ($commands as $command) {
            $id_name_quantity = explode(',', $command);
            $packet = pack('VVVVV', $id_Server, $id_Player, 0, trim($id_name_quantity[0]), trim($id_name_quantity[2])).str_pad(env('FLYFF_WEBSHOP_KEY', '8b8d0c753894b018ce454b2e'), 21, ' ').pack('V', 1);
            fwrite($fp, $packet);
        }

        if ($fp) {
            fclose($fp);
        }
    }
}
