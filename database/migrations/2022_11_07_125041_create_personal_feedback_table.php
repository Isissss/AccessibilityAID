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
        Schema::create('personal_feedback', function (Blueprint $table) {
            $table->id();
            $table->boolean('feedback_1')->default(0);
            $table->boolean('feedback_2')->default(0);
            $table->boolean('feedback_3')->default(0);
            $table->boolean('feedback_4')->default(0);
            $table->boolean('feedback_5')->default(0);
            $table->boolean('feedback_6')->default(0);
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
        Schema::dropIfExists('personal_feedback');
    }
};
