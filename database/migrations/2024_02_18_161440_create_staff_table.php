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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();

            $table->string('staff_id', 30)->unique();
            $table->string('staff_name', 100);
            $table->char('staff_mobile_no', 16)->unique();
            $table->string('staff_address', 200)->nullable();
            $table->char('staff_nid_no', 20)->unique()->nullable();
            $table->string('staff_email_address', 100)->nullable();
            $table->double('staff_salary_amount')->default(0);
            $table->string('staff_picture')->nullable();

            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
