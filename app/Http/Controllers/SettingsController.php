<?php

namespace App\Http\Controllers;

class SettingsController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return view('settings.index', compact('user'));
    }
}