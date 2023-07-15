<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class halaman extends Model
{
    use HasFactory;
    protected $table = "halaman"; //kalau tidak di protect nama menjadi halamen
    protected $fillable = ['judul', 'isi'];
}
