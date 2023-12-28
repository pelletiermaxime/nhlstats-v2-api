<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('standings', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('team_id')->unsigned()->nullable();
            $table->smallInteger('year');
            $table->smallInteger('gp');
            $table->smallInteger('w');
            $table->smallInteger('l');
            $table->smallInteger('otl');
            $table->smallInteger('pts');
            $table->smallInteger('row');
            $table->smallInteger('gf');
            $table->smallInteger('ga');
            $table->float('ppp')->nullable();
            $table->float('pkp')->nullable();
            $table->string('home', 10);
            $table->string('away', 10);
            $table->string('l10', 10);
            $table->string('diff', 5);
            $table->string('streak', 10);
            $table->smallInteger('ppg')->nullable();
            $table->smallInteger('ppo')->nullable();
            $table->smallInteger('ppga')->nullable();
            $table->smallInteger('ppoa')->nullable();
            $table->smallInteger('positionOverall')->nullable();
            $table->smallInteger('positionConference')->nullable();

            $table->timestamps();

            $table->foreign('team_id')->references('id')->on('teams');
            $table->index(['year']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('standings');
    }
};
