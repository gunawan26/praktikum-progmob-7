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
                                <i class="ti-server"></i>
                            </div>
                        </div>
                        <div class="col-xs-7">
                            <div class="numbers">
                                <p>Tambah Kursi</p>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <hr />
                        <div class="stats">
                            <a href="{{URL('admin/dashboard/kursilist/index')}}" class="btn btn-success">Tambah Kursi</a>
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
                                <i class="ti-money"></i>
                            </div>
                        </div>
                        <div class="col-xs-7">
                            <div class="numbers">
                                <p>Tambah Bioskop</p>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <hr />
                        <div class="stats">
                           <a href="{{URL('admin/dashboard/bioskop/create')}}" class="btn btn-success">Tambah Bioskop</a>
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
                                <i class="ti-money"></i>
                            </div>
                        </div>
                        <div class="col-xs-7">
                            <div class="numbers">
                                <p>Tambah Studio</p>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <hr />
                        <div class="stats">
                           <a href="{{URL('admin/dashboard/studio/index')}}" class="btn btn-success">Tambah Studio</a>
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
			<div class="table-responsive m-t-40">
            <table id="myTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id Bioskop</th>
                        <th scope="col">Nama Bioskop</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Create At</th>
                        <th scope="col">Update At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bioskops as $bioskops)
                    <tr>
                        <td>{{$bioskops->id_bioskop}}</td>
                        <td>{{$bioskops->nama_bioskop}}</td>
                        <td>{{$bioskops->alamat}}</td>
                        <td>{{$bioskops->harga}}</td>
                        <td>{{$bioskops->created_at}}</td>
                        <td>{{$bioskops->updated_at}}</td>
                        <td>
                             <a href="{{URL('admin/dashboard/bioskop/'.$bioskops->id_bioskop.'/edit')}}" class="btn btn-primary">
								<i class="fa fa-pencil"></i>
							</a>
							<form action="{{URL('admin/dashboard/bioskop/'.$bioskops->id_bioskop)}}" method="POST" >
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
@endsection
