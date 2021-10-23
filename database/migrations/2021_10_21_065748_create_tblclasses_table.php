<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblclassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblclasses', function (Blueprint $table) {
             $table->increments('class_ID');
            $table->string('cls_code', 200)->nullable();
            $table->string('cls_name', 200)->nullable();
            $table->string('cls_status', 2)->nullable();
            $table->string('cls_description', 200)->nullable();
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
        Schema::dropIfExists('tblclasses');
    }
}
