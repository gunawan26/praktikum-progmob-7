@extends('dashboard.template')

@section('content')
<div class="container-fluid">
    <div class="card" style="background: #f5f5f5">
        <div class="basic-form">
            <form method="POST" action="{{route("admin.dashboard.bioskop.addbioskop")}}" enctype="multipart/form-data"> 
                @csrf
                <div class="form-group">
                    <label>Id</label>
                    <input id="id" class="form-control" type="text" name="id" placeholder="id" required autofocus>
                </div>
                <div class="form-group">
                    <label>nama bioskop</label>
                    <input id="nama_bioskop" class="form-control" type="nama_bioskop" name="nama_bioskop" placeholder="nama_bioskop" required>
                </div>
                <div class="form-group">
                    <label>alamat</label>
                    <input id="alamat" class="form-control" type="text" name="alamat" placeholder="alamat" required>
                </div>
                <div class="form-group">
                    <label>harga</label>
                    <input id="harga" class="form-control" type="text" name="harga" placeholder="harga" required>
                </div>
                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">ADD BIOSKOP</button>
            </form>
        </div>
    </div>
</div>
@endsection
