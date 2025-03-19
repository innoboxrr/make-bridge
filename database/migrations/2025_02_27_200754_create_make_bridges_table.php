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
        Schema::create('make_bridges', function (Blueprint $table) {
            $table->id();
            $table->string('make_bridgeable_type');
            $table->unsignedBigInteger('make_bridgeable_id');
            $table->boolean('enabled')->default(true);
            $table->json('payload')->nullable();
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
        Schema::dropIfExists('make_bridges');
    }
};
