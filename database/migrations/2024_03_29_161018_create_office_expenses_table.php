<?php

use App\Models\ExpenseCategory;
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
        Schema::create('office_expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ExpenseCategory::class)->nullable()->constrained();
            $table->date('expense_date');
            $table->string('expense_name', 100);
            $table->string('office_expense_description', 255)->nullable();
            $table->double('office_expense_amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('office_expenses');
    }
};
