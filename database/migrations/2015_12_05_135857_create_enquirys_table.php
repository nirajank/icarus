<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnquirysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enquirys', function (Blueprint $table) {
            $table->increments('id');
             $table->string('name');
              $table->string('email');
               $table->string('subject');
                $table->string('message');
                 $table->string('document');
                  $table->dateTime('receive_date');
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
        Schema::drop('enquirys');
    }
}
