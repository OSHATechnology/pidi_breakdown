<?php

namespace App\Http\Controllers;

use App\Models\KomponenMesin;
use Illuminate\Http\Request;

class KomponenMesinController extends Controller
{
    public function index(Request $request)
    {
        try {
            if ($request->has('mesin_id')) {
                $KomponenMesin = KomponenMesin::byMesin($request->mesin_id)->get();
            } else {
                return $this->renderDetails($request);
            }

            return $this->sendResponse($KomponenMesin, 'Komponen Mesin retrieved successfully.');
        } catch (\Throwable $th) {
            return $this->sendError($th->getMessage(), 500);
        }
    }

    public function show(Request $request)
    {
        $komponen = KomponenMesin::findOrfail($request->id);
        $komponen->condition_parameter = KomponenMesin::getConditionParameter($komponen->condition);
        $komponen->condition_parameter_color = (isset(KomponenMesin::CONDITIONPARAMETER[$komponen->condition_parameter]['color'])) ? KomponenMesin::CONDITIONPARAMETER[$komponen->condition_parameter]['color'] : '#FFD700';
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
        $komponen->breakdown_possibility = 0;
        $komponen->condition = 100;
        $komponen->updated_at = now();
        if ($komponen->save()) {
            return response()->json(['status' => 'success', 'message' => 'Komponen Mesin berhasil direpair']);
        }
        return response()->json(['status' => 'error', 'message' => 'Komponen Mesin gagal direpair']);
    }
}
