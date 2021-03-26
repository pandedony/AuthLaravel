@extends('Admin/adminlayout')

@section('title', 'Daftar Mahasiswa')

@section('container')
<div class="main mt-1">
  <!-- {!! QrCode::size(100)->generate(Request::url()); !!} -->
  <h1 class="mt-4 mb-4"> User DataTable Server Side</h2>
  <a href="/admin/userdata/cetak" class="btn btn-primary my-2" target="_blank">CETAK PDF</a>
  <a href="/admin/userdata/export_excel" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>
  @if (session('status'))
  <div style="color:green; font-weight:bold; font-size:15px;" class="my-2 alert alert-success">
    {{session('status')}}
  </div>
  @endif
  <table id="data_users_side" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Created_at</th>
            <th>Barcode</th>
            <th>Aksi</th>
        </tr>
    </thead>
  </table>
</div>
@endsection
