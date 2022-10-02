<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesin extends Model
{
    use HasFactory;

    const WARNINGPARAMETER = 50;

    public function komponen()
    {
        return $this->hasMany(KomponenMesin::class, 'id_mesin');
    }

    public function images()
    {
        return $this->hasMany(MesinImage::class, 'mesin_id');
    }

    public function scopeGetEngineDanger($query, $select = ['*'])
    {
        return $query->select($select)->whereHas('komponen', function ($query) {
            $query->where('breakdown_possibility', '>', self::WARNINGPARAMETER)
                ->orWhere('condition', '<', self::WARNINGPARAMETER);
        });
    }
}
