@extends('dashboard.template')

@section('content')
<link href=" {{ asset('ela/css/lib/sweetalert/sweetalert.css') }}" rel="stylesheet">
<div class="container-fluid">
	<a href="{{URL('admin/dashboard/studio/create')}}" class="btn btn-success">Tambah Bioskop</a>
    <div class="card">
    <div class="card-body">
        <div class="table-responsive m-t-40">
            <table id="myTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Id Bioskop</th>
                        <th scope="col">Kode Studio</th>
                        <th scope="col">Kapasitas</th>
                        <th scope="col">Jumlah Baris</th>
                        <th scope="col">Jumlah Kolom</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($studios as $studios)
                    <tr>
                        <td>{{$studios->id_studio}}</td>
                        <td>{{$studios->id_bioskop}}</td>
                        <td>{{$studios->kode_studio}}</td>
                        <td>{{$studios->kapasitas}}</td>
                        <td>{{$studios->jumlah_baris}}</td>
                        <td>{{$studios->jumlah_kolom}}</td>
                        <td>
                            <a href="{{URL('admin/dashboard/studio/'.$studios->id_studio.'/edit')}}" class="btn btn-primary">
                                <i class="fa fa-pencil"></i>
                            </a>
							<form action="{{URL('admin/dashboard/studio/'.$studios->id_studio)}}" method="POST" >
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
<script src="{{ asset('ela/js/lib/sweetalert/sweetalert.min.js') }}"></script>
<!-- scripit init-->
<script type="text/javascript">
            $('form').submit(function(e){
                var form = this;
                e.preventDefault();
                swal({
                        title: "Yakin Ingin Menghapus ?",
                        text: "Data pegawai yang dihapus tidak bisa dikembalikan",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Ya, hapus",
                        closeOnConfirm: false
                    },
                    function(){
                        form.submit();
                    }
                );
            });

        </script>
@endsection


