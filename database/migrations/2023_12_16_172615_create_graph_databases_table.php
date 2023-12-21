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
        Schema::create('graph_databases', function (Blueprint $table) {
            $table->id('graph_id');
            $table->string('citylng')->nullable();
            $table->string('intensity')->nullable();
            $table->string('sector')->nullable();
            $table->string('topic')->nullable();
            $table->string('insight')->nullable();
            $table->string('swot')->nullable();
            $table->string('url')->nullable();
            $table->string('region')->nullable();
            $table->string('start_year')->nullable();
            $table->string('end_year')->nullable();
            $table->string('impact')->nullable();
            $table->timestamp('added')->nullable();
            $table->date('published')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('relevance')->nullable();
            $table->string('pestle')->nullable();
            $table->string('source')->nullable();
            $table->string('title')->nullable();
            $table->string('likelihood')->nullable();
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
        Schema::dropIfExists('graph_databases');
    }
};
