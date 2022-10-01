<?php

namespace App\Http\Controllers;

use App\Models\KomponenMesin;
use Illuminate\Http\Request;

class KomponenMesinController extends Controller
{
    public function show(Request $request)
    {
        $komponen = KomponenMesin::findOrfail($request->id);
        return $komponen;
    }

    public function renderDetails(Request $request)
    {
        $data = $this->show($request);
        $html = view('components.modalBreakdownDetails', compact('data'))->render();
        return response()->json(['html' => $html]);
    }

    public function repair(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);
        $komponen = KomponenMesin::findOrfail($request->id);
        $komponen->breakdown_possibility = 100;
        $komponen->updated_at = now();
        if ($komponen->save()) {
            return response()->json(['status' => 'success', 'message' => 'Komponen Mesin berhasil direpair']);
        }
        return response()->json(['status' => 'error', 'message' => 'Komponen Mesin gagal direpair']);
    }
}
