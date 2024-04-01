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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->string('name');
            $table->string('color')->nullable();
            $table->string('icon')->nullable();
            $table->boolean('section')->default(false);
            $table->integer('sub_category_of')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });



        DB::table('categories')->insert([
            ['name' => 'Alimentação e Mercado'],
            ['name' => 'Assinaturas e serviços'],
            ['name' => 'Bares, Lanchonetes e Restaurantes'],
            ['name' => 'Compras'],
            ['name' => 'Educação'],
            ['name' => 'Família'],
            ['name' => 'Lazer'],
            ['name' => 'Transporte'],
            ['name' => 'Saúde'],
            ['name' => 'Imposto'],
            ['name' => 'Pets'],
            ['name' => 'Trabalho'],
            ['name' => 'Viagem'],
            ['name' => 'Outros'],
        ]);

        DB::table('categories')->insert([
            ['name' => 'Geral', 'section' => true]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
