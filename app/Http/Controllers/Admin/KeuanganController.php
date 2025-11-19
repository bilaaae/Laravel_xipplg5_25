<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Keuangan;
use App\Models\Student;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    public function index()
    {
        $keuangans = Keuangan::with('student')->get();
        return view('admin.keuangans.index', compact('keuangans'));
    }

    public function create()
    {
        $students = Student::all();
        return view('admin.keuangans.create', compact('students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'bulan' => 'required',
            'jumlah' => 'required|numeric',
            'status' => 'required',
            'tanggal_bayar' => 'nullable|date',
        ]);

        Keuangan::create($request->all());
        return redirect()->route('admin.keuangans.index')->with('success', 'Data keuangan berhasil ditambahkan');
    }

    public function show($id)
    {
        $keuangan = Keuangan::with('student')->findOrFail($id);
        return view('admin.keuangans.show', compact('keuangan'));
    }

    public function edit($id)
    {
        $keuangan = Keuangan::findOrFail($id);
        $students = Student::all();
        return view('admin.keuangans.edit', compact('keuangan', 'students'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'student_id' => 'required',
            'bulan' => 'required',
            'jumlah' => 'required|numeric',
            'status' => 'required',
            'tanggal_bayar' => 'nullable|date',
        ]);

        $keuangan = Keuangan::findOrFail($id);
        $keuangan->update($request->all());

        return redirect()->route('admin.keuangans.index')->with('success', 'Data keuangan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $keuangan = Keuangan::findOrFail($id);
        $keuangan->delete();
        return redirect()->route('admin.keuangans.index')->with('success', 'Data keuangan berhasil dihapus');
    }
}
