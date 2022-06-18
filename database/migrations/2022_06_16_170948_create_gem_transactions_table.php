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
        Schema::create('gem_transactions', function (Blueprint $table) {
            $table->id();
            // to describe the transacton for user
            $table->string('title', 50);

            // the amount can be a negative one
            $table->integer('amount');

            // I belive 20 is much more than enough
            $table->string('tag', 20);

            // this one is neccessary
            $table->bigInteger('gem_id')->unsigned();
            
            // this one can be usefull
            $table->bigInteger('user_id')->unsigned();
            
            // is tag enough in all cases?
            // you may need a hidden description
            // $table->text('description');
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
        Schema::dropIfExists('gem_transactions');
    }
};
