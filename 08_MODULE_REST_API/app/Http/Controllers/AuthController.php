<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Regional;
use App\Models\Society;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $request->validated();
        $society = Society::where('id_card_number', $request->id_card_number)->first();
        $regional = Regional::select('id', 'province', 'district')->where('id', $society->regional_id)->first();

        if (!$society || $request->password != $society->password) {
            return response()->json(['message' => 'ID Card Number or Password incorrect'], 401);
        }
        
        $token = md5($society->id_card_number);
        
        $data['name'] = $society->name;
        $data['born_date'] = $society->born_date;
        $data['gender'] = $society->gender;
        $data['address'] = $society->address;
        $data['token'] = $token;
        $data['regional'] = $regional;
        $society->update(['login_tokens' => $token]);
        return response()->json($data, 200);
    }

    public function logout(Request $request)
    {
        $society = Society::where('login_tokens', $request->token)->first();
        if (!$society || !$request->token) {
            return response()->json(['message' => 'Invalid token'], 401);
        }
        $society->update(['login_tokens' => null]);
        return response()->json(['message' => 'Logout success'], 200);
    }
}
