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
        Schema::create('progress_proyek', function (Blueprint $table) {
            $table->bigIncrements('progres_id');
            $table->unsignedInteger('proyek_id');
            $table->unsignedBigInteger('tahap_id');
            $table->decimal('persen_real', 5, 2);
            $table->date('tanggal');
            $table->text('catatan')->nullable();
            $table->timestamps();

            $table->foreign('proyek_id')
                ->references('proyek_id')
                ->on('proyek')
                ->onDelete('cascade');

            $table->foreign('tahap_id')
                ->references('tahap_id')
                ->on('tahapan_proyek')
                ->onDelete('cascade');
        });

        Schema::create('lokasi_proyek', function (Blueprint $table) {
            $table->bigIncrements('lokasi_id');
            $table->unsignedInteger('proyek_id');
            $table->decimal('lat', 10, 7);
            $table->decimal('lng', 10, 7);
            $table->json('geojson')->nullable();
            $table->timestamps();

            $table->foreign('proyek_id')
                ->references('proyek_id')
                ->on('proyek')
                ->onDelete('cascade');
        });

        Schema::create('kontraktor', function (Blueprint $table) {
            $table->bigIncrements('kontraktor_id');
            $table->unsignedInteger('proyek_id');
            $table->string('nama');
            $table->string('penanggung_jawab')->nullable();
            $table->string('kontak')->nullable();
            $table->text('alamat')->nullable();
            $table->timestamps();

            $table->foreign('proyek_id')
                ->references('proyek_id')
                ->on('proyek')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontraktor');
        Schema::dropIfExists('lokasi_proyek');
        Schema::dropIfExists('progress_proyek');
    }
};

