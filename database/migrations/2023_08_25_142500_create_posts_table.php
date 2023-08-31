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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained("users");
            $table->foreignId("nation_id")->constrained("nations");
            $table->foreignId("border_control_id")->nullable()->constrained("border_controls")->onDelete('cascade');
            $table->foreignId("facility_id")->nullable()->constrained("facilities")->onDelete('cascade');
            $table->foreignId('transportation_id')->nullable()->constrained("transportations")->onDelete('cascade');
            $table->string("airport");
            $table->string("airport_sf");
            $table->string("region");
            $table->string("basic_content");
            $table->string("image_path")->nullable();
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
        Schema::dropIfExists('posts');
    }
};
