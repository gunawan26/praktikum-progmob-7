@extends('dashboard.template')

@section('content')
<div class="container-fluid">
	<a href="{{URL('admin/dashboard/kursilist/create') }}" class="btn btn-success">Tambah Kursi List</a>
	<a href="{{URL('admin/dashboard/kursi/create') }}" class="btn btn-success">Tambah Kursi</a>
    <div class="card">
    <div class="card-body">
        <div class="table-responsive m-t-40">
            <table id="myTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id Kursi list</th>
                        <th scope="col">Id Jadwal</th>
                        <th scope="col">Status Kursi</th>
                        <th scope="col">Id Kursi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kursi_lists as $kursi_lists)
                    <tr>
                        <td>{{$kursi_lists->id_kursi_list}}</td>
                        <td>{{$kursi_lists->id_jadwal}}</td>
                        <td>{{$kursi_lists->status_kursi}}</td>
                        <td>{{$kursi_lists->id_kursi}}</td>
                        <td>
                            <a href="{{URL('admin/dashboard/kursilist/'.$kursi_lists->id_kursi_list.'/edit')}}" class="btn btn-primary">
								<i class="fa fa-pencil"></i>
							</a>
							<form action="{{URL('admin/dashboard/kursilist/'.$kursi_lists->id_kursi_list)}}" method="POST" >
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
