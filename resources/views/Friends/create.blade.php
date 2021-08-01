@extends('layouts.app')

@section('title', 'Tambah Data Barang')

@section('content')
<div class="container">
<div class="jumbotron">
<form action="/friends" method="POST">

@csrf

<div class="form-group" >
<label for="id">Id</label>
<input type="text" class="form-control" id="Id"
                    name="Id" placeholder="Id"
                    value="{{ old('Id') }}">
</div>

<div class="form-group">
<label for="namabarang">namabarang</label>
<input type="text" class="form-control" id="namabarang"
                    name="namabarang" placeholder="namabarang"
                    value="">
</div>

<div class="form-group">
<label for="stock">stock</label>
<input type="text" class="form-control" id="stock"
                    name="stock" placeholder="stock"
                    value="">
<div class="form-group">
<label for="keterangan">keterangan</label>
<input type="text" class="form-control" id="keterangan"
                    name="keterangan" placeholder="keterangan"
                    value="">
                    <div class="form-group">
<label for="tanggal">tanggal</label>
<input type="date" class="form-control" id="tanggal"
                    name="tanggal" placeholder="tanggal"
                    value="">
</div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>



   
@endsection