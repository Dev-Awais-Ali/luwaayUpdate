<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorBotiquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_botiques', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fname');
            $table->string('lname'); 
            $table->string('email');
            $table->string('phone_no');           
            $table->string('shop_name');
            $table->string('owner_name');
            $table->string('shop_no');
            $table->string('shop_address');
            $table->string('img');
            $table->string('reg_no');
             $table->integer('country_id'); 
             $table->integer('state_id'); 
             $table->integer('city_id');
            $table->string('zip_code');
            $table->string('password');
            $table->text('desc');


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
        Schema::dropIfExists('vendor_botiques');
    }
}
