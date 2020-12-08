<?php

use Azuriom\Models\Page;
use Azuriom\Models\Post;
use Azuriom\Models\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SwitchToSpatieTranslations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->text('title')->change();
            $table->text('description')->change();
        });

        Schema::table('pages', function (Blueprint $table) {
            $table->text('title')->change();
            $table->text('description')->change();
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->string('locale');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('locale');
        });

        $locale = App::getLocale();

        $rawModels = DB::table('posts')->get();
        foreach ($rawModels as $key => $post) {
            $post = Post::find($post->id);
            $post
                ->setTranslation('title', $locale, $rawModels[$key]->title)
                ->setTranslation('description', $locale, $rawModels[$key]->description)
                ->setTranslation('content', $locale, $rawModels[$key]->content)
                ->save();
        }

        $rawModels = DB::table('pages')->get();
        foreach ($rawModels as $key => $page) {
            $page = Page::find($page->id);
            $page
                ->setTranslation('title', $locale, $rawModels[$key]->title)
                ->setTranslation('description', $locale, $rawModels[$key]->description)
                ->setTranslation('content', $locale, $rawModels[$key]->content)
                ->save();
        }

        DB::table('comments')->update(['locale' => $locale]);
        DB::table('users')->update(['locale' => $locale]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}