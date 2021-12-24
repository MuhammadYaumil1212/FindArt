@extends('layouts.app')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">ART Ku</h1>
    </div>
        <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar ART yang Sedang Bekerja</h6>
        </div>
        <div class="card-body">
            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4 mt-3" id="art-container">

                <div class="col">
                    <div class="card h-100">
                        <a href="#">
                            <img src="{{asset('img/undraw_profile.svg')}}" class="img-fluid d-block mx-auto" alt="Avatar" width="50%">
                        </a>
                        <div class="card-body">
                            <h4 class="text-center card-title">Contoh Nama</h4>
                            <h5 class="text-center">Kontak: 08181834</h5>
                            <button data-art-id='${art.art_id}' class="btn btn-primary d-block mx-auto">Chat</button>
                            <button data-art-id='${art.art_id}' class="btn btn-danger d-block mx-auto mt-2">Berhentikan</button>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card h-100">
                        <a href="#">
                            <img src="{{asset('img/undraw_profile.svg')}}" class="img-fluid d-block mx-auto" alt="Avatar" width="50%">
                        </a>
                        <div class="card-body">
                            <h4 class="text-center card-title">Contoh Nama</h4>
                            <h5 class="text-center">Kontak: 08197625</h5>
                            <button data-art-id='${art.art_id}' class="btn btn-primary d-block mx-auto">Chat</button>
                            <button data-art-id='${art.art_id}' class="btn btn-danger d-block mx-auto mt-2">Berhentikan</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection