<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        return response()->json($users, 200);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'username' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required',
            ]
        );
        $user = new User();
        $user->user_id = uniqid();
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->profile_url = $request->input('profile_url');
        $user->dob = $request->input('dob');
        $user->gender = $request->input('gender');
        $user->save();

        return response()->json($user, 200);
    }
    public function show($keyword)
    {
        $users = User::where('username', 'like', '%' . $keyword . '%')->get();

        if ($users->isEmpty()) {
            return response()->json(['message' => 'Aucun User trouvé'], 200);
        }

        return response()->json($users, 200);
    }
    public function update(Request $request ,$user_id)
    {
        $user = User::findOrFail($user_id);
        
        $user->username = $request->input('username');
        $user->password = $request->input('password');
        $user->profile_url = $request->input('profile_url');
        $user->dob = $request->input('dob');
        $user->gender = $request->input('gender');
        $user->save();
        return response()->json($user, 200);
    }
    public function destroy($user_id)
    {
        $user = User::findOrFail($user_id);
        $user->delete();
        return response()->json("delete fait avec succes", 200);
        
    }
}


