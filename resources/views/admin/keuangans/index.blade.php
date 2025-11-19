@extends('layouts.admin')

@section('title', 'Data Keuangan')

@section('content')
<div class="container">
  <h1 class="mb-4">Data Keuangan SPP</h1>
  <a href="{{ route('keuangans.create') }}" class="btn btn-primary mb-3">+ Tambah Pembayaran</a>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama Siswa</th>
        <th>Bulan</th>
        <th>Jumlah</th>
        <th>Status</th>
        <th>Tanggal Bayar</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($keuangans as $k)
      <tr>
        <td>{{ $k->id }}</td>
        <td>{{ $k->student->nama_lengkap }}</td>
        <td>{{ $k->bulan }}</td>
        <td>Rp{{ number_format($k->jumlah, 0, ',', '.') }}</td>
        <td>{{ $k->status }}</td>
        <td>{{ $k->tanggal_bayar ?? '-' }}</td>
        <td>
          <a href="{{ route('keuangans.show', $k->id) }}" class="btn btn-info btn-sm">Detail</a>
          <a href="{{ route('keuangans.edit', $k->id) }}" class="btn btn-warning btn-sm">Edit</a>
          <form action="{{ route('keuangans.destroy', $k->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
