<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Post;

class UserRegisterController extends Controller
{
    public function index()
    {
        return view('userregist');
    }
}