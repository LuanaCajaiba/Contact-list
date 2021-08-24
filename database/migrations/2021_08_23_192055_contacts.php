<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Contacts extends Migration
{

    public function up()
    {
        schema::create('contacts', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('name', 60);
            $table->int('number');
            $table->timestamps();
            $table->softDeletes();
        });
        
    }

    public function down()
    {
        Schema::drop('contacts');
    }
}
