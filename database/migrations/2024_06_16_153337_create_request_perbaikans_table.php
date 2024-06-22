<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestPerbaikansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_perbaikans', function (Blueprint $table) {
            $table->id();
            $table->uuid('employees_id')->index();
            $table->string('details');
            $table->string('status');
            $table->string('damage');
            $table->timestamps();

            $table->foreign('employees_id')->references('id')->on('employees')->onDelete('cascade'); // koneksi dengan table user
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request_perbaikans');
    }
}
