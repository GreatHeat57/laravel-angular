<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DataFeedConfig3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_feed_config', function (Blueprint $table) {
            $table->integer('min_price')->after('parser_cls')->nullable();
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
            $table->dropColumn('min_price');
        });
    }
}
