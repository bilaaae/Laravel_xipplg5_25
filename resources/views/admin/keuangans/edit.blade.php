@extends('layouts.admin')

@section('title', 'Edit Keuangan')

@section('content')
    <div class="container">
        <h1>Edit Data Pembayaran</h1>
        <form action="{{ route('keuangans.update', $keuangan->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Nama Siswa</label>
                <select name="student_id" class="form-control" required>
                    @foreach($students as $s)
                        <option value="{{ $s->id }}" {{ $s->id == $keuangan->student_id ? 'selected' : '' }}>
                            {{ $s->nama_lengkap }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label>Bulan</label>
                <select name="bulan" class="form-control" required>
                    @php
                        $bulanList = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                    @endphp
                    @foreach($bulanList as $b)
                        <option value="{{ $b }}" {{ $keuangan->bulan == $b ? 'selected' : '' }}>{{ $b }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Jumlah</label>
                <input type="number" name="jumlah" value="{{ $keuangan->jumlah }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="Belum Lunas" {{ $keuangan->status == 'Belum Lunas' ? 'selected' : '' }}>Belum Lunas
                    </option>
                    <option value="Lunas" {{ $keuangan->status == 'Lunas' ? 'selected' : '' }}>Lunas</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Tanggal Bayar</label>
                <input type="date" name="tanggal_bayar" value="{{ $keuangan->tanggal_bayar }}" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('keuangans.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
