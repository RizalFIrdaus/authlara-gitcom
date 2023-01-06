<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $nilai = Http::withToken('63ad9f7fc15c404d7d039c37|44aYN4B5Be4jSM7tlbEICi6jrkMjCtg85KjyeB04')->get('http://127.0.0.1:8000/api/nilai')->json()['data'];
        return view('dashboard', compact('nilai'));
    }

    public function create(Request $request)
    {

        $matkul = Http::withToken('63ad7ed67b9e8c09f90b0796|1SUslR3FVNYb82kjoV3wr3fRkH7o1RHsyyALINWE')->get('http://127.0.0.1:10000/api/matakuliah')['data'];
        return view('create', compact('matkul'));
    }

    public function store(Request $request)
    {

        $response = Http::accept('application/json')->post('http://127.0.0.1:8000/api/nilai', [
            "npm" => $request->npm,
            "matkul" => $request->matkul,
            "nilai" => $request->nilai,
        ]);
        return redirect()->route('dashboard')->with('success', 'Successful Created Nilai');
    }

    public function edit($id)
    {
        $nilai = Http::withToken('63ad9f7fc15c404d7d039c37|44aYN4B5Be4jSM7tlbEICi6jrkMjCtg85KjyeB04')->get('http://127.0.0.1:8000/api/nilai/' . $id)->json()['data'];
        $matkul = Http::withToken('63ad7ed67b9e8c09f90b0796|1SUslR3FVNYb82kjoV3wr3fRkH7o1RHsyyALINWE')->get('http://127.0.0.1:10000/api/matakuliah')['data'];
        return view('edit', compact('nilai', 'matkul'));
    }

    public function update(Request $request, $id)
    {

        $nilai = Http::accept('application/json')->put('http://127.0.0.1:8000/api/nilai/' . $id, [
            'npm' => $request->npm,
            'matkul' => $request->matkul,
            'nilai' => $request->nilai,
        ]);

        return redirect()->route('dashboard');
    }

    public function destroy($id)
    {
        Http::delete('http://127.0.0.1:8000/api/nilai/' . $id);
        return redirect()->route('dashboard');
    }
}
