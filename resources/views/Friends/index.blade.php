@extends('layouts.app')

@section('title', 'Data Barang Masuk')

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
<h1 class="display-6">Data Barang Masuk</h1>

<a href="/friends/create" class="card-link btn-primary">Tambah Data</a>
@foreach ($friends as $friend)
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <a href="/friends/{{$friend['id']}}" class="card-title"> {{ $friend['namabarang'] }}</a>
      <p class="card-text"> {{ $friend['stock'] }}</p>
      <h6 class="card-text"> {{ $friend['keterangan'] }}</h6>
    <p class="card-text"> {{ $friend['tanggal'] }}</p>

    <a href="/friends/{{$friend['id']}}/edit" class="card-link btn-warning">Edit</a>
    <form action="/friends/{{ $friend['id']}}" method="POST">
    <a href="" class="card-link btn-danger" style='width:auto;'>Hapus</a>
    </form>
  </div>
</div>


@endforeach
<div>
{{$friends->links()}}
 </div>
@endsection