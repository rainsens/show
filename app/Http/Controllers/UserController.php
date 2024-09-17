<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'title' => $request->title,
            'address' => $request->address,
            'social' => $request->social,
            'interest' => $request->interest,
            'credit' => $request->credit,
        ];
        if ($file = $request->file('avatar')) {
            $avatar = Storage::disk('public')->putFile('upload', $file);
            $data['avatar'] = $avatar;
        }
        $user->update($data);
        session()->flash('success', 'Profile updated successfully');
        return redirect(route('users.show', $user));
    }
}
