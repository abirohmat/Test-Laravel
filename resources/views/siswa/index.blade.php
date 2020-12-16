@extends('layouts.master')

@section('content')
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>

	<div class="container">
		@if(session('sukses'))
		<div class="alert alert-success" role="alert">
		 {{session('sukses')}}
		</div>
		@endif
		<div class="row">
			<div class="col-6">
				<h1><b>DATA MAHASISWA</b></h1><br>
			</div>
			<div class="col-6">
				<!-- Button trigger modal -->
				<button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#exampleModal">
				  Tambah data mahasiswa
				</button>
				<!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        <form action="/siswa/create" method="POST">
				        	{{csrf_field()}}
						  <div class="form-group">
						    <label for="exampleInputEmail1">Nama Depan</label>
						    <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="Nama Depan">
						  </div>

						  <div class="form-group">
						    <label for="exampleInputEmail1">Nama Belakang</label>
						    <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="Nama Belakang">
						  </div>

						  <div class="form-group">
						   <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
						    <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
						      <option value="L">Laki-laki</option>
						      <option value="P">Perempuan</option>
						    </select>
						  </div>

						  <div class="form-group">
						    <label for="exampleInputEmail1">Agama</label>
						    <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="Agama">
						  </div>

						  <div class="form-group">
						    <label for="exampleFormControlTextarea1">Alamat</label>
						    <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
						  </div>
				    </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				        <button type="submit" class="btn btn-primary">Submit</button>
				        </form>
				      </div>
				    </div>
				  </div>
				</div>
			</div>
				<table class="table table-hover">
					<tr>
						<th>NAMA DEPAN</th>
						<th>NAMA BELAKANG</th>
						<th>JENIS KELAMIN</th>
						<th>AGAMA</th>
						<th>ALAMAT</th>
						<th>AKSI</th>
					</tr>
					@foreach($data_siswa as $siswa)
					<tr>
						<td>{{$siswa->nama_depan}}</td>
						<td>{{$siswa->nama_belakang}}</td>
						<td>{{$siswa->jenis_kelamin}}</td>
						<td>{{$siswa->agama}}</td>
						<td>{{$siswa->alamat}}</td>
						<td>
							<a href="/siswa/{{$siswa->id}}/edit" class="btn-warning btn-sm">Edit</a>
							<a href="/siswa/{{$siswa->id}}/delete" class="btn-danger btn-sm" onclick="return confitm('yakin mau dihapus ?')">Delete</a>
						</td>
					</tr> 
					@endforeach
				</table>
			</div>
@stop
@section('content1')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>

