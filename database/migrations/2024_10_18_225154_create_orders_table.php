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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('author');
            $table->string('unique_id');
            $table->integer('total_price')->default(0);
            $table->integer('paid_price')->nullable();
            $table->integer('due')->default(0);
            $table->date('date');
            $table->boolean('view')->default(false);
            $table->boolean('approve')->default(false);
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
