@extends('dashboard.template')

@section('content')
<div class="container-fluid">
    <div class="card" style="background: #f5f5f5">
        <div class="basic-form">
		@foreach($bioskops as $bioskops)
            <form method="POST" action="{{route("admin.dashboard.bioskop.updatebioskop")}}" enctype="multipart/form-data"> 
                {{ csrf_field() }}
                {{ method_field('PATCH')}}
                <div class="form-group">
                    <label>Id</label>
                    <input id="id" class="form-control" type="text" name="id" value="{{$bioskops->id}}" placeholder="id" required autofocus>
                </div>
                <div class="form-group">
                    <label>nama bioskop</label>
                    <input id="nama_bioskop" class="form-control" type="nama_bioskop" name="nama_bioskop" value="{{$bioskops->nama_bioskop}} placeholder="nama_bioskop" required>
                </div>
                <div class="form-group">
                    <label>alamat</label>
                    <input id="alamat" class="form-control" type="text" name="alamat" value="{{$bioskops->alamat}} placeholder="alamat" required>
                </div>
                <div class="form-group">
                    <label>harga</label>
                    <input id="harga" class="form-control" type="text" name="harga" value="{{$bioskops->harga}} placeholder="harga" required>
                </div>
                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">UPDATE</button>
            </form>
			@endforeach
        </div>
    </div>
</div>
@endsection
