<?php

namespace App\Http\Controllers;

use App\Models\Kelasku;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function create()
    {
        return view('kelas.create', ['title' => 'Tambah Kelas']);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'dosen' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'slug' => 'required|string|unique:kelas,slug|max:255',
        ]);

        Kelasku::create($validatedData);

        return redirect('/')->with('success', 'Kelas berhasil ditambahkan');
    }
}
