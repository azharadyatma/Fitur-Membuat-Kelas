<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use Illuminate\Support\Facades\Auth;

class KelasController extends Controller
{
    // Metode index untuk menampilkan daftar kelas

    public function index()
    {
        $kelas = Kelas::where('user_id', Auth::id())
                    ->where('archived', false) // Tambahkan kondisi ini
                    ->get();
        return view('kelas.index', ['title' => 'Kelas Saya', 'kelas' => $kelas]);
    }

    // Metode create untuk menampilkan form pembuatan kelas baru
    public function create()
    {
        return view('kelas.create', ['title' => 'Tambah Kelas']);
    }

    // Metode store untuk menyimpan kelas baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'tingkat_kelas' => 'required|string|max:255',
            'deskripsi_kelas' => 'required|string',
            'gambar_kelas' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'silabus_kelas' => 'nullable|mimes:pdf|max:2048',
        ]);

        $kelas = new Kelas();
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->user_id = Auth::id();
        $kelas->tingkat_kelas = $request->tingkat_kelas;
        $kelas->deskripsi_kelas = $request->deskripsi_kelas;

        if ($request->hasFile('gambar_kelas')) {
            $imageName = time().'.'.$request->gambar_kelas->extension();
            $request->gambar_kelas->move(public_path('images'), $imageName);
            $kelas->gambar_kelas = $imageName;
        }

        if ($request->hasFile('silabus_kelas')) {
            $pdfName = time().'.'.$request->silabus_kelas->extension();
            $request->silabus_kelas->move(public_path('pdfs'), $pdfName);
            $kelas->silabus_kelas = $pdfName;
        }

        $kelas->save();

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil ditambahkan');
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'nama_kelas' => 'required|string|max:255',
        'tingkat_kelas' => 'required|string|max:255',
        'deskripsi_kelas' => 'required|string',
        'gambar_kelas' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'silabus_kelas' => 'nullable|mimes:pdf|max:2048',
    ]);

    $kelas = Kelas::findOrFail($id);
    $kelas->nama_kelas = $request->nama_kelas;
    $kelas->tingkat_kelas = $request->tingkat_kelas;
    $kelas->deskripsi_kelas = $request->deskripsi_kelas;

    if ($request->hasFile('gambar_kelas')) {
        $imageName = time().'.'.$request->gambar_kelas->extension();
        $request->gambar_kelas->move(public_path('images'), $imageName);
        $kelas->gambar_kelas = $imageName;
    }

    if ($request->hasFile('silabus_kelas')) {
        $pdfName = time().'.'.$request->silabus_kelas->extension();
        $request->silabus_kelas->move(public_path('pdfs'), $pdfName);
        $kelas->silabus_kelas = $pdfName;
    }

    $kelas->save();

    return redirect()->route('kelas.index')->with('success', 'Kelas berhasil diperbarui');
}


    // Metode show untuk menampilkan detail kelas
    public function show($id)
    {
        $kelas = Kelas::findOrFail($id);
        return view('kelas.show', ['title' => $kelas->nama_kelas, 'kelas' => $kelas]);
    }

    // Metode destroy untuk menghapus kelas
    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil dihapus');
    }

    // Metode edit untuk mengedit kelas
    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);
        return view('kelas.edit', ['title' => 'Edit Kelas', 'kelas' => $kelas]);
    }

    public function archive($id)
    {
        $kelas = Kelas::find($id);
        if ($kelas) {
            $kelas->archived = true;
            $kelas->save();
            return redirect()->route('kelas.index')->with('success', 'Kelas berhasil diarsipkan');
        }
        return redirect()->route('kelas.index')->with('error', 'Kelas tidak ditemukan');
    }
    
}


