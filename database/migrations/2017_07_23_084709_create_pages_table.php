<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('title');
            $table->string('url')->nullable();
            $table->string('slug');
            $table->integer('parent_id')->default(0);
            $table->integer('display_order')->default(1);
            $table->boolean('published')->default(false);
            $table->integer('step')->default(2);            
            $table->timestamps();
        });
    }
}
