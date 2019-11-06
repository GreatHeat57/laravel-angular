<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CategoryConfig extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_config', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('category_name')->nullable();
            $table->string('search_text_0')->nullable();
            $table->string('search_field_0')->nullable();
            $table->string('search_text_1')->nullable();
            $table->string('search_field_1')->nullable();
            $table->string('search_text_2')->nullable();
            $table->string('search_field_2')->nullable();
            $table->string('search_text_3')->nullable();
            $table->string('search_field_3')->nullable();
            $table->string('search_text_4')->nullable();
            $table->string('search_field_4')->nullable();
            $table->string('search_text_5')->nullable();
            $table->string('search_field_5')->nullable();
            $table->string('search_text_6')->nullable();
            $table->string('search_field_6')->nullable();
            $table->string('search_text_7')->nullable();
            $table->string('search_field_7')->nullable();
            $table->string('search_text_8')->nullable();
            $table->string('search_field_8')->nullable();
            $table->string('search_text_9')->nullable();
            $table->string('search_field_9')->nullable();
            $table->json('show_array');
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
        Schema::dropIfExists('category_config');
    }
}
