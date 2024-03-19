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
        Schema::create('others_loans', function (Blueprint $table) {
            $table->id();

            $table->date('loan_date');
            $table->string('loan_name', 100);
            $table->string('loan_address', 255)->nullable();
            $table->string('loan_reference', 100);
            $table->string('loan_description', 255)->nullable();
            $table->double('loan_amount');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('others_loans');
    }
};
