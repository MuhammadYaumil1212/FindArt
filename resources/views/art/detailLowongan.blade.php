@extends('layouts.app')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Lowongan</h1>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="col-8 mx-auto">
                <div class="card mt-4">
                        <div class="col-md-12">
                            <img src="${data.thumbnail}" class="img-fluid" alt="gambar.png">
                            <p style="font-weight: bold; font-size: 20px;">GAJI: Rp. </p>
                            <h3>Rumah Hantu</h3>
                            <div>
                                <p style="font-weight: 500; font-size: 17px; margin-bottom: 1em">Provinsi: </p>
                            </div>
                            <div>
                                <p style="font-weight: 500; font-size: 17px; margin-bottom: 1em">Kota: </p>
                            </div>
                            <div>
                                <p style="font-weight: 500; font-size: 17px; margin-bottom: 1em">Kecamatan: </p>
                            </div>
                            <div>
                                <p style="font-weight: 500; font-size: 17px; margin-bottom: 1em">Kelurahan: </p>
                            </div>
                            <p style="font-weight: 500; font-size: 17px; margin-bottom: 1em">
                                Alamat lengkap: 
                            </p>
                            <h5 class="text-primary" style="font-weight: 600;">DESKRIPSI</h5>
                                <div>
                                    coba
                                </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12">
                            <a class="btn btn-primary btn-lg mb-5 d-block mx-auto">Apply</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection