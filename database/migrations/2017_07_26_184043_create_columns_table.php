<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColumnsTable extends Migration
{
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('columns');
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('columns', function (Blueprint $table)
        {
            $table->increments('id');
            $table->text("html")->nullable();
            $table->string("size")->default("auto");
            $table->string("small")->nullable();
            $table->string("medium")->nullable();
            $table->string("large")->nullable();
            $table->string("valign")->default("top");
            $table->string("offset")->nullable();
            $table->integer('row_id')->unsigned();
            $table->foreign('row_id')
                  ->references('id')->on('rows')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }
}
