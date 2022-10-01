<?php

namespace App\Http\Controllers;

use App\Models\Mesin;
use Illuminate\Http\Request;

class MesinController extends Controller
{
    public function index()
    {
        try {
            $Mesins = Mesin::all();
            $checkDanger = Mesin::getEngineDanger("id")->get();
            foreach ($Mesins as $value) {
                if ($checkDanger->contains('id', $value->id)) {
                    $value->danger = true;
                } else {
                    $value->danger = false;
                }
            }
            return $this->sendResponse($Mesins, 'Mesin retrieved successfully.');
        } catch (\Throwable $th) {
            return $this->sendError($th->getMessage(), 500);
        }
    }
}
