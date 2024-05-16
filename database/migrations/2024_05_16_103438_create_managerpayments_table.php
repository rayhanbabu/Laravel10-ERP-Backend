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
        Schema::create('managerpayments', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('dept_id');
            $table->foreign('dept_id')->references('id')->on('depts');

            $table->unsignedBigInteger('pcategory_id');
            $table->foreign('pcategory_id')->references('id')->on('pcategories');

            $table->unsignedBigInteger('site_id');
            $table->foreign('site_id')->references('id')->on('sites');

            $table->unsignedBigInteger('manager_id');
            $table->foreign('manager_id')->references('id')->on('teachers');

            $table->string('reff')->nullable();
            $table->date('date');
            $table->float('amount');
            $table->integer('year');
            $table->integer('month');
            $table->integer('day');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('managerpayments');
    }
};
