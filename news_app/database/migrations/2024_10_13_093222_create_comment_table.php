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
        Schema::create('comment', function (Blueprint $table) {
            $table->id()->primary()->autoIncrement();
            $table->string("content")->nullable();
            $table->foreignId("id_user")->constrained('user', 'id')->nullable(false);
            // tạo khoá ngoại tham chiếu đến khoá chính id của bảng user
            $table->foreignId("id_post")->constrained("post", 'id')->nullable(false);
            $table->integer("status")->default(1);
            // trạng thái đã comment được duyêt hiển thị là 1, bị ẩn là 0
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment');
    }
};
