<?php

namespace App\Http\Controllers;

use App\Models\Coffee;
use Illuminate\Http\Request;

class CoffeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Coffee::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required'],
            'origin' => ['required'],
            'roast_date' => ['required'],
            'stock' => ['required'],
        ]);

        $coffee = Coffee::create($validatedData);
        return response()->json($coffee, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Coffee $coffee)
    {
        return $coffee;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coffee $coffee)
    {
        $validatedData = $request->validate([
            'name' => ['required'],
            'origin' => ['required'],
            'roast_date' => ['required'],
            'stock' => ['required'],
        ]);

        $result = $coffee->fill($validatedData);
        $result->save();
        return response()->json($result, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coffee $coffee)
    {
        $coffee->delete();

        return response(status: 200);
    }
}
