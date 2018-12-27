@extends('dashboard.template')

@section('content')
<div class="container-fluid">
    <div class="card" style="background: #f5f5f5">
        <div class="basic-form">
            <form method="POST" action="{{URL('admin/dashboard/film') }}" enctype="multipart/form-data"> 
                @csrf
                <div class="form-group">
                    <label>nama film</label>
                    <input id="nama_film" class="form-control" type="text" name="nama_film" placeholder="nama film" required>
                </div>
				<div class="form-group">
                    <label>Status tayang</label>
					<select name="status_tayang" id="status_tayang" class="form-control">
                            <option value="1">1</option>
                            <option value="0">0</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
					<textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="deskripsi" rows="3"></textarea>
                </div>
				<div class="form-group">
                    <label>Durasi</label>
                    <input id="durasi" class="form-control" type="time" name="urasi" placeholder="durasi" required>
                </div>
				<div class="form-group">
                    <label>Id Genre</label>
					<select id="id_genre" class="form-control" name="id_genre" required>
						@forelse ($genre_films as $genre_films)
							<option value="{{$genre_films->id_genre}}"> {{$genre_films->nama_genre}}</option>
                            @empty
                        @endforelse
                    </select>
                </div>
				<div class="form-group">
                    <label>Id Kategori Umum</label>
					<select id="id_kategori_umur" class="form-control" name="id_kategori_umur" required>
						@forelse ($kategori_umurs as $kategori_umurs)
							<option value="{{$kategori_umurs->id_kategori_umur}}"> {{$kategori_umurs->nama_kategori}}</option>
                            @empty
                        @endforelse
                    </select>
                </div>
				<div class="form-group">
                    <label>tanggal mulai</label>
                    <input id="tgl_mulai" class="form-control" type="date" name="tgl_mulai" placeholder="tgl_mulai" required>
                </div>
				<div class="form-group row">
					<div class="col-sm-10">
                       <input type="file" name="foto_film" class="form-control" placeholder="File">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">ADD FILM</button>
            </form>
        </div>
    </div>
</div>
@endsection
