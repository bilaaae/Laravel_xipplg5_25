@extends('layouts.admin')
@section('title', 'Tambah Keuangan')

@section('content')
    <div class="container">
        <h1>Tambah Pembayaran SPP</h1>
        <form action="{{ route('admin.keuangans.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Nama Siswa</label>
                <select name="student_id" class="form-control" required>
                    <option value="">-- Pilih Siswa --</option>
                    @foreach($students as $s)
                        <option value="{{ $s->id }}">{{ $s->nama_lengkap }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label>Bulan</label>
                <select name="bulan" class="form-control" required>
                    <option value="">-- Pilih Bulan --</option>
                    <option value="Januari">Januari</option>
                    <option value="Februari">Februari</option>
                    <option value="Maret">Maret</option>
                    <option value="April">April</option>
                    <option value="Mei">Mei</option>
                    <option value="Juni">Juni</option>
                    <option value="Juli">Juli</option>
                    <option value="Agustus">Agustus</option>
                    <option value="September">September</option>
                    <option value="Oktober">Oktober</option>
                    <option value="November">November</option>
                    <option value="Desember">Desember</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Jumlah</label>
                <input type="number" name="jumlah" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="Belum Lunas">Belum Lunas</option>
                    <option value="Lunas">Lunas</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Tanggal Bayar</label>
                <input type="date" name="tanggal_bayar" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
@endsection
