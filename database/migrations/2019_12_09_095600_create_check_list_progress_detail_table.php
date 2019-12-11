<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckListProgressDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check_list_progress_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('check_list_progress_id');
            $table->unsignedBigInteger('check_list_id');
            $table->string('picture')->nullable();
            $table->string('note')->nullable();
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('checklist_progress_list');
    }
}
