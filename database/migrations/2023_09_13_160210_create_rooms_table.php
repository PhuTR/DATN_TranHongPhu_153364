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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('avatar')->nullable();
            $table->text('description')->nullable();
            $table->bigInteger('city_id')->default(0);
            $table->bigInteger('district_id')->default(0);
            $table->bigInteger('wards_id')->default(0);
            $table->bigInteger('price')->default(0);
            $table->tinyInteger('range_price')->default(1);
            $table->tinyInteger('range_area')->default(1);
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('hot')->default(0);
            $table->integer('area')->default(0);
            $table->string('images')->nullable();
            $table->integer('count_view')->default(0);
            $table->text('apartment_number')->nullable();
            $table->text('full_address')->nullable();
            $table->text('contents')->nullable();
            $table->datetime('time_start')->nullable()->comment('ngày bắt đầu');
            $table->date('time_stop')->nullable()->comment('ngày kết thúc');
            $table->bigInteger('category_id')->default(0);
            $table->tinyInteger('service_hot')->default(0);
            $table->bigInteger('auth_id')->default(0);
            $table->text('map')->nullable();
            $table->bigInteger('subject_id')->default(0);
            $table->text('video_link')->nullable()->comment('link youtube');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
