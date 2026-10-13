<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    public function index()
    {
        $search = request('search');

        $trainers = Trainer::query()
            ->when($search, function ($q, $s) {
                $q->where('first_name', 'like', "%$s%")
                    ->orWhere('last_name', 'like', "%$s%")
                    ->orWhere('specialization', 'like', "%$s%");
            })
            ->latest()
            ->get();

        return view('trainers.index', compact('trainers', 'search'));
    }

    public function create()
    {
        return view('trainers.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'specialization' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'salary' => ['nullable', 'numeric', 'min:0'],
        ]);

        Trainer::create($data);

        return redirect()->route('trainers.index')->with('success', 'Trainer created successfully.');
    }

    public function show(Trainer $trainer)
    {
        return view('trainers.show', compact('trainer'));
    }

    public function edit(Trainer $trainer)
    {
        return view('trainers.edit', compact('trainer'));
    }

    public function update(Request $request, Trainer $trainer)
    {
        $data = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'specialization' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'salary' => ['nullable', 'numeric', 'min:0'],
        ]);

        $trainer->update($data);

        return redirect()->route('trainers.index')->with('success', 'Trainer updated successfully.');
    }

    public function destroy(Trainer $trainer)
    {
        $trainer->delete();

        return redirect()->route('trainers.index')->with('success', 'Trainer deleted successfully.');
    }
}
