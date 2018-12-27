@extends('dashboard.template')

@section('content')
<div class="container-fluid">
    <div class="card" style="background: #f5f5f5">
        <div class="basic-form">
            <form method="POST" action="{{URL('admin/dashboard/genre') }}" enctype="multipart/form-data"> 
                @csrf
                <div class="form-group">
                    <label>nama genre</label>
                    <input id="nama_genre" class="form-control" type="nama_genre" name="nama_genre" placeholder="nama genre" required>
                </div>
                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">ADD GENRE</button>
            </form>
        </div>
    </div>
</div>
@endsection
