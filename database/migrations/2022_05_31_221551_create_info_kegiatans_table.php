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
        Schema::create('info_kegiatans', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('slug')->nullable();
            $table->string('image')->nullable();
            $table->string('file')->nullable();
            $table->text('deskripsi');
            $table->text('informasi');
            $table->timestamp('publised_at')->nullable();
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
        Schema::dropIfExists('info_kegiatans');
    }
};
