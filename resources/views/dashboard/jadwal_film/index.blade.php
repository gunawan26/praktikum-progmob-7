@extends('dashboard.template')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-xs-5">
                            <div class="icon-big icon-warning text-center">
                                <i class="ti-eye"></i>
                            </div>
                        </div>
                        <div class="col-xs-7">
                            <div class="numbers">
                                <p>Tambah Film</p>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <hr />
                        <div class="stats">
                            <a href="{{URL('admin/dashboard/film/index') }}" class="btn btn-success">Film</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-xs-5">
                            <div class="icon-big icon-success text-center">
                                <i class="ti-user"></i>
                            </div>
                        </div>
                        <div class="col-xs-7">
                            <div class="numbers">
                                <p>Tambah Kategori Umur</p>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <hr />
                        <div class="stats">
                           <a href="{{URL('admin/dashboard/umur/create') }}" class="btn btn-success">Tambah Kategori Umur</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-xs-5">
                            <div class="icon-big icon-danger text-center">
                                <i class="ti-pulse"></i>
                            </div>
                        </div>
                        <div class="col-xs-7">
                            <div class="numbers">
                                <p>Tambah Jadwal</p>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <hr />
                        <div class="stats">
                            <a href="{{URL('admin/dashboard/jadwal_film/create')}}" class="btn btn-success">Tambah Jadwal</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-xs-5">
                            <div class="icon-big icon-danger text-center">
                                <i class="ti-pulse"></i>
                            </div>
                        </div>
                        <div class="col-xs-7">
                            <div class="numbers">
                                <p>Tambah Genre Film</p>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <hr />
                        <div class="stats">
                            <a href="{{URL('admin/dashboard/genre/create') }}" class="btn btn-success">Tambah Genre</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
					<h4 class="title">Jadwal Film</h4>
					<div class="table-responsive m-t-40">
						<table id="myTable" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th scope="col">Id</th>
								<th scope="col">Id Film</th>
								<th scope="col">Id Studio</th>
								<th scope="col">Tanggal tayang</th>
								<th scope="col">Jam mulai</th>
								<th scope="col">Jam Selesai</th>
								<th scope="col">Create At</th>
								<th scope="col">Update At</th> 
							</tr>
						</thead>
						<tbody>
							@foreach($jadwal_films as $jadwal_films)
							<tr>
								<td>{{$jadwal_films->id_jadwal}}</td>
								<td>{{$jadwal_films->id_film}}</td>
								<td>{{$jadwal_films->id_studio}}</td>
								<td>{{$jadwal_films->tanggal_tayang}}</td>
								<td>{{$jadwal_films->jam_mulai}}</td>
								<td>{{$jadwal_films->jam_selesai}}</td>
								<td>{{$jadwal_films->created_at}}</td>
								<td>{{$jadwal_films->updated_at}}</td>	
								<td>
									<a href="{{URL('admin/dashboard/jadwal_film/'.$jadwal_films->id_jadwal.'/edit')}}" class="btn btn-primary">
										<i class="fa fa-pencil"></i>
									</a>
									<form action="{{URL('admin/dashboard/jadwal_film/'.$jadwal_films->id_jadwal)}}" method="POST" >
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
