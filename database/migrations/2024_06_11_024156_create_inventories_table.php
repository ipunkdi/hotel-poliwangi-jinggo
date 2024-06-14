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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('unit_id')->constrained(
                table: 'units',
                indexName: 'inventories_units_id'
            )->default(1);
            $table->foreignId('unit_group_id')->constrained(
                table: 'unit_groups',
                indexName: 'units_unit_groups_id'
            )->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
