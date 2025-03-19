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
        Schema::create('make_bridge_events', function (Blueprint $table) {
            $table->id();
            $table->string('event_name');
            $table->string('type'); // incoming, outgoing
            $table->string('webhook_url');
            $table->integer('credit_cost')->default(0);
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
        Schema::dropIfExists('make_bridge_events');
    }
};
