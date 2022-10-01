<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomponenMesin extends Model
{
    use HasFactory;

    public function mesin()
    {
        return $this->belongsTo(Mesin::class, 'id_mesin');
    }

    public function scopeByMesin($query, $idMesin)
    {
        return $query->where('id_mesin', $idMesin);
    }
}
