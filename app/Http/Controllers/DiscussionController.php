<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use App\Models\DiscussionMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiscussionController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $discussions = Discussion::withCount('participants')
            ->when($search, function ($query, $search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(9);

        return view('discuss.index', compact('discussions', 'search'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string'
        ]);

        Discussion::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => Auth::id()
        ]);

        return redirect()->back()->with('success', 'Topik berhasil diajukan!');
    }
    public function show($id)
    {
        $discussion = Discussion::with('participants')->findOrFail($id);

        return view('discuss.show', compact('discussion'));
    }

    public function join($id)
    {
        $discussion = Discussion::findOrFail($id);
        $user = Auth::user();

        // Cek apakah user sudah bergabung
        if (!$discussion->participants->contains($user->id)) {
            $discussion->participants()->attach($user->id);
        }

        return redirect()->route('discussions.show', $discussion->id)->with('success', 'Berhasil bergabung ke diskusi.');
    }

    public function storeMessage(Request $request, $id)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $discussion = Discussion::findOrFail($id);

        // Pastikan user sudah bergabung
        if (!$discussion->participants->contains(auth()->id())) {
            return back()->with('error', 'Kamu belum bergabung dalam diskusi ini.');
        }

        DiscussionMessage::create([
            'discussion_id' => $discussion->id,
            'user_id' => auth()->id(),
            'message' => $request->message,
        ]);

        return redirect()->route('discussions.show', $id)->with('success', 'Pesan dikirim.');
    }
    public function leave($id)
    {
        $discussion = Discussion::findOrFail($id);
        $user = Auth::user();

        // Hapus relasi jika ada
        $discussion->participants()->detach($user->id);

        return redirect()->route('discuss.index')->with('success', 'Kamu telah keluar dari diskusi.');
    }

}
