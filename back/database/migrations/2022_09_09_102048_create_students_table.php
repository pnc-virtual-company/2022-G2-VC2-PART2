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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');;
            $table->string('generation');
            $table->string('phone');
            $table->string('class')->nullable();
            $table->string('major')->nullable();
            $table->string('tutor')->nullable();
            $table->string('reasons')->nullable();
            $table->date('date_of_birth');
            $table->boolean('status');
            $table->boolean('show_comment')->default(false);
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
        Schema::dropIfExists('students');
    }
};
