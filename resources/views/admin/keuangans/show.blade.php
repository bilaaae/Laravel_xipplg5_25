@extends('layouts.admin')

@section('title', 'Detail Keuangan')

@section('content')
<div class="container">
  <h1>Detail Pembayaran SPP</h1>
  <table class="table table-bordered">
    <tr>
      <th>Nama Siswa</th>
      <td>{{ $keuangan->student->nama_lengkap }}</td>
    </tr>
    <tr>
      <th>Bulan</th>
      <td>{{ $keuangan->bulan }}</td>
    </tr>
    <tr>
      <th>Jumlah</th>
      <td>Rp{{ number_format($keuangan->jumlah, 0, ',', '.') }}</td>
    </tr>
    <tr>
      <th>Status</th>
      <td>{{ $keuangan->status }}</td>
    </tr>
    <tr>
      <th>Tanggal Bayar</th>
      <td>{{ $keuangan->tanggal_bayar ?? '-' }}</td>
    </tr>
  </table>
  <a href="{{ route('keuangans.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
