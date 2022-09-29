<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesin extends Model
{
    use HasFactory;

    public function komponen(){
        return $this->hasMany(KomponenMesin::class,'id_mesin');
    }
}
