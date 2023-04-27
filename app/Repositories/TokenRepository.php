<?php

namespace App\Repositories;

use App\Contracts\Repositories\TokenRepositoryInterface;
use App\Http\Traits\Response;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Exception;

class TokenRepository implements TokenRepositoryInterface
{

    use Response;

    public function getToken($data)
    {
        try {
            $email = $data['email'];
            $password = $data['password'];


            if (Auth::attempt(["email" => $email, "password" => $password])) {
                $user = Auth::user();
                $token = $user->createToken("csrfToken")->accessToken;
                return $this->successResponse("Transaction Successful!", "Bearer " . $token);
            }

            return $this->errorResponse("Email address or password is incorrect",404);

        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }
}
