<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRowsTable extends Migration
{
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rows');
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rows', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string("align")->default("spaced");
            $table->integer('layout_template_id')->unsigned();
            $table->foreign('layout_template_id')
                  ->references('id')->on('layout_templates')
                  ->onDelete('cascade');
            $table->integer('page_id')->unsigned()->nullable();
            $table->foreign('page_id')
                  ->references('id')->on('pages')
                  ->onDelete('cascade');                  
            $table->timestamps();
        });
    }
}
