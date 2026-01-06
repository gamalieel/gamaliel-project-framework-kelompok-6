<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgressProyek extends Model
{
    use HasFactory;

    protected $table = 'progres_proyek';
    protected $primaryKey = 'progres_id';

    protected $fillable = [
        'proyek_id',
        'tahap_id',
        'persen_real',
        'tanggal',
        'catatan',
    ];

    public function proyek()
    {
        return $this->belongsTo(Proyek::class, 'proyek_id', 'proyek_id');
    }

    public function tahapan()
    {
        return $this->belongsTo(TahapanProyek::class, 'tahap_id', 'tahap_id');
    }
}

