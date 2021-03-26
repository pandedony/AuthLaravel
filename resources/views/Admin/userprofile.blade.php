@extends('Admin/adminlayout')

@section('title', 'Daftar Mahasiswa')

@section('container')
<div class="main mt-3">
  <h1>Data User</h1>
  <div class="row">
    <div class="col-lg-6">

      <div class="card" style=" ">
        <div class="card-body">
          <h5 class="card-title">{{ $user->name }}</h5>
          <h6 class="card-subtitle mb-2 text-muted">{{ $user->id }}</h6>
          <p class="card-text">{{ $user->email }}</p>
          <p class="card-text">{!! QrCode::size(100)->generate('admin/userdata/'.$user->id); !!}</p>
          <!-- <p class="card-text">{{ $user->jurusan }}</p> -->


          <a href="{{ $user->id }}/edit" class="btn btn-primary">Edit</a>
          <form action="/admin/userdata/{{ $user->id }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger">Delete</button>
          </form>
          <a href="/admin/userdata" class="card-link">Kembali</a>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
