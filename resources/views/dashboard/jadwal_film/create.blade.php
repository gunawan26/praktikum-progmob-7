@extends('dashboard.template')

@section('content')
<div class="container-fluid">
    <div class="card" style="background: #f5f5f5">
        <div class="basic-form">
            <form method="POST" action="{{URL('admin/dashboard/jadwal_film') }}" enctype="multipart/form-data"> 
                @csrf
                <div class="form-group">
                <label>Id Film</label>
					<select id="id_film" class="form-control" name="id_film" required>
						@forelse ($films as $films)
							<option value="{{$films->id_film}}">{{$films->nama_film}}</option>
                            @empty
                        @endforelse
                    </select>
                </div>
				<div class="form-group">
                    <label>Id studio</label>
                    <select id="id_studio" class="form-control" name="id_studio" required>
						@forelse ($studios as $studios)
							<option value="{{$studios->id_studio}}">{{$studios->kode_studio}}</option>
                            @empty
                        @endforelse
                    </select>
                </div>
                <div class="form-group">
                    <label>Tanggal Tayang</label>
                    <input id="tanggal_tayang" class="form-control" type="date" name="tanggal_tayang" placeholder="tanggal tayang" required>
                </div>
				<div class="form-group">
                    <label>Jam Mulai</label>
                    <input id="jam_mulai" class="form-control" type="time" name="jam_mulai" placeholder="jam mulai" required>
                </div>
				<div class="form-group">
                    <label>Jam Selesai</label>
                    <input id="jam_selesai" class="form-control" type="time" name="jam_selesai" placeholder="jam selesai" required>
                </div>
                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">ADD JADWAL</button>
            </form>
        </div>
    </div>
</div>
@endsection
