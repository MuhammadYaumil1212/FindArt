@extends('layouts.app')
@section('content')
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
      <a href="{{route('admin.tambahLowongan')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus"></i> Tambah Lowongan </a>
  </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Daftar Lowongan Anda</h6>
      </div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>Thumbnail</th>
                          <th>Gaji</th>
                          <th>Tanggal berakhir</th>
                          <th>Tanggal perubahan</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td>Tiger Nixon</td>
                          <td>System Architect</td>
                          <td>Edinburgh</td>
                          <td>2011/04/25</td>
                          <td>
                              <a href="{{route('admin.detailLowongan')}}" class="btn btn-sm btn-primary">Detail</a>
                              <a href="{{route('admin.updateLowongan')}}" class="btn btn-sm btn-warning">Edit</a>
                              <a href="http://" class="btn btn-sm btn-danger">Delete</a>
                          </td>
                      </tr>
                      <tr>
                          <td>Garrett Winters</td>
                          <td>Accountant</td>
                          <td>Tokyo</td>
                          <td>2011/07/25</td>
                          <td>
                            <a href="{{route('admin.detailLowongan')}}" class="btn btn-sm btn-primary">Detail</a>
                            <a href="{{route('admin.updateLowongan')}}" class="btn btn-sm btn-warning">Edit</a>
                            <a href="http://" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                      </tr>
                  </tbody>
              </table>
          </div>
      </div>
  </div>
  <!-- test commit -->
@endsection