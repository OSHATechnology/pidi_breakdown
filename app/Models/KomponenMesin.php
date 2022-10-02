<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomponenMesin extends Model
{
    use HasFactory;

    const CONDITIONPARAMETER = [
        'very good' => [
            'min' => 85,
            'max' => 100,
            'color' => '#00FF00',
        ],
        'good' => [
            'min' => 60,
            'max' => 85,
            'color' => '#0e9c39',
        ],
        'need repair' => [
            'min' => 25,
            'max' => 59,
            'color' => '#FFFF00'
        ],
        'critical' => [
            'min' => 0,
            'max' => 24,
            'color' => '#FF0000'
        ],
    ];

    public function mesin()
    {
        return $this->belongsTo(Mesin::class, 'id_mesin');
    }

    public function scopeByMesin($query, $idMesin)
    {
        return $query->where('id_mesin', $idMesin);
    }

    public static function getConditionParameter($value)
    {
        foreach (self::CONDITIONPARAMETER as $key => $parameter) {
            if ($value >= $parameter['min'] && $value <= $parameter['max']) {
                return $key;
            }
        }
    }

    public function types()
    {
        return $this->belongsTo(KomponenType::class, 'id_type');
    }
}
