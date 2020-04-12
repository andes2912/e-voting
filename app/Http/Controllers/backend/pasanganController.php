<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\pasangan;
use App\calon;
use App\visi;
use App\misi;
use auth;

class pasanganController extends Controller
{

    public function index()
    {
        if (auth::check()) {
            if (auth::user()->role == "Admin") {

                $pasangan = pasangan::selectRaw('pasangans.*,a.pasangan_id as a, b.pasangan_id as b')
                ->leftJoin('visis as a','a.pasangan_id','=','pasangans.id')
                ->leftJoin('visis as b','b.pasangan_id','=','pasangans.id')
                ->get();
                return view('backend.pasangan.index', compact('pasangan'));
            }
        } else {
            return redirect('/home');
        }
    }

    public function create()
    {
        if (auth::check()) {
            if (auth::user()->role == "Admin") {
                $ketua = calon::where('role','Ketua')->where('status','Belum Aktif')->get();
                $wakil = calon::where('role','Wakil')->where('status','Belum Aktif')->get();
                return view('backend.pasangan.create', compact('ketua','wakil'));
            }
        } else {
            return redirect('/home');
        }
    }

    public function store(Request $request)
    {
        if (auth::check()) {
            if (auth::user()->role == "Admin") {
                $pasangan = new pasangan();
                $pasangan->ketua_id = $request->ketua_id;
                $pasangan->ketua_nama = $request->ketua_nama;
                $pasangan->wakil_id = $request->wakil_id;
                $pasangan->wakil_nama = $request->wakil_nama;
                $pasangan->status = 'Aktif';
                $pasangan->save();

                if ($pasangan->save()) {
                    $calon = calon::findOrFail($pasangan->ketua_id);
                    $calon->status = 'Aktif';
                    $calon->save();
                } if ($calon->save()) {
                    $calons = calon::findOrFail($pasangan->wakil_id);
                    $calons->status = 'Aktif';
                    $calons->Save();
                }
                return redirect()->route('pasangan.index');
            }
        } else {
            return redirect('/home');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function select_ketua(Request $request)
    {
        if (auth::check()) {
            if (auth::user()->role == "Admin") {
                $ketua = calon::select('id','nama_calon','role')
                ->where('id', $request->id)
                ->where('role','Ketua')
                ->get();

                $select = '';
                $select .= '
                            <select name="ketua_nama" hidden>';
                            foreach ($ketua as $item) {
                $select .= '<option value="'.$item->nama_calon.'">'.$item->nama_calon.'</option>';
                            }'
                            ';
                return $select;
            }
        }  else {
            return redirect('/home');
        }
    }

    public function select_wakil(Request $request)
    {
        if (auth::check()) {
            if (auth::user()->role == "Admin") {
                $wakil = calon::select('id','nama_calon')
                ->where('id', $request->id)
                ->where('role','Wakil')
                ->get();

                $select = '';
                $select .= '
                            <select name="wakil_nama" hidden>';
                            foreach ($wakil as $item) {
                $select .= '<option value="'.$item->nama_calon.'">'.$item->nama_calon.'</option>';
                            }'
                            ';
                return $select;
            }
        }  else {
            return redirect('/home');
        }
    }

    public function get_calon_by_id($id)
    {
        if (auth::check()) {
            if (auth::user()->role == "Admin") {
                $pasangan = pasangan::where('id', $id)->first();
                return $pasangan;
            }
        }  else {
            return redirect('/home');
        }
    }

    public function visi_store(Request $request)
    {
        if (auth::check()) {
            if (auth::user()->role == "Admin") {
                $visi = new visi();
                $visi->isi = $request->isi_visi;
                $visi->pasangan_id = $request->pasangan_id;
                $visi->save();

                if ($visi->save()) {
                    $misi = new misi();
                    $misi->isi = $request->isi_misi;
                    $misi->pasangan_id = $request->pasangan_id;
                    $misi->save();
                }
            }
        }  else {
            return redirect('/home');
        }
    }
}
