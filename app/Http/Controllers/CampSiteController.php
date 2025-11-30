<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CampSite;
use Illuminate\Support\Facades\Auth;

class CampSiteController extends Controller
{
    public function index()
    {
        $camps = CampSite::where('is_approved', true)->latest()->get();
        return view('home', compact('camps'));
    }

    // Papar borang
    public function create()
    {
        return view('submit');
    }

    // Simpan data
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'state' => 'required|string',
            'address' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $path = $request->file('image') ? $request->file('image')->store('camps', 'public') : null;

        CampSite::create([
            'name' => $request->name,
            'description' => $request->description,
            'state' => $request->state,
            'address' => $request->address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'image' => $path,
            'has_toilet' => $request->has_toilet ? 1 : 0,
            'has_river' => $request->has_river ? 1 : 0,
            'has_electricity' => $request->has_electricity ? 1 : 0,
            'has_bbq' => $request->has_bbq ? 1 : 0,
            'is_approved' => false, // admin approve nanti
            'user_id' => Auth::id() ?? 1,
        ]);

        return redirect('/')->with('success', 'Tempat camp anda telah dihantar untuk semakan!');
    }

    public function adminIndex()
    {
        // Senarai tempat belum diluluskan
        $pendingCamps = CampSite::where('is_approved', false)->latest()->get();
        return view('admin.camps', compact('pendingCamps'));
    }

    public function approve($id)
    {
        $camp = CampSite::findOrFail($id);
        $camp->update(['is_approved' => true]);

        return back()->with('success', 'Tempat camping "' . $camp->name . '" telah diluluskan ✅');
    }

    public function reject($id)
    {
        $camp = CampSite::findOrFail($id);
        $camp->delete(); // atau boleh tukar kepada flag lain
        return back()->with('danger', 'Tempat camping "' . $camp->name . '" telah ditolak ❌');
    }

    public function view($id)
    {
        $camp = CampSite::findOrFail($id);

        return view('camps.view', compact('camp'));
    }
}
