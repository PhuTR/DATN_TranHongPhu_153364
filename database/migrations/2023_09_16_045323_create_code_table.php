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
        Schema::create('code', function (Blueprint $table) {
            $table->id();
            $table->string('code',6)->nullable();
            $table->bigInteger('user_id')->default(0);
            $table->dateTime('time_start')->nullable();
            $table->tinyInteger('type')->default(0)->comment('1 xác thực số điện thoại','2 rút tiền','3 chuyển tiền'); 
            $table->tinyInteger('status')->default(0)->comment('1 khởi tạo','2 xử lý','3 hoàn thành','4 huỷ');
            $table->string('service','20')->default('')->comment('1 email','2 phone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('code');
    }
};
