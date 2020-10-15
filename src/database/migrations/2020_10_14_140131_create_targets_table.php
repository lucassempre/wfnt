<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTargetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('targets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('target', 100)->nullable();
            $table->string('origin', 100)->nullable();
            $table->string('body_type', 10)->nullable();
            $table->string('key', 20);
            $table->text('body')->nullable();
            $table->boolean('show_by_origin')->default(False);
            $table->boolean('one_to_one')->default(False);
            $table->boolean('status')->default(True);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('targets');
    }
}
