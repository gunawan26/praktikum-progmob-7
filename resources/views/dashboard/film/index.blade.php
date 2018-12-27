@extends('dashboard.template')

@section('content')
<div class="container-fluid">
	<a href="{{URL('admin/dashboard/film/create') }}" class="btn btn-success">Tambah Film</a>
    <div class="card">
    <div class="card-body">
        <div class="table-responsive m-t-40">
            <table id="myTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id Film</th>
                        <th scope="col">Nama Film</th>
                        <th scope="col">Status Tayang</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Durasi</th>
                        <th scope="col">Id Genre</th>
						<th scope="col">Id Kategori Umur</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                        <th scope="col">Tanggal Mulai</th>
                        <th scope="col">Tanggal Selesai</th>
                        <th scope="col">Foto Film</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($films as $films)
                    <tr>
                        <td>{{$films->id_film}}</td>
                        <td>{{$films->nama_film}}</td>
                        <td>{{$films->status_tayang}}</td>
                        <td>{{$films->deskripsi}}</td>
                        <td>{{$films->durasi}}</td>
                        <td>{{$films->id_genre}}</td>
						<td>{{$films->id_kategori_umur}}</td>
						<td>{{$films->created_at}}</td>
						<td>{{$films->updated_at}}</td>
						<td>{{$films->tgl_mulai}}</td>
						<td>{{$films->tanggal_selesai}}</td>
						<td>{{$films->foto_film}}</td>
                        <td>
                            <a href="{{URL('admin/dashboard/film/'.$films->id_film.'/edit')}}" class="btn btn-primary">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <form action="{{URL('admin/dashboard/film/'.$films->id_film)}}" method="POST" >
								{{ csrf_field() }}
								{{ method_field('DELETE')}} 
								<button type="Submit" class="btn btn-danger">
									<i class="fa fa-trash"></i>	
								</button>
							</form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
