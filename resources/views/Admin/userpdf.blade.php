<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Membuat Laporan PDF Dengan DOMPDF Laravel</h4>
	</center>
<div class="main mt-1">
<!-- {!! QrCode::size(100)->generate(Request::url()); !!} -->
<h1 class="mt-4 mb-4"> User DataTable Server Side</h2>
<!-- <a href="/admin/userdata/cetak" class="btn btn-primary" target="_blank">CETAK PDF</a> -->

        <table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Email</th>
				<!-- <th>Barcode</th> -->

			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($user as $p)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$p->name}}</td>
				<td>{{$p->email}}</td>
        <!-- <td>{!! QrCode::size(100)->generate('admin/userdata/'.$p->id); !!}</td> -->
			</tr>
			@endforeach
		</tbody>
	</table>


</div>
          
</body>
</html>
