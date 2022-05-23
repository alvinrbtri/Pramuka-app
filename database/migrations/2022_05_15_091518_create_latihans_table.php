<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('latihans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenislatihan_id');
            $table->foreignId('user_id');
            $table->string('judul');
            $table->string('slug');
            $table->string('image')->nullable();
            $table->text('deskripsi');
            $table->text('soal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('latihans');
    }
};
