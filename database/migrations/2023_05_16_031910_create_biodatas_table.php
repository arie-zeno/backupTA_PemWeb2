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
        Schema::create('biodatas', function (Blueprint $table) {
            $table->id("nim");
            $table->string("foto")->nullable();
            $table->string("name");
            $table->foreignId("user_id");
            $table->year("thnMasuk");
            $table->year("thnLulus")->nullable();
            $table->string("tempatLahir")->nullable();
            $table->date("tglLahir")->nullable();
            $table->string("jk");
            $table->string("agama")->nullable();
            $table->string("kawin")->nullable();
            $table->string("pekerjaan");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biodatas');
    }
};
