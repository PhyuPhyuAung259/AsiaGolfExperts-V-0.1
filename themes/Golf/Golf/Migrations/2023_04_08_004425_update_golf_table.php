<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('bravo_golfs', function (Blueprint $table) {
            $table->decimal('cart_price', 12,2)->nullable();
            $table->decimal('cart_sharing_price', 12,2)->nullable();
        });

        Schema::table('bravo_golf_dates', function (Blueprint $table) {
            $table->decimal('price', 12,2)->nullable();
            $table->text('time_slot')->nullable();
            $table->decimal('cart_price', 12,2)->nullable();
            $table->decimal('cart_sharing_price', 12,2)->nullable();
        });
    }

    public function down(): void
    {
    }
};
