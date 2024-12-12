<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return view('admin.cars.index', compact('cars'));
    }

    public function create()
    {
        return view('admin.cars.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand' => 'required|string',
            'model' => 'required|string',
            'price_per_day' => 'required|numeric',
            'availability' => 'required|boolean',
        ]);
        Car::create($validated);

        return redirect('/admin/cars')->with('success', 'Car added successfully!');
    }

    public function edit($id)
    {
        $car = Car::findOrFail($id);
        return view('admin.cars.edit', compact('car'));
    }

    public function update(Request $request, $id)
    {
        $car = Car::findOrFail($id);

        $validated = $request->validate([
            'brand' => 'required|string',
            'model' => 'required|string',
            'price_per_day' => 'required|numeric',
            'availability' => 'required|boolean',
        ]);
        $car->update($validated);

        return redirect('/admin/cars')->with('success', 'Car updated successfully!');
    }

    public function destroy($id)
    {
        Car::destroy($id);
        return redirect('/admin/cars')->with('success', 'Car deleted successfully!');
    }
}
