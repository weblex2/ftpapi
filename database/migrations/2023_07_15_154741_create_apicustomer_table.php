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
        Schema::create('apicustomer', function (Blueprint $table) {
            $table->id();
            $table->string('lastname',100);
            $table->string('firstname', 100);
            $table->string('counternumber', 20);
            $table->string('street', 80);
            $table->string('plz', 10);
            $table->string('city', 80);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apicustomer');
    }
};
