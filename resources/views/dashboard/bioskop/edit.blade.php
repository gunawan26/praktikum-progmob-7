@extends('dashboard.template')

@section('content')
<div class="container-fluid">
    <div class="card" style="background: #f5f5f5">
        <div class="basic-form">
			@foreach($bioskops as $bioskops)
            <form method="POST" action="{{URL('admin/dashboard/bioskop', $bioskops->id_bioskop) }}" enctype="multipart/form-data"> 
                @csrf
				{{ method_field('PATCH')}}
                <div class="form-group">
                    <label>nama bioskop</label>
                    <input id="nama_bioskop" class="form-control" type="nama_bioskop" name="nama_bioskop" value="{{$bioskops->nama_bioskop}}">
                </div>
                <div class="form-group">
                    <label>alamat</label>
                    <input id="alamat" class="form-control" type="text" name="alamat" value="{{$bioskops->alamat}}">
                </div>
                <div class="form-group">
                    <label>harga</label>
                    <input id="harga" class="form-control" type="text" name="harga" value="{{$bioskops->harga}}">
                </div>
                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">UPDATE BIOSKOP</button>
            </form>
			@endforeach
        </div>
    </div>
</div>
@endsection
