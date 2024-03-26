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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('bank_id')->nullable()->constrained();
            $table->foreignId('status_id')->default(4)->constrained();
            $table->foreignId('payment_id')->nullable()->constrained();
            $table->string('description');
            $table->float('amount', 8, 2)->nullable();
            $table->date('due_date');
            $table->text('notes')->nullable();
            $table->boolean('repeat')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
