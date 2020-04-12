<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;

class pemilihController extends Controller
{
    // Pemilih
    public function pemilih()
    {
        if (auth::check()) {
            if (auth::user()->role == "Admin") {
                $pemilih = User::where('role','User')->where('status','Aktif')->get();
                return view('backend.pemilih.index', compact('pemilih'));
            }
        }
    }
}
