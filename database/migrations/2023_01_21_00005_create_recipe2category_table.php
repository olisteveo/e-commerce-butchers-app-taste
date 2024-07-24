<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipe2category', function (Blueprint $table) {
            $table->foreignId(column:'recipe_id')->constrained()->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId(column:'category_id')->constrained()->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipe2category');
    }
};
