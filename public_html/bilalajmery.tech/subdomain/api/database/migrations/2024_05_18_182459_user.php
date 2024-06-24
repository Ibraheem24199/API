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
        Schema::create('user', function (Blueprint $table) {
            $table->id('userId');
            $table->text('userName');
            $table->text('email');
            $table->text('password');
            $table->string('image', 200)->nullable();
            $table->string('code', 200)->nullable();
            $table->integer('otp')->default(0);
            $table->timestamp('time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
