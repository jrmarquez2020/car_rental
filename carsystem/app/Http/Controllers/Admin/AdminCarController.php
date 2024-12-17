<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class AdminCarController extends Controller
{
    // Show all cars
    public function index()
    {
        $cars = Car::all();
        return view('admin.cars.index', compact('cars'));
    }

    // Show the form to create a new car
    public function create()
    {
        return view('admin.cars.create');
    }

    // Store a new car
    public function store(Request $request)
    {
        // Validate the form input
        $validated = $request->validate([
            'CAR_NAME' => 'required|string|max:255',
            'FUEL_TYPE' => 'required|string|in:Petrol,Diesel,Electric,Hybrid',
            'CAPACITY' => 'required|integer|min:1',
            'PRICE' => 'required|numeric|min:0',
            'CAR_IMG' => 'required|image|mimes:jpeg,png,jpg,gif|max:51200', // Max 50 MB
            'CATEGORY' => 'required|string|in:Sedan,SUV,Van,MPV',
        ]);

        // Handle the car image upload
        if ($request->hasFile('CAR_IMG')) {
            $imagePath = $request->file('CAR_IMG')->store('car_images', 'public');
            $validated['CAR_IMG'] = $imagePath;
        }

        // Insert the car into the database
        Car::create([
            'CAR_NAME' => $validated['CAR_NAME'],
            'FUEL_TYPE' => $validated['FUEL_TYPE'],
            'CAPACITY' => $validated['CAPACITY'],
            'PRICE' => $validated['PRICE'],
            'CAR_IMG' => $validated['CAR_IMG'],
            'availability' => true, // Default to true
            'CATEGORY' => $validated['CATEGORY'],
        ]);

        return redirect()->route('admin.cars.index')->with('success', 'Car added successfully!');
    }

    // Show the form to edit a car
    public function edit($id)
    {
        $car = Car::findOrFail($id);
        return view('admin.cars.edit', compact('car'));
    }

    // Update the car details
    public function update(Request $request, $id)
    {
        $car = Car::findOrFail($id);

        // Validate the updated data
        $validated = $request->validate([
            'CAR_NAME' => 'required|string|max:255',
            'FUEL_TYPE' => 'required|string|in:Petrol,Diesel,Electric,Hybrid',
            'CAPACITY' => 'required|integer|min:1',
            'PRICE' => 'required|numeric|min:0',
            'CAR_IMG' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:51200', // Max 50 MB
            'CATEGORY' => 'required|string|in:Sedan,SUV,Van,MPV',
        ]);

        // Handle the optional car image upload
        if ($request->hasFile('CAR_IMG')) {
            $imagePath = $request->file('CAR_IMG')->store('car_images', 'public');
            $validated['CAR_IMG'] = $imagePath;
        } else {
            // If no new image, retain the old image
            $validated['CAR_IMG'] = $car->CAR_IMG;
        }

        // Update car details
        $car->update([
            'CAR_NAME' => $validated['CAR_NAME'],
            'FUEL_TYPE' => $validated['FUEL_TYPE'],
            'CAPACITY' => $validated['CAPACITY'],
            'PRICE' => $validated['PRICE'],
            'CAR_IMG' => $validated['CAR_IMG'],
            'CATEGORY' => $validated['CATEGORY'],
        ]);

        return redirect()->route('admin.cars.index')->with('success', 'Car updated successfully!');
    }

    // Delete a car
    public function destroy($id)
    {
        $car = Car::findOrFail($id);

        // Optionally, you can delete the car image from storage
        if ($car->CAR_IMG) {
            \Storage::disk('public')->delete($car->CAR_IMG);
        }

        // Delete the car from the database
        $car->delete();

        return redirect()->route('admin.cars.index')->with('success', 'Car deleted successfully!');
    }
}
