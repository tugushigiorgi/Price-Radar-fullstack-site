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
        Schema::create('item_favourites', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string("title");
            $table->string("image");
            $table->string("price");
            $table->string("detailed_link");
            $table->string("website_picture");






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
