<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    use HasFactory;

    protected $table = 'hasil';
    protected $primaryKey = 'id_hasil';

    protected $fillable = [
        'user_id',
        'tanggal_diagnosa',
        'penyakit_kode',
        'gejala_dan_kepercayaan',
        'persentase',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class, 'penyakit_kode', 'kode_penyakit');
    }
}
