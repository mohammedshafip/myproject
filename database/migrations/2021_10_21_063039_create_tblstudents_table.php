<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblstudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblstudents', function (Blueprint $table) {
            $table->increments('std_ID', 200);
            $table->string('std_firstname', 200)->nullable();
            $table->string('std_lastname', 200)->nullable();
            $table->integer('std_clasID')->unsigned();
            $table->date('std_dateofbirth', 200)->nullable();
            $table->string('std_status', 2)->nullable();            
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
        Schema::dropIfExists('tblstudents');
    }
}
