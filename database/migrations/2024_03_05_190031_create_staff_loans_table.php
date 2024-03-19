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
        Schema::create('staff_loans', function (Blueprint $table) {
            $table->id();

            $table->date('staff_loan_date');
            $table->string('staff_address', 255)->nullable();
            $table->string('staff_loan_description', 255)->nullable();
            $table->string('staff_leader_name', 100);
            $table->double('staff_loan_amount');

            $table->string('staff_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_loans');
    }
};
