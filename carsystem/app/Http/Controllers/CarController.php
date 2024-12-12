<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::where('availability', true)->get();
        return view('cars.index', compact('cars'));
    }

    public function create()
    {
        return view('admin.cars.create');
    }

    public function store(Request $request)
    {
        Car::create($request->all());
        return redirect('/admin/cars');
    }

    public function edit($id)
    {
        $car = Car::find($id);
        return view('admin.cars.edit', compact('car'));
    }

    public function update(Request $request, $id)
    {
        $car = Car::find($id);
        $car->update($request->all());
        return redirect('/admin/cars');
    }

    public function destroy($id)
    {
        Car::destroy($id);
        return redirect('/admin/cars');
    }
}
