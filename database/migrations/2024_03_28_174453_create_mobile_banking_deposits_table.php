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
        Schema::create('mobile_banking_deposits', function (Blueprint $table) {
            $table->id();

            $table->string('deposit_type');
            $table->date('deposit_date');
            $table->string('depositor_id', 20)->unique();
            $table->string('depositor_name', 100);
            $table->string('depositor_mobile_no', 20)->unique();
            $table->string('txid_no', 100)->unique();
            $table->string('depositor_address', 255)->nullable();
            $table->string('depositor_nid_no', 20)->nullable();
            $table->double('deposit_amount');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobile_banking_deposits');
    }
};
