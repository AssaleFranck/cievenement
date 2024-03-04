<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('vip');
            $table->string('standard');
            $table->boolean('statut')->default(0);
            $table->string('img');
            $table->string('contact_one');
            $table->string('contact_two')->nullable();
            $table->longText('description');
            $table->date('date');
            $table->time('time', $precision = 0);
            $table->string('place');
            $table->string('url');
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
        Schema::dropIfExists('events');
    }
}
