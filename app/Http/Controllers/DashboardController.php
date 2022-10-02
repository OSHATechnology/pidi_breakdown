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
        return view('components.breakdownItem', compact(['EngineItems', 'Engine']));
    }
}
