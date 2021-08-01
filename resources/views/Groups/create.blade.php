@extends('layouts.app')

@section('title', 'Barang Keluar')

@section('content')
<div class="container">
<div class="jumbotron">
<form action="/groups" method="POST">

@csrf

<div class="form-group" >
<label for="id">Id</label>
<input type="text" class="form-control" id="Id"
                    name="Id" placeholder="Id"
                    value="{{ old('Id') }}">
</div>

<div class="form-group">
<label for="namabarangk">namabarang</label>
<input type="text" class="form-control" id="namabarangk"
                    name="namabarangk" placeholder="namabarangk"
                    value="">
</div>

<div class="form-group">
<label for="jumalah">jumalah</label>
<input type="text" class="form-control" id="jumalah"
                    name="jumalah" placeholder="jumalah"
                    value="">
<div class="form-group">
<label for="penerima">penerima</label>
<input type="text" class="form-control" id="penerima"
                    name="penerima" placeholder="penerima"
                    value="">
                  
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>



   
@endsection