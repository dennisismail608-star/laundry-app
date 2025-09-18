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
        Schema::create('trans_order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('trans_orders')->onDelete('cascade');
            $table->foreignId('service_id')->constrained('type_of_services')->onDelete('cascade');
            $table->integer('qty');
            $table->integer('subtotal');
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trans_order_details');
    }
};
