<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DataFeedConfig2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_feed_config', function (Blueprint $table) {
            $table->string('category_alias', 50)->after('active_state');
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
            $table->dropColumn('category_alias');
        });
    }
}
