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
            $table->id()->primary()->autoIncrement();
            $table->string("name", 255)->nullable(false);
            $table->string("email", 255)->nullable(false);
            $table->string("password", 255)->nullable(false);
            $table->integer("role")->default(0);
            // 0 là người dùng, 1 là tác giả, 2 là admin
            $table->string("avartar")->default("image.jpg");
            $table->timestamps();
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
