@extends('dashboard.template')

@section('content')
<div class="container-fluid">
    <div class="card" style="background: #f5f5f5">
        <div class="basic-form">
		@foreach($films as $films)
            <form method="POST" action="{{URL('admin/dashboard/film', $films->id_film) }}" enctype="multipart/form-data"> 
                @csrf
				{{ method_field('PATCH')}}
                <div class="form-group">
                    <label>nama film</label>
                    <input id="nama_film" class="form-control" type="text" name="nama_film" value="{{$films->nama_film}}">
                </div>
				<div class="form-group">
                    <label>Status tayang</label>
					<select name="status_tayang" id="status_tayang" class="form-control">
                            <option value="1">
							@if($films->status_tayang=='1')
                            selected
                            @endif
                            >1</option>
                            <option value="0">
							@if($films->status_tayang=='0')
                            selected
                            @endif
                            >0</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
					<textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" value="{{$films->deskripsi}}"></textarea>
                </div>
				<div class="form-group">
                    <label>Durasi</label>
                    <input id="durasi" class="form-control" type="time" name="durasi" value="{{$films->durasi}}">
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
                    <input id="tgl_mulai" class="form-control" type="date" name="tgl_mulai" value="{{$films->tgl_mulai}}">
                </div>
				<div class="form-group">
                    <label>tanggal Selesai</label>
                    <input id="tanggal_selesai" class="form-control" type="date" name="tanggal_selesai" value="{{$films->tanggal_selesai}}">
                </div>
				<div class="form-group row">
					<div class="col-sm-10">
                       <input type="file" name="foto_film" id="foto_film" class="form-control" value="{{$films->foto_film}}">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">UPDATE FILM</button>
            </form>
			@endforeach
        </div>
    </div>
</div>
@endsection
