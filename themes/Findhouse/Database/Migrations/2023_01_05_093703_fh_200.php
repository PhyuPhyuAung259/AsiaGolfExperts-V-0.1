<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('core_pages', function (Blueprint $table) {
            if(!Schema::hasColumn('core_pages','body_width')){
                $table->string('body_width')->nullable();
            }
        });
        Schema::table('bravo_properties', function (Blueprint $table) {
            if(!Schema::hasColumn('bravo_properties','author_id')){
                $table->bigInteger('author_id')->nullable();
            }
        });
        Schema::table('bravo_agencies', function (Blueprint $table) {
            if(!Schema::hasColumn('bravo_agencies','author_id')){
                $table->bigInteger('author_id')->nullable();
            }
        });
        Schema::table('bravo_locations', function (Blueprint $table) {
            if(!Schema::hasColumn('bravo_locations','banner_image_id')) {
                $table->integer('banner_image_id')->nullable();
                $table->text('trip_ideas')->nullable();
            }
        });
        Schema::table('bravo_location_translations', function (Blueprint $table) {
            if(!Schema::hasColumn('bravo_location_translations','trip_ideas')) {
                $table->text('trip_ideas')->nullable();
            }
        });
        Schema::table('bravo_terms', function (Blueprint $table) {
            if (!Schema::hasColumn('bravo_terms', 'icon')) {
                $table->string('icon',50)->nullable();
            }
        });

        Schema::table('bravo_agencies', function (Blueprint $table) {
            if (!Schema::hasColumn('bravo_agencies', 'is_sold')) {
                $table->tinyInteger('is_sold')->nullable();
            }
        });

        if (!Schema::hasTable('bravo_property_category_translations')) {
            Schema::create('bravo_property_category_translations', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->integer('origin_id')->unsigned();
                $table->string('locale')->index();

                $table->string('name', 255)->nullable();
                $table->text('content')->nullable();

                $table->bigInteger('create_user')->nullable();
                $table->bigInteger('update_user')->nullable();

                $table->unique(['origin_id', 'locale']);

                $table->softDeletes();
                $table->timestamps();
            });
        }
        if (!Schema::hasTable('bravo_agencies_translations')) {
            Schema::create('bravo_agencies_translations', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->integer('origin_id')->unsigned();
                $table->string('locale')->index();

                $table->string('name', 255)->nullable();
                $table->text('content')->nullable();

                $table->bigInteger('create_user')->nullable();
                $table->bigInteger('update_user')->nullable();

                $table->unique(['origin_id', 'locale']);

                $table->softDeletes();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('user_upgrade_request')) {
            Schema::create('user_upgrade_request', function (Blueprint $table) {
                //
                $table->bigIncrements('id');
                $table->integer('user_id')->nullable();
                $table->integer('role_request')->nullable();
                $table->dateTime('approved_time')->nullable();
                $table->string('status', 50)->nullable();
                $table->integer('approved_by')->nullable();
                $table->integer('create_user')->nullable();
                $table->integer('update_user')->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }
        if (Schema::hasTable('agencies_agent')) {
            Schema::rename('agencies_agent','bravo_agencies_agent');
        }

        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'business_name')) {
                $table->string('business_name',255)->nullable();
            }
        });

        Schema::table('bravo_booking_payments', function (Blueprint $table) {
            if (!Schema::hasColumn('bravo_booking_payments', 'code')) {
                $table->string('code', 64)->nullable();
                $table->bigInteger('object_id')->nullable();
                $table->string('object_model', 40)->nullable();
                $table->text('meta')->nullable();
            }
            if (!Schema::hasColumn('bravo_booking_payments', 'deleted_at')) {
                $table->softDeletes();
            }
            if (!Schema::hasColumn('bravo_booking_payments', 'wallet_transaction_id')) {
                $table->bigInteger('wallet_transaction_id')->nullable();
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
        //
    }
};
