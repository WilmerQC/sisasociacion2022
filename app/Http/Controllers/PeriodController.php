<?php

namespace App\Http\Controllers;

use App\Http\Requests\PeriodRequest;
use App\Models\Period;
use Illuminate\Http\Request;

class PeriodController extends Controller
{
    public function index(){
        $periods=Period::all();
        return response()->json($periods);
    }

    public function show(Period $period){
        $period=Period::find($period);
        return response()->json($period);
    }

    public function store(PeriodRequest $request){
        $period = Period::create($request->all());

        return response()->json([
            'message' => "record saved successfully!",
            'period' => $period
        ], 200);
    }

    public function update(PeriodRequest $request, Period $period){
        $period->update($request->all());

        return response()->json([
            'message' => "record updated successfully!",
            'period' => $period
        ], 200);
    }

    public function destroy(Period $period){
        $period->delete();
        return response()->json([
            'message' => "record deleted successfully!",
        ], 200);
    }
}
