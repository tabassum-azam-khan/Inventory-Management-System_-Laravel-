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
        $table->string('product_code')->nullable()->unique();
        $table->string('product_type')->nullable();
        $table->string('product_weight')->nullable();
        $table->string('status');
        $table->text('remarks')->nullable();
        $table->string('generic_name')->nullable();
        $table->float('qty_alert', 8, 2)->nullable();
        $table->decimal('opening_quantity', 8, 2)->nullable();
        $table->string('barcode')->nullable()->unique();
        $table->foreignId('category_id')->constrained('product_categories')->onDelete('cascade');
        $table->foreignId('sub_category_id')->constrained('sub_categories')->onDelete('cascade');
        $table->foreignId('unit_id')->constrained('units')->onDelete('cascade');
        $table->timestamps();
        $table->softDeletes();
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
