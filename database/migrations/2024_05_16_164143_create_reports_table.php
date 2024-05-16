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
        Schema::create('reports', function (Blueprint $table) {
             $table->id();
             $table->unsignedBigInteger('dept_id');
             $table->foreign('dept_id')->references('id')->on('depts');

             $table->unsignedBigInteger('created_by');
             $table->foreign('created_by')->references('id')->on('teachers');
             $table->string('image')->nullable();
             $table->string('title');
             $table->text('description');
             $table->text('reff')->nullable();
             $table->date('date');
             $table->integer('updated_by')->nullable();
             $table->timestamps();
     
          });
     }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
