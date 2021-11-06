<?php

namespace App\Http\Controllers;

use App\Guru;
use App\Kelas;
use App\RiwayatLogin;
use App\Sekolah;
use App\Siswa;
use App\Tapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Dashboard';
        $sekolah = Sekolah::first();
        $tapel = Tapel::first();
        $data_riwayat_login = RiwayatLogin::where('user_id', '!=', Auth::user()->id)->orderBy('status_login', 'DESC')->orderBy('updated_at', 'DESC')->get();

        if (Auth::user()->role == 1) {
            $jumlah_guru = Guru::all()->count();
            $jumlah_siswa = Siswa::where('status', 1)->count();
            $jumlah_kelas = Kelas::where('tapel_id', $tapel->id)->count();

            return view('dashboard.admin', compact(
                'title',
                'data_riwayat_login',
                'sekolah',
                'tapel',
                'jumlah_guru',
                'jumlah_siswa',
                'jumlah_kelas',
            ));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
