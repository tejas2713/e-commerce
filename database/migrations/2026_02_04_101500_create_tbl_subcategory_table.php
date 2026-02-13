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
        Schema::create('tbl_subcategory', function (Blueprint $table) {
            $table->integer("sub_category_id")->autoIncrement();
            $table->string("sub_category_name");
            $table->string("category_id");
            $table->string("sub_category_image");
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(table: 'tbl_subcategory');
    }
};
