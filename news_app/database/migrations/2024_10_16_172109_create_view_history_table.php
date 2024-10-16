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
        Schema::create('view_history', function (Blueprint $table) {
            $table->id()->primary()->autoIncrement();
            $table->foreignId("id_post")->constrained("post", 'id')->nullable(false);
            // lưu giữ id của bài viết đã được xem
            $table->foreignId("id_user")->constrained('user', 'id')->nullable(false);
            // lưu giữ id người dùng
            $table->string("ip_address")->nullable();
            // theo dõi địa chỉ mạng nhằm thống kê người dùng, phân tích số liệu, lên chiến lược đăng bài phù hợp
            $table->timestamp('access_time'); 
            // lưu lại thời gian truy cập để theo dõi, thống kê sau này
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('view_history');
    }
};
