<?php

namespace App\Models;

use App\Models\SuratMasuk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Disposisi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function suratmasuk()
    {
        return $this->belongsTo(SuratMasuk::class, 'surat_masuk_id', 'id');
    }
}
