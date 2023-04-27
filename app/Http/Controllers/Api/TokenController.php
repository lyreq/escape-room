<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TokenRequest;
use App\Repositories\TokenRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TokenController extends Controller
{
    public function getToken(TokenRequest $request)
    {
        $data =  $request->validated();
        $repo = new TokenRepository();
        return $repo->getToken($data);
    }
}
