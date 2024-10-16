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
        Schema::create('image', function (Blueprint $table) {
            $table->id()->primary()->autoIncrement();
            $table->string("path")->nullable();
            // lưu đường dẫn đến ảnh ví dụ public/image/upload
            $table->string("fileName")->nullable();
            $table->string("description")->nullable();
            $table->string("type")->nullable();
            // thumbnail: Hình ảnh thu nhỏ.
            // featured: Hình ảnh đại diện cho một bài viết.
            // gallery: Hình ảnh trong thư viện.
            // avatar: Hình ảnh đại diện cho người dùng.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('image');
    }
};
