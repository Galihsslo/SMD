<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class riwayat extends Model
{
    use HasFactory;
    protected $table = "riwayat";
    protected $fillable = ['judul', 'tipe', 'tgl_mulai', 'tgl_akhir', 'info1', 'info2', 'info3', 'isi'];

    //awal menambahkan kolom bantuan untuk format tanggal indo
    protected $appends = ['tgl_mulai_indo', 'tgl_akhir_indo'];

    public function getTgLMulaiIndoAttribute()
    {
        return Carbon::parse($this->attributes['tgl_mulai'])->translatedFormat('d F Y');
    }
    public function getTgLAkhirIndoAttribute()
    {
        if ($this->attributes['tgl_akhir']) {
            //jika tanggal akhir tersedia, maka keluarkan
            return Carbon::parse($this->attributes['tgl_akhir'])->translatedFormat('d F Y');
        } else {
            //jika tidak maka kosongkan
            return 'Prisent';
        }
    }
    //akhir menambahkan kolom bantuan
}
