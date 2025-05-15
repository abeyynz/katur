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
            'title' => 'required',
            'description' => 'required',
            'category' => 'required|in:perlombaan,pelatihan,lowongan',
            'deadline' => 'nullable|date',
            'link' => 'nullable|url|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('info', 'public');
        }

        Information::create([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'deadline' => $request->deadline,
            'link' => $request->link,
            'image' => $imagePath,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('informations.index')->with('success', 'Informasi berhasil ditambahkan');
    }


    // public function show($id)
    // {
    //     $info = Information::findOrFail($id);
    //     return view('informations.show', compact('info'));
    // }

    public function show($id)
    {
        $information = Information::with('user')->findOrFail($id);
        return view('informations.show', compact('information'));
    }

}
