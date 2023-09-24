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
        Schema::create('border_controls', function (Blueprint $table) {
            $table->id();
            $table->foreignId("post_id")->constrained("posts");
            $table->integer("arrive_level")->nullable(); //難易度は数字で表す
            $table->text("arrive_content")->nullable();
            $table->integer("depature_level")->nullable();
            $table->text("depature_content")->nullable();
            $table->string("luggage_time")->nullable();
            $table->text("luggage_content")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('border_controls');
    }
};
