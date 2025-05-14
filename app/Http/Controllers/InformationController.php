<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InformationController extends Controller
{
    public function index()
    {
        $perlombaan = Information::where('category', 'perlombaan')->latest()->get();
        $pelatihan = Information::where('category', 'pelatihan')->latest()->get();
        $lowongan = Information::where('category', 'lowongan')->latest()->get();

        return view('informations.index', compact('perlombaan', 'pelatihan', 'lowongan'));
    }

    public function create()
    {
        return view('informations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|in:perlombaan,pelatihan,lowongan',
        ]);

        Information::create([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'user_id' => Auth::id(), // jika kamu simpan user pembuatnya
        ]);

        return redirect()->route('informations.index')->with('success', 'Informasi berhasil ditambahkan!');
    }

    public function show($id)
    {
        $info = Information::findOrFail($id);
        return view('informations.show', compact('info'));
    }

}
