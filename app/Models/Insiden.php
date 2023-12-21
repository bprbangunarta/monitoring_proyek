<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Laporan;
use App\Models\Image;

class Insiden extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function proyek()
    {
        return $this->belongsTo(Proyek::class);
    }

    public function image()
    {
        return $this->hasMany(Image::class);
    }
}
