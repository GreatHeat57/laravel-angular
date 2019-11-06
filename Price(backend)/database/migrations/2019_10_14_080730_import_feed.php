<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ImportFeed extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('import_feed', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('data_feed_config_id');
            $table->bigInteger('category_config_id');
            $table->string('product_id', 50)->nullable();
            $table->longText('title')->nullable();
            $table->longText('price')->nullable();
            $table->longText('buy_link')->nullable();
            $table->longText('image')->nullable();
            $table->longText('descript')->nullable();
            $table->longText('travel_type')->nullable();
            $table->longText('duration')->nullable();
            $table->longText('country')->nullable();
            $table->longText('region')->nullable();
            $table->longText('city')->nullable();
            $table->longText('stars')->nullable();
            $table->longText('rating')->nullable();
            $table->longText('service_type')->nullable();
            $table->longText('allinclusive')->nullable();
            $table->longText('departure_date')->nullable();
            $table->longText('num_person')->nullable();
            $table->longText('num_offer')->nullable();
            $table->longText('latitude')->nullable();
            $table->longText('longitude')->nullable();
            $table->longText('option1')->nullable();
            $table->longText('option2')->nullable();
            $table->longText('option3')->nullable();
            $table->longText('option4')->nullable();
            $table->longText('option5')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('import_feed');
    }
}
