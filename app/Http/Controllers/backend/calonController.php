<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\calon;
use Carbon\carbon;
use Auth;

class calonController extends Controller
{
    
    public function index()
    {
        if (auth::check()) {
            if (auth::user()->role == "Admin") {
                $calon = calon::where('status','Belum Aktif')->get();
                $cek = calon::first();
                return view('backend.calon.index', compact('calon','cek'));
            }
        }
    }
    
    public function create()
    {
        if (auth::check()) {
            if (auth::user()->role == "Admin") {
                return view('backend.calon.create');
            }
        }
    }

    
    public function store(Request $request)
    {
        if (auth::check()) {
            if (auth::user()->role == "Admin") {
                foreach ($request->add_calon as $item) {
                    $calon = new calon;
                    $calon->nama_calon = $item['nama_calon'];
                    $calon->umur = $item['umur'];
                    $calon->kelamin = $item['kelamin'];
                    $calon->status = 'Belum Aktif';
                    $calon->role = $item['role'];
                    $calon->save();
                }
                return redirect()->route('calon.index');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
