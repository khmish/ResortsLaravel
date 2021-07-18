<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
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
    

    public function me(Request $request)
    {
        return $request->user();
    }

    public function register(UserRequest $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->role = $request->role?'user':$request->role;
        $user->password = Hash::make($request->password);
        if ($user->save()) {

            return response(['data' => $user], 201);
        }
        return response(['data' => "something went wrong!"], 400);
    }
    public function login(UserRequest $request)
    {
        $email = $request->email;
        $user = User::where('email', $email)->firstOrFail();

        if (!$user || !Hash::check($request->password, $user->password)) {

            return response(['data' => "invlid password or username"], 400);
        } else {
            $token = $user->createToken("token")->plainTextToken;
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
        if (strlen(trim($request->name)) > 0) {
            $user->name = $request->name;
        }
        if (strlen(trim($request->password)) > 0) {
            $user->password = Hash::make($request->password);
        }
        if (strlen(trim($request->role)) > 0) {
            $user->role = $request->role;
        }
        if ($user->save()) {

            return response(['saved' => $user], 200);
        }

        return response(['error' => "something went wrong"], 400);
    }

    public function destroy($id)
    {
        User::destroy($id);

        return response(['data' => null], 204);
    }
}
