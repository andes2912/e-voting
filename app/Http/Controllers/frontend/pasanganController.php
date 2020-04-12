<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\pasangan;
use App\voting;
use Auth;

class pasanganController extends Controller
{
    // Pasangan
    public function pasangan()
    {
        if (auth::check()) {
            if (auth::user()->role == "User") {
                $cek = voting::where('user_id',auth::user()->id)->first();
                $ceks = pasangan::where('status','Aktif')->first();
                $pasangan = pasangan::where('status','Aktif')->get();
                
                if (@$cek->user_id == auth::user()->id) {
                    return redirect('home');
                } else {
                    return view('user.pasangan.index', compact('pasangan','ceks'));
                }
            }
        }
    }

    // Voting
    public function voting(Request $request)
    {
        if (auth::check()) {
            if (auth::user()->role == "User") {
                $pasangan = pasangan::find($request->id);
                $pasangan->update([
                    'point' => $pasangan->point + 1,
                ]);
                if($pasangan) {
                    $vot = new voting;
                    $vot->user_id = auth::user()->id;
                    $vot->calon_id = $pasangan->id;
                    $vot->vot = 1;
                    $vot->save();
                }

                if ($pasangan && $vot->save()) {
                    return redirect('home');
                }
            }
        }
    }
}
