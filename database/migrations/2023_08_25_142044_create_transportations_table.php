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
        Schema::create('transportations', function (Blueprint $table) {
            $table->id();
            $table->string("train_time")->nullable();
            $table->string("train_cost")->nullable();
            $table->string("train_content")->nullable();
            $table->string("bus_time")->nullable();
            $table->string("bus_cost")->nullable();
            $table->string("bus_content")->nullable();
            $table->string("other_transportation_content")->nullable();
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
        Schema::dropIfExists('transportations');
    }
};
