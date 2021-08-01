@extends('layouts.app')

@section('title', 'Data Barang Keluar')

@section('content')
<div class="container">
<div class="jumbotron">
@if(session('msg'))
<div class="alert alert-success alert-dismissible fade show mt-2"
                role="alert">
{{session('msg')}}
<button type="button" class="close" data-dismiss="alert"
                aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
@endif
<center><h1><font size="6" color="black" face="Cursive" >Data Barang Keluar</font></h1></center>
<a href="groups/create" class="btn btn-primary mb-1">
Tambah Data</a> </br>

<table class="table table-bordered border-secondary">
<thead class="thead-dark">
<tr>
<th scope="col">No</th>
<th scope="col">Nama Barang</th>
<th scope="col">Jumlah</th>
<th scope="col">Penerima</th>
<th scope="col">Aksi</th>
</th>
</tr>
</thead>
<tbody>
@foreach ($groups as $group)
<tr>
<tr bgcolor='#B0E0E6'  align='center'>
<td>{{ $loop->iteration }}</td>
<td>{{ $group->namabarangk }}</td>
<td>{{ $group->jumlah }}</td>
<td>{{ $group->penerima }}</td>
<td>

<button> <a href="/groups/{{$group['id']}}/edit" class='button' style='width:auto;'>Edit</button>
<button> <a href="" class='button' style='width:auto;'>Hapus</button>
</td>
</tr>
@endforeach
<div>
    {{$groups->links()}}
 </div>
@endsection