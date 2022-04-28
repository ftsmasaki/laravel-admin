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
    public function up()
    {
        Schema::create('license_assignments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('license_id');
            $table->unsignedBigInteger('asset_id');
            $table->string('seat_memo');
            $table->timestamps();
            $table->foreign('license_id')->references('id')->on('licenses');
            $table->foreign('asset_id')->references('id')->on('assets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('license_assignments');
    }
};
