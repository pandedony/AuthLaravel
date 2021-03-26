
  
@extends('Admin/adminlayout')

@section('title', 'Daftar Mahasiswa')

@section('container')
<div class="main mt-1">
  <h3>Data User<h3>
  <table id="data_users_reguler" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Created_at</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $item)
            <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->created_at}}</td>
                </tr>
            @endforeach
            
    </table>

</div>
          


@endsection
