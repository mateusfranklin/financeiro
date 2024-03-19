<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('account_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        DB::table('account_types')->insert([
            ['name' => 'Personal Account'],
            ['name' => 'Business Account'],
            ['name' => 'Savings Account'],
            ['name' => 'Credit Card'],
            ['name' => 'Loan'],
            ['name' => 'Investment'],
            ['name' => 'Other'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account_types');
    }
};
