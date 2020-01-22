<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckListProgressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check_list_progress', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->date('date');
            $table->integer('location_id');
            $table->text('note')->nullable();
            $table->unsignedBigInteger('check_list_oper_tugas_id')->nullable();
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
        Schema::dropIfExists('check_list_progress');
    }
}
