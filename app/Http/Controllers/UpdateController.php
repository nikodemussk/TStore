<?php

namespace App\Http\Controllers;
// namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\User;
use App\Http\Controllers\Controller;
use App\Rules\MatchOldPassword;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UpdateController extends Controller
{

    protected function edit($id){
        $user = User::findOrFail($id);
        // dd($user->address);
        return view('auth.edit',compact('user'));
    }

    protected function update($id)
    {

        $data = request()->validate([
            'name' => ['required', 'string', 'max:255', 'regex:/[a-z]+$/i','min:5'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($id)],
            'password' => ['string', 'min:5', 'confirmed','alpha_num','nullable'],
            'old-password' => ['required','min:10','alpha_num', new MatchOldPassword],
            'gender' => ['required'],
            'role' => ['required'],
            'address' => ['required','min:10'],
            "image" => ['mimes:jpeg,jpg,png','nullable','image']
        ]);

        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');
        }
        $user = User::findOrFail($id);

        $password = $data['password'] ?? $data['old-password'];

        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'address' => $data['address'],
            'gender' => $data['gender'],
            'role' => $data['role'],
            'password' => Hash::make($password),
            'image' => $imagePath ?? $user->image,
        ]);
    }
}
