<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class biodata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_biodata', function (Blueprint $table){
            $table->id();
            $table->integer('user_id');
            $table->string('foto');
            $table->double('age');
            $table->date('bhirtday');
            $table->string('alamat');
            $table->string('phone');
            $table->enum('gender', ['male','female']);
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
        //
    }
}
