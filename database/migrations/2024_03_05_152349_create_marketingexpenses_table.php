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
        Schema::create('marketingexpenses', function (Blueprint $table) {
            $table->id();

            $table->date('marketing_expense_date');
            $table->string('expense_name', 100);
            $table->string('marketing_expense_description', 255)->nullable();
            $table->double('marketing_expense_amount');

            $table->string('staff_id')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marketingexpenses');
    }
};
