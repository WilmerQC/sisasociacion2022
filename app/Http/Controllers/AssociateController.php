<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssociateRequest;
use App\Models\associate;
use Illuminate\Http\Request;

class AssociateController extends Controller
{
    public function index(){
        $associates=associate::all();
        return response()->json($associates);
    }

    public function show(associate $associate){
        $associate=associate::find($associate);
        return response()->json($associate);
    }

    public function store(AssociateRequest $request){
        $associate = associate::create($request->all());

        return response()->json([
            'message' => "record saved successfully!",
            'associate' => $associate
        ], 200);
    }

    public function update(AssociateRequest $request, associate $associate){
        $associate->update($request->all());

        return response()->json([
            'message' => "record updated successfully!",
            'associate' => $associate
        ], 200);
    }

    public function destroy(associate $associate){
        $associate->delete();
        return response()->json([
            'message' => "record deleted successfully!",
        ], 200);
    }
}
