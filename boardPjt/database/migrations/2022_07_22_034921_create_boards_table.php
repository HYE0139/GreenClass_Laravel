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
    // 수정사항을 적용
    public function up()
    {
        Schema::create('boards', function (Blueprint $table) {
            $table->id(); //PK
            $table->string('title', 30); //varchart(30)
            $table->string('ctnt');
            $table->integer('hits'); // int
            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

     // 수정사항을 지울 때 
    public function down()
    {
        Schema::dropIfExists('boards');
    }
};
