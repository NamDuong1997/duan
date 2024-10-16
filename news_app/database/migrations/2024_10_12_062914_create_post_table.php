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
        Schema::create('post', function (Blueprint $table) {
            $table->id()->primary()->autoIncrement();
            // id bài viết tự động tăng
            $table->string("title", 255)->nullable(false);
            // tạo cột title có max length = 255 không được null
            $table->text("content")->nullable(false);
            // nội dung bài viết không được để null
            $table->integer("view")->default(0);
            // lượt xem của bài viết được null
            $table->text("id_catetory")->nullable();
            // thêm id cho danh mục bài viết
            $table->boolean("status")->default(1);
            // trạng thái bài viết, quản lý xoá, hiển thị lên trang ng dùng, giá trị mặc định là true
            $table->timestamps();
            // tạo 2 cột create_at và update_at trong csdl mysql khi migrate 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post');
    }
};
