<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    // Kullanıcıları listele
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    // Yeni kullanıcı ekle
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Başarıyla eklendikten sonra kullanıcılar sayfasına yönlendir
        return redirect()->route('users.index')->with('success', 'Kullanıcı başarıyla eklendi.');
    }
    public function create()
    {
        return view('admin.users.create');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }


    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user = User::findOrFail($id);
        $user->name = $validated['name'];
        $user->email = $validated['email'];

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'Kullanıcı başarıyla güncellendi.');
    }


    // Kullanıcı sil
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        // Silindikten sonra kullanıcı listesine yönlendir ve başarılı mesaj göster
        return redirect()->route('users.index')->with('success', 'Kullanıcı başarıyla silindi.');
    }
}
