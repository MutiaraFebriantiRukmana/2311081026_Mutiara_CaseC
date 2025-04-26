<?php

namespace App\Http\Controllers;

use App\Models\camping;
use Illuminate\Http\Request;

class CampingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //$camping = ca::latest()->paginate(10);
        $campings = camping::paginate(10);
        return view('penyewaan/index', compact('campings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('penyewaan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_penyewa'=> 'required|string|max:255',
            'nama_alat'=> 'required|string|max:255',
            'tanggal_sewa'=> 'required|date',
            'tanggal_kembali'=> 'required|date',
            'jumlah_unit'=> 'required|integer|max:10',
            'harga_per_hari'=> 'required|integer|max:25500000',
            'status' => 'required|in:dipinjam,dikembalikan,terlambat'
        ]);
        camping::create($request->all());
        return redirect()->route('penyewaan.index')->with('success','Data penyewa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $campings = camping::findOrFail($id);
        return view('penyewaan.edit', compact('campings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        //
        $request->validate([
            'nama_penyewa'=> 'required|string|max:255',
            'nama_alat'=> 'required|string|max:255',
            'tanggal_sewa'=> 'required|date',
            'tanggal_kembali'=> 'required|date',
            'jumlah_unit'=> 'required|integer|max:10',
            'harga_per_hari'=> 'required|integer|max:25500000',
            'status' => 'required|in:dipinjam,dikembalikan,terlambat'
        ]
        );
        $campings = camping::findOrFail($id);
        $campings -> update($request-> all());
        return redirect()->route('penyewaan.index')->with('success','Data penyewa berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) //softdelete
    {
        //
        $campings = camping::findOrFail($id);
        $campings->delete();
        return redirect()->route('penyewaan.index')->with('success','Data penyewa berhasil dihapus');
    }

    public function trash()
    {
        $campings = camping::onlyTrashed()->paginate(10); // hanya ambil data yang dihapus (softdelete)
        return view('penyewaan.trash', compact('campings'));
    }

    public function restore($id)
    {
        $camping = camping::onlyTrashed()->findOrFail($id);
        $camping->restore();
        return redirect()->route('penyewaan.trash')->with('success', 'Data berhasil dipulihkan.');
    }

    public function forceDelete($id) //delete permanen
    {
        $camping = camping::onlyTrashed()->findOrFail($id);
        $camping->forceDelete();
        return redirect()->route('penyewaan.trash')->with('success', 'Data berhasil dihapus permanen.');
    }




}
