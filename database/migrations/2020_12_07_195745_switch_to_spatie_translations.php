<?php

use Azuriom\Models\NavbarElement;
use Azuriom\Models\Page;
use Azuriom\Models\Post;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

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
            $table->string('locale')->default('en')->change();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('locale')->default('en')->change();
        });

        Schema::table('navbar_elements', function (Blueprint $table) {
            $table->text('name')->change();
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

        $rawModels = DB::table('navbar_elements')->get();
        foreach ($rawModels as $key => $element) {
            $element = NavbarElement::find($element->id);
            $element
                ->setTranslation('name', $locale, $rawModels[$key]->name)
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
