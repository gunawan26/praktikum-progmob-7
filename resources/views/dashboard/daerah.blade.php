@extends('dashboard.template')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 col-md-5">
            <div class="card card-user">
                <div class="image">
                    <img src="assets/img/background.jpg" alt="..." />
                </div>
                <div class="content">
                    <div class="author">
                        <img class="avatar border-white" src="assets/img/faces/face-2.jpg" alt="..." />
                        <h4 class="title">Chet Faker<br />
                            <a href="#"><small>@chetfaker</small></a>
                        </h4>
                    </div>
                    <p class="description text-center">
                        "I like the way you work it <br>
                        No diggity <br>
                        I wanna bag it up"
                    </p>
                </div>
                <hr>
                <div class="text-center">
                    <div class="row">
                        <div class="col-md-3 col-md-offset-1">
                            <h5>12<br /><small>Files</small></h5>
                        </div>
                        <div class="col-md-4">
                            <h5>2GB<br /><small>Used</small></h5>
                        </div>
                        <div class="col-md-3">
                            <h5>24,6$<br /><small>Spent</small></h5>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-8 col-md-7">
            <div class="card">
                <div class="header">
                    <h4 class="title">Tambah Provinsi</h4>
                </div>
                <div class="content">
                    <form action="">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Nama Provinsi</label>
                                    <input type="text" class="form-control border-input"  placeholder="Bali"
                                        value="">
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-info btn-fill btn-wd">Tambah Provinsi</button>
                    </form>


                    <div class="clearfix"></div>

                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-7">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Tambah Kabupaten</h4>
                    </div>
                    <div class="content">
                        <form action="">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Nama Provinsi</label>
                                        <input type="text" class="form-control border-input"  placeholder="Bali"
                                            value="">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Nama Kabupaten/Kota</label>
                                            <input type="text" class="form-control border-input"  placeholder="Denpasar"
                                                value="">
                                        </div>
                                    </div>

                            </div>
                            <button type="submit" class="btn btn-info btn-fill btn-wd">Tambah Kabupaten</button>
                        </form>


                        <div class="clearfix"></div>

                    </div>
                </div>
            </div>


    </div>
</div>
@endsection
