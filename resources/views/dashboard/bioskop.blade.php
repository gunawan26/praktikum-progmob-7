@extends('dashboard.template')

@section('content')
<div class="container-fluid">
	<a href="{{route("admin.dashboard.bioskop.createbioskop")}}" class="btn btn-success">Tambah Bioskop</a>
    <div class="card">
    <div class="card-body">
        <div class="table-responsive m-t-40">
            <table id="myTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
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
                        <td>{{$bioskops->id_bioskops}}</td>
                        <td>{{$bioskops->nama_bioskop}}</td>
                        <td>{{$bioskops->alamat}}</td>
                        <td>{{$bioskops->harga}}</td>
                        <td>{{$bioskops->created_at}}</td>
                        <td>{{$bioskops->updated_at}}</td>
                        <td>
                            <a href="{{route("admin.dashboard.bioskop.editbioskop",$bioskops->id_bioskops)}}" class="btn btn-primary">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <form action="{{route("admin.dashboard.bioskop.destroybioskop",$bioskops->id_bioskops)}}" method="POST">
                                <button type="submit" class="btn btn-danger">
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
