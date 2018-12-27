@extends('dashboard.template')

@section('content')
<div class="container-fluid">
    <div class="card" style="background: #f5f5f5">
        <div class="basic-form">
            <form method="POST" action="{{URL('admin/dashboard/kursi') }}" enctype="multipart/form-data"> 
                @csrf
				<div class="form-group">
                    <label>Id Studio</label>
                    <select id="id_studio" class="form-control" name="id_studio" required>
						@forelse ($studios as $studios)
							<option value="{{$studios->id_studio}}">{{$studios->kode_studio}}</option>
                            @empty
                        @endforelse
                    </select>
                </div>
				<div class="form-group">
                    <label>Kode Kursi</label>
                    <input id="Kode_kursi" class="form-control" type="text" name="kode_kursi" placeholder="kode kursi" required>
                </div>
                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">ADD SEAT</button>
            </form>
        </div>
    </div>
</div>
@endsection
