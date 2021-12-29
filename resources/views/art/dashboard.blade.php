@extends('layouts.app')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard ART</h1>
    </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Lowongan</h6>
        </div>
        <div class="card-body">
            <form id="form-cari">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-5 col-lg-5 mt-3 mb-2">
                        <div class="form-group">
                            <select class="form-control" name="provinsi" id="provinsi" placeholder="Provinsi">
                                <option value="" disabled selected hidden>Provinsi</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-5 col-lg-5 mt-3">
                        <div class="form-group">
                            <select class="form-control" name="kota" id="kota">
                                <option value="" disabled selected hidden>Kota</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-2 col-lg-2 mt-3">
                        <button type="submit" id="cari" class="btn btn-primary mt">Cari</button>
                        <button type="button" id="reset-search" class="btn btn-primary mt">Reset</button>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="..." class="card-img-top" alt="thumbnail.jpg">
                        <div class="card-body">
                            <h3 class="card-title mb-3">Rp. 1000000 /bulan</h3>
                            <h5 class="card-text text-primary mb-3">Rias Gremory</h5>
                            <h5 class="card-text mb-3">KAPUBATEN NGANJUK, JAWA TIMUR</h5>
                            <a href="{{route('art.detailLowongan')}}" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="..." class="card-img-top" alt="thumbnail.jpg">
                        <div class="card-body">
                            <h3 class="card-title mb-3">Rp. 1000000 /bulan</h3>
                            <h5 class="card-text text-primary mb-3">Paul Greyrat</h5>
                            <h5 class="card-text mb-3">WINTERFELL, NORTH WESTEROS</h5>
                            <a href="{{route('art.detailLowongan')}}" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="..." class="card-img-top" alt="thumbnail.jpg">
                        <div class="card-body">
                            <h3 class="card-title mb-3">Rp. 1000000 /bulan</h3>
                            <h5 class="card-text text-primary mb-3">Ying Zheng</h5>
                            <h5 class="card-text mb-3">KOTA XIANYANG, QIN BAGIAN BARAT</h5>
                            <a href="{{route('art.detailLowongan')}}" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection