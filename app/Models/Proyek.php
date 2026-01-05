<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    protected $table      = 'proyek';
    protected $primaryKey = 'proyek_id';

    protected $fillable   = [
        'kode_proyek',
        'nama_proyek',
        'tahun',
        'lokasi',
        'anggaran',
        'sumber_dana',
        'deskripsi',
        'dokumen',
    ];

    public function tahapan()
    {
        return $this->hasMany(TahapanProyek::class, 'proyek_id', 'proyek_id');
    }

    public function progress()
    {
        return $this->hasMany(ProgressProyek::class, 'proyek_id', 'proyek_id');
    }

    public function lokasiProyek()
    {
        return $this->hasMany(LokasiProyek::class, 'proyek_id', 'proyek_id');
    }

    public function kontraktor()
    {
        return $this->hasMany(Kontraktor::class, 'proyek_id', 'proyek_id');
    }
}
