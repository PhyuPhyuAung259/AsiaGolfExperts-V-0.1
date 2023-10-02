<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigrationToNewCore extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            if(!Schema::hasColumn('users','user_social')){
                $table->text('user_social')->nullable();
            }
            if(!Schema::hasColumn('users','review_score')){
                $table->decimal('review_score',2,1)->nullable();
            }
        });
        Schema::table('core_pages', function (Blueprint $table) {
            if(!Schema::hasColumn('core_pages','header_style')){
                $table->string('header_style')->nullable();
            }
        });
        Schema::table('bravo_attrs', function (Blueprint $table) {
            if(!Schema::hasColumn('bravo_attrs','deleted_at')){
                $table->softDeletes();
            }
            if (!Schema::hasColumn('bravo_attrs', 'hide_in_filter_search')) {
                $table->tinyInteger('hide_in_filter_search')->nullable();
            }
            if (!Schema::hasColumn('bravo_attrs', 'position')) {
                $table->smallInteger('position')->nullable();
            }
        });
        Schema::table('bravo_terms', function (Blueprint $table) {
            if(!Schema::hasColumn('bravo_terms','deleted_at')){
                $table->softDeletes();
            }
            if (!Schema::hasColumn('bravo_terms', 'image_id')) {
                $table->bigInteger('image_id')->nullable();
            }
        });
        Schema::table('core_news', function (Blueprint $table) {
            if(!Schema::hasColumn('core_news','is_featured')){
                $table->tinyInteger('is_featured')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('new_core', function (Blueprint $table) {
            //
        });
    }
}
