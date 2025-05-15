<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $organizations = Organization::all();  // ambil semua organisasi

        return view('auth.register', compact('organizations'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    // public function store(Request $request): RedirectResponse
    // {
    //     $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
    //         'password' => ['required', 'confirmed', Rules\Password::defaults()],
    //         'organization_id' => ['required', 'exists:organizations,id'],
    //     ]);

    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //         'organization_id' => $request['organization_id'], // Simpan organisasi yang dipilih
    //         'type' => 'anggota', // Atur default tipe user sebagai anggota
    //     ]);

    //     $user->assignRole('anggota');
    //     event(new Registered($user));

    //     Auth::login($user);

    //     return redirect(route('dashboard', absolute: false));
    // }
    public function store(Request $request): RedirectResponse
{
    // Validasi dasar
    $rules = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'role' => ['required', 'in:anggota,mitra'], // validasi role wajib dan hanya anggota/mitra
    ];

    // Jika role = anggota, organization_id wajib dan harus ada di tabel organizations
    if ($request->input('role') === 'anggota') {
        $rules['organization_id'] = ['required', 'exists:organizations,id'];
    } else {
        // Jika mitra, organization_id boleh kosong atau null
        $rules['organization_id'] = ['nullable', 'exists:organizations,id'];
    }

    $request->validate($rules);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'organization_id' => $request->input('organization_id'), // bisa null untuk mitra
        'type' => $request->input('role'), // simpan sesuai role yang dipilih
    ]);

    // assign role ke user (pastikan role ini ada di sistem)
    $user->assignRole($request->input('role'));

    event(new Registered($user));

    Auth::login($user);

    return redirect(route('dashboard'));
}

}
