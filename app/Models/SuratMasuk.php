<?php

namespace App\Models;

use App\Models\Disposisi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuratMasuk extends Model
{
    
    use HasFactory;

    protected $guarded = ['id'];

    public static function boot() {
        parent::boot();

        static::deleting(function($suratmasuk) {

            if ($suratmasuk->file_path) {
                Storage::delete($suratmasuk->file_path);
            }
        });
    }

    public function disposisi()
    {
        return $this->hasOne(Disposisi::class);
    }
}
