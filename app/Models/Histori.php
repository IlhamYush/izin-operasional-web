<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Histori extends Model
{
    use HasFactory;

    protected $table = 'histori';

    protected $fillable = [
        'id_kantor', 'nama_kantor', 'jenis_kantor', 
        'pso_non_pso', 'kcu_kc', 'nomor_nde', 'tanggal_nde', 
        'pejabat_pengirim_nde', 'regional', 'jenis_pengajuan', 
        'biaya_yang_diajukan', 'masa_sewa', 'tmt', 'sd', 
        'kinerja_2021', 'kinerja_2022', 'kinerja_2023', 
        'tanggal_submit_surat', 'perihal', 'keterangan', 
        'status', 'tanggal_edit', 'action_type', 'AlasanPenghapusan' // Kolom baru
    ];
}