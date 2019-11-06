<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DataFeedConfig4 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_feed_config', function (Blueprint $table) {
            $table->bigInteger('category_config_id')->after('active_state');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('data_feed_config', function (Blueprint $table) {
            $table->dropColumn('category_config_id');
        });
    }
}
