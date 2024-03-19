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
        Schema::create('officeexpenses', function (Blueprint $table) {
            $table->id();
            
            // $table->string('expense_id')->uniqe();

            $table->date('expense_date');
            $table->string('expense_name', 100);
            $table->string('office_expense_description', 255)->nullable();
            $table->double('office_expense_amount');

            $table->integer('expense_category_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('officeexpenses');
    }
};
