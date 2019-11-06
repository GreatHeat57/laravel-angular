<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DataFeedConfig extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('data_feed_config')) {
            Schema::create('data_feed_config', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('merchant_name', 50);
                $table->float('interval_hours', 8, 2);
                $table->text('feed_url');
                $table->string('parser_cls', 50)->nullable();
                $table->boolean('active_state')->nullable();

                $table->string('title', 50)->nullable();
                $table->string('price', 50)->nullable();
                $table->string('buy_link', 50)->nullable();
                $table->string('image', 50)->nullable();
                $table->string('descript', 50)->nullable();
                $table->string('travel_type', 50)->nullable();
                $table->string('duration', 50)->nullable();
                $table->string('country', 50)->nullable();
                $table->string('region', 50)->nullable();
                $table->string('city', 50)->nullable();
                $table->string('stars', 50)->nullable();
                $table->string('rating', 50)->nullable();
                $table->string('service_type', 50)->nullable();
                $table->string('allinclusive', 50)->nullable();
                $table->string('departure_date', 50)->nullable();
                $table->string('num_person', 50)->nullable();
                $table->string('num_offer', 50)->nullable();
                $table->string('latitude', 50)->nullable();
                $table->string('longitude', 50)->nullable();
                $table->string('option1', 50)->nullable();
                $table->string('option2', 50)->nullable();
                $table->string('option3', 50)->nullable();
                $table->string('option4', 50)->nullable();
                $table->string('option5', 50)->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_feed_config');
    }
}