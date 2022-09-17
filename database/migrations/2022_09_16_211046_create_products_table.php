<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price',8,2);
            $table->string('image');
            $table->text('description')->nullable();
            $table->string('brand')->nullable();
            $table->string('color');
            $table->enum('availability',['inStock', 'soldOut']);
            $table->integer('quantity')->default(1);
            $table->boolean('active')->default(true);
            $table->foreignId('category_id')->constrained()
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
