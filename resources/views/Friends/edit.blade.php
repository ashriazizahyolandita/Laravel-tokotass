@extends('layouts.app')

@section('title', 'Edit Barang') 

@section('content')
<form action="/friends/{{ $friend['id'] }}" method="post">
  @csrf
  @method('PUT')
  <div class="form-group">
    <label for="exampleInputEmail1">Nama Barang</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="namabarang" aria-describedby="emailHelp" value="{{ old('namabarang') ? old('namabarang') : $friend['namabarang'] }}">
    @error('namabarang')
    <div class="alert alert-danger">{{ $message}}</div> 
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Stock</label>
    <input type="text" class="form-control" name="stock" id="exampleInputPassword1" value="{{ old('stock') ? old('stock') : $friend['stock'] }}">
    @error('stock')
    <div class="alert alert-danger">{{ $message}}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Keterangan</label>
    <input type="text" class="form-control" name="keterangan" id="exampleInputPassword1" value="{{ old('keterangan') ? old('keterangan') : $friend['keterangan'] }}">
    @error('keterangan')
    <div class="alert alert-danger">{{ $message}}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Tanggal</label>
    <input type="text" class="form-control" name="tanggal" id="exampleInputPassword1" value="{{ old('tanggal') ? old('tanggal') : $friend['tanggal'] }}">
    @error('tanggal')
    <div class="alert alert-danger">{{ $message}}</div>
    @enderror
  </div>
 
  <button type="submit" class="btn btn-primary">Save</button>
</form>



   
@endsection