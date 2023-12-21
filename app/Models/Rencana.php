<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Proyek;

class Rencana extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function proyek()
    {
        return $this->belongsTo(Proyek::class);
    }
}
