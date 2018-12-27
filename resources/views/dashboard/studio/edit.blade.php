@extends('dashboard.template')
@section('content')
<div class="container-fluid">
    <div class="card" style="background: #f5f5f5">
        <div class="basic-form">
		@foreach($studios as $studios)
            <form method="POST" action="{{URL('admin/dashboard/studio', $studios->id_studio)}}" enctype="multipart/form-data"> 
				@csrf
				{{ method_field('PATCH')}}
				<div class="form-group">
                <label>Id Bioskop</label>
					<select id="id_bioskop" class="form-control" name="id_bioskop" required>
						@forelse ($bioskops as $bioskops)
							<option value="{{$bioskops->id_bioskop}}">{{$bioskops->nama_bioskop}}</option>
                            @empty
                        @endforelse
                    </select>
                </div>
                <div class="form-group">
                    <label>kode studio</label>
					<input type="text" class="form-control" id="kode_studio" name="kode_studio" value="{{$studios->kode_studio}}" >
                </div>
                <div class="form-group">
                    <label>kapasitas</label>
                    <input id="kapasitas" class="form-control" type="text" name="kapasitas" value="{{$studios->kapasitas}}">
                </div>
				<div class="form-group">
                    <label>jumlah baris</label>
                    <input id="jumlah_baris" class="form-control" type="text" name="jumlah_baris" value="{{$studios->jumlah_baris}}">
                </div>
				<div class="form-group">
                    <label>jumlah kolom</label>
                    <input id="jumlah_kolom" class="form-control" type="text" name="jumlah_kolom" value="{{$studios->jumlah_kolom}}">
                </div>
                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">UPDATE BIOSKOP</button>
            </form>
			@endforeach
        </div>
    </div>
</div>
@endsection
