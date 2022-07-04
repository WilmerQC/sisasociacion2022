<?php

namespace App\Http\Controllers;

use App\Http\Requests\SonsRequest;
use App\Models\son;
use Illuminate\Http\Request;

class SonsController extends Controller
{
    public function index(){
        $sons=son::all();
        return response()->json($sons);
    }

    public function show(son $son){
        $son=son::find($son);
        return response()->json($son);
    }

    public function store(SonsRequest $request){
        $son = son::create($request->all());

        return response()->json([
            'message' => "record saved successfully!",
            'son' => $son
        ], 200);
    }

    public function update(SonsRequest $request, son $son){
        $son->update($request->all());

        return response()->json([
            'message' => "record updated successfully!",
            'son' => $son
        ], 200);
    }

    public function destroy(son $son){
        $son->delete();
        return response()->json([
            'message' => "record deleted successfully!",
        ], 200);
    }
}
