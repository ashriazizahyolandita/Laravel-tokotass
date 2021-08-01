@extends('layouts.app')

@section('title', 'Edit Barang') 

@section('content')
<form action="/groups/{{ $group['id'] }}" method="post">
  @csrf
  @method('PUT')
  <div class="form-group">
    <label for="exampleInputEmail1">Nama Barang</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="namabarangk" aria-describedby="emailHelp" value="{{ old('namabarangk') ? old('namabarangk') : $friend['namabarang'] }}">
    @error('namabarangk')
    <div class="alert alert-danger">{{ $message}}</div> 
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">jumlah</label>
    <input type="text" class="form-control" name="jumlah" id="exampleInputPassword1" value="{{ old('jumlah') ? old('jumlah') : $friend['jumlah'] }}">
    @error('jumlah')
    <div class="alert alert-danger">{{ $message}}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Penerima</label>
    <input type="text" class="form-control" name="penerima" id="exampleInputPassword1" value="{{ old('penerima') ? old('penerima') : $friend['penerima'] }}">
    @error('penerima')
    <div class="alert alert-danger">{{ $message}}</div>
    @enderror
  </div>

 
  <button type="submit" class="btn btn-primary">Save</button>
</form>



   
@endsection