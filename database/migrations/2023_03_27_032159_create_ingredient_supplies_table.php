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
        Schema::create('ingredient_supplies', function (Blueprint $table) {
            $table->id();
            $table->string('supplier_name');
            $table->date('supply_date');
            $table->foreignId('ingredient_id')->constrained('ingredients');
            $table->integer('quantity_supplied');
            $table->decimal('unit_cost', 8, 2);
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
        Schema::dropIfExists('ingredient_supplies');
    }
};
