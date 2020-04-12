<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\voting;
use App\User;
use App\calon;
use App\pasangan;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth::check()) {
            if (auth::user()->role == "Admin") {
                $pemilih = User::Where('role','User')->count();
                $calon = calon::count();
                $pasangan = pasangan::count();

                $vot = pasangan::get();
                return view('backend.index', compact('pemilih','calon','pasangan','vot'));
            } elseif (auth::user()->role == "User") {
                $cek = voting::where('user_id',auth::user()->id)->first();
                return view('user.index', compact('cek'));
            }
        } else {
            return redirect('/');
        }
    }
}
