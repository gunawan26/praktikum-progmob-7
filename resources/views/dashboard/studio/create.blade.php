@extends('dashboard.template')
@section('content')
<div class="container-fluid">
    <div class="card" style="background: #f5f5f5">
        <div class="basic-form">
            <form method="POST" action="{{URL('admin/dashboard/studio') }}" enctype="multipart/form-data"> 
                @csrf
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
                    <input id="kode_studio" class="form-control" type="text" name="kode_studio" placeholder="kode studio" required>
                </div>
                <div class="form-group">
                    <label>kapasistas</label>
                    <input id="kapasitas" class="form-control" type="text" name="kapasitas" placeholder="kapasitas" required>
                </div>
				<div class="form-group">
                    <label>jumlah baris</label>
                    <input id="jumlah_baris" class="form-control" type="text" name="jumlah_baris" placeholder="jumlah baris" required>
                </div>
				<div class="form-group">
                    <label>jumlah kolom</label>
                    <input id="jumlah_kolom" class="form-control" type="text" name="jumlah_kolom" placeholder="jumlah kolom" required>
                </div>
                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">ADD BIOSKOP</button>
            </form>
        </div>
    </div>
</div>
@endsection
