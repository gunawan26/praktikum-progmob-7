@extends('dashboard.template')

@section('content')
<link href=" {{ asset('ela/css/lib/sweetalert/sweetalert.css') }}" rel="stylesheet">
<div class="container-fluid">
    <div class="card">
    <div class="card-body">
        <div class="table-responsive m-t-40">
            <table id="myTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id Transaksis</th>
                        <th scope="col">Tanggal Transaksi</th>
                        <th scope="col">Tanggal Batas Pembayaran</th>
                        <th scope="col">Status Pembayaran</th>
                        <th scope="col">Id User</th>
                        <th scope="col">Id Jadwal</th>
						<th scope="col">Bukti Pembayaran</th>
						<th scope="col">Id Jadwal</th>
						<th scope="col">Bukti Pembayaran</th>
						<th scope="col">Tanggal Pembayaran</th>
						<th scope="col">Created at</th>
						<th scope="col">Updated at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transaksis as $transaksis)
                    <tr>
                        <td>{{$transaksis->id_transaksis}}</td>
                        <td>{{$transaksis->tanggal_transaksi}}</td>
                        <td>{{$transaksis->tanggal_batas_pembayaran}}</td>
                        <td>{{$transaksis->status_pembayaran}}</td>
                        <td>{{$transaksis->id_user}}</td>
                        <td>{{$transaksis->id_jadwal}}</td>
						<td>{{$transaksis->bukti_pembayaran}}</td>
						<td>{{$transaksis->tanggal_pembayaran}}</td>
						<td>{{$transaksis->created_at}}</td>
						<td>{{$transaksis->updated_at}}</td>
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


