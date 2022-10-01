<?php

namespace App\Http\Controllers;

use App\Models\KomponenMesin;
use App\Models\Mesin;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('components.content');
    }

    public function breakdown()
    {
        if (request()->has('mesin_id')) {
            return $this->breakdownItem(request()->mesin_id);
        }
        $Engines = Mesin::all();

        return view('components.breakdown', compact('Engines'));
    }

    public function breakdownItem($idEngine)
    {
        $Engine = Mesin::find($idEngine);
        $EngineItems = KomponenMesin::where('id_mesin', $idEngine)->get();
        foreach ($EngineItems as $key => $value) {
            $value->posisi_x = rand(100, 500);
            $value->posisi_y = rand($value->posisi_x, 800);
        }
        return view('components.breakdownItem', compact(['EngineItems', 'Engine']));
    }
}
