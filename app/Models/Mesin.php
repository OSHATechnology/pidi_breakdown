<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesin extends Model
{
    use HasFactory;

    const IMAGEMESINS = [
        '1' => 'img/mesin/Blok Silinder png/Blok-silinder.png',
        '2' => 'images/mesin/2.jpg',
        '3' => 'images/mesin/3.jpg',
        '4' => 'images/mesin/4.jpg',
        '5' => 'images/mesin/5.jpg',
        '6' => 'images/mesin/6.jpg',
        '7' => 'images/mesin/7.jpg',
    ];

    public function komponen()
    {
        return $this->hasMany(KomponenMesin::class, 'id_mesin');
    }
}
