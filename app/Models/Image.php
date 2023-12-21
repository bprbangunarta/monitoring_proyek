<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Laporan;
use App\Models\survei;
use App\Models\Insiden;

class Image extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function laporan()
    {
        return $this->belongsTo(Laporan::class);
    }
    public function survei()
    {
        return $this->belongsTo(Survei::class);
    }
    public function insiden()
    {
        return $this->belongsTo(Insiden::class);
    }
}
