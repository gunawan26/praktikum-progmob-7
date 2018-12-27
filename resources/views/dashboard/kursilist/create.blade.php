@extends('dashboard.template')

@section('content')
<div class="container-fluid">
    <div class="card" style="background: #f5f5f5">
        <div class="basic-form">
            <form method="POST" action="{{URL('admin/dashboard/kursilist') }}" enctype="multipart/form-data"> 
                @csrf
                <div class="form-group">
                    <label>Id Jadwal</label>
                    <select id="id_jadwal" class="form-control" name="id_jadwal" required>
						@forelse ($jadwal_films as $jadwal_films)
							<option value="{{$jadwal_films->id_jadwal}}">{{$jadwal_films->id_jadwal}}</option>
                            @empty
                        @endforelse
                    </select>
                </div>
				<div class="form-group">
                    <label>Status Kursi</label>
                    <input id="status_kursi" class="form-control" type="status_kursi" name="status_kursi" placeholder="status kursi" required>
                </div>
				<div class="form-group">
                    <label>Id Kursi</label>
                    <select id="id_kursi" class="form-control" name="id_kursi" required>
						@forelse ($kursis as $kursi)
							<option value="{{$kursi->id_kursi}}">{{$kursi->kode_kursi}}</option>
                            @empty
                        @endforelse
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">ADD SEAT</button>
            </form>
        </div>
    </div>
</div>
@endsection
