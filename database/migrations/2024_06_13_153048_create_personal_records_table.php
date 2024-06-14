<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('personal_records', function (Blueprint $table) {
        $table->id();
        $table->foreignId('athlete_id')->constrained()->onDelete('cascade');
        $table->foreignId('movement_id')->constrained()->onDelete('cascade');
        $table->float('value');
        $table->dateTime('date');
        $table->timestamps();
    });
}
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_records');
    }
};
