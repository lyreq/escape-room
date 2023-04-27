<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\EscapeRoomRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EscapeRoomController extends Controller
{
    public function index()
    {
        $repo = new EscapeRoomRepository();
        return $repo->index();
    }

    public function show($id)
    {
        $repo = new EscapeRoomRepository();
        return $repo->show($id);
    }
}
