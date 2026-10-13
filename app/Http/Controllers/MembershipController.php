<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Membership;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    public function index()
    {
        $search = request('search');

        $memberships = Membership::query()
            ->with('member')
            ->when($search, function ($q, $s) {
                $q->where('type', 'like', "%$s%")
                    ->orWhereHas('member', function ($q) use ($s) {
                        $q->where('first_name', 'like', "%$s%")
                            ->orWhere('last_name', 'like', "%$s%");
                    });
            })
            ->latest()
            ->get();

        return view('memberships.index', compact('memberships', 'search'));
    }

    public function create()
    {
        $members = Member::orderBy('first_name')->orderBy('last_name')->get();

        return view('memberships.create', compact('members'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'member_id' => ['required', 'exists:members,id'],
            'type' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after_or_equal:start_date'],
        ]);

        Membership::create($data);

        return redirect()->route('memberships.index')->with('success', 'Membership created successfully.');
    }

    public function show(Membership $membership)
    {
        $membership->load('member');

        return view('memberships.show', compact('membership'));
    }

    public function edit(Membership $membership)
    {
        $members = Member::orderBy('first_name')->orderBy('last_name')->get();

        return view('memberships.edit', compact('membership', 'members'));
    }

    public function update(Request $request, Membership $membership)
    {
        $data = $request->validate([
            'member_id' => ['required', 'exists:members,id'],
            'type' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after_or_equal:start_date'],
        ]);

        $membership->update($data);

        return redirect()->route('memberships.index')->with('success', 'Membership updated successfully.');
    }

    public function destroy(Membership $membership)
    {
        $membership->delete();

        return redirect()->route('memberships.index')->with('success', 'Membership deleted successfully.');
    }
}
