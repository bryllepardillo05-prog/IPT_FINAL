<?php

namespace App\Http\Controllers;

use App\Models\GymSession;
use App\Models\Member;
use App\Models\Trainer;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index()
    {
        $search = request('search');

        $sessions = GymSession::query()
            ->with(['member', 'trainer'])
            ->when($search, function ($q, $s) {
                $q->where('status', 'like', "%$s%")
                    ->orWhereHas('member', function ($q) use ($s) {
                        $q->where('first_name', 'like', "%$s%")
                            ->orWhere('last_name', 'like', "%$s%");
                    })
                    ->orWhereHas('trainer', function ($q) use ($s) {
                        $q->where('first_name', 'like', "%$s%")
                            ->orWhere('last_name', 'like', "%$s%");
                    });
            })
            ->latest()
            ->get();

        return view('sessions.index', compact('sessions', 'search'));
    }

    public function create()
    {
        $members = Member::orderBy('first_name')->orderBy('last_name')->get();
        $trainers = Trainer::orderBy('first_name')->orderBy('last_name')->get();

        return view('sessions.create', compact('members', 'trainers'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'member_id' => ['required', 'exists:members,id'],
            'trainer_id' => ['required', 'exists:trainers,id'],
            'session_time' => ['required', 'date'],
            'status' => ['required', 'string', 'max:255'],
        ]);

        GymSession::create($data);

        return redirect()->route('sessions.index')->with('success', 'Session created successfully.');
    }

    public function show(GymSession $session)
    {
        $session->load(['member', 'trainer']);

        return view('sessions.show', compact('session'));
    }

    public function edit(GymSession $session)
    {
        $members = Member::orderBy('first_name')->orderBy('last_name')->get();
        $trainers = Trainer::orderBy('first_name')->orderBy('last_name')->get();

        return view('sessions.edit', compact('session', 'members', 'trainers'));
    }

    public function update(Request $request, GymSession $session)
    {
        $data = $request->validate([
            'member_id' => ['required', 'exists:members,id'],
            'trainer_id' => ['required', 'exists:trainers,id'],
            'session_time' => ['required', 'date'],
            'status' => ['required', 'string', 'max:255'],
        ]);

        $session->update($data);

        return redirect()->route('sessions.index')->with('success', 'Session updated successfully.');
    }

    public function destroy(GymSession $session)
    {
        $session->delete();

        return redirect()->route('sessions.index')->with('success', 'Session deleted successfully.');
    }
}
