<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
// use Illuminate\Http\Request as UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();

        return response(['data' => $users], 200);
    }

    public function register(UserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response(['data' => $user], 201);
    }
    public function login(UserRequest $request)
    {
        $email=$request->email;
        $user = User::where('email', $email)->firstOrFail();

        if (!$user || !Hash::check($request->password, $user->password)) {

            return response(['data' => "invlid password or username"], 400);
        }
        else{
            $token= $user->createToken("token")->plainTextToken;
            return response(['data' => $token], 200);
        }

    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return response(['data', $user], 200);
    }

    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());

        return response(['data' => $user], 200);
    }

    public function destroy($id)
    {
        User::destroy($id);

        return response(['data' => null], 204);
    }
}
