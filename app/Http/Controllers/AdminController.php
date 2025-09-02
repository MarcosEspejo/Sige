<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $usuarios = User::latest()->paginate(10);
        return view('admin.index', compact('usuarios'));
    }
}
