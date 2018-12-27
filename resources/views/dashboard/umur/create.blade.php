@extends('dashboard.template')

@section('content')
<div class="container-fluid">
    <div class="card" style="background: #f5f5f5">
        <div class="basic-form">
            <form method="POST" action="{{URL('admin/dashboard/umur') }}" enctype="multipart/form-data"> 
                @csrf
                <div class="form-group">
                    <label>nama Kategori</label>
                    <input id="nama_kategori" class="form-control" type="nama_kategori" name="nama_kategori" placeholder="nama kategori" required>
                </div>
				<div class="form-group">
                    <label>min umur</label>
                    <input id="min_umur" class="form-control" type="min_umur" name="min_umur" placeholder="minimal umur" required>
                </div>
                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">ADD UMUR</button>
            </form>
        </div>
    </div>
</div>
@endsection
