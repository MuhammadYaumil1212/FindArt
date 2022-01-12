@extends('layouts.app')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Selamat Datang , {{Auth::User()->username}}</h1>
    </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Lowongan</h6>
        </div>
        <div class="card-body">
            <form action="{{route('art.dashboard')}}">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-5 col-lg-5 mt-3 mb-2">
                        <div class="form-group">
                            <input type="text" class="form-control" name="search" placeholder="Cari" value="{{request('search')}}">
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-2 col-lg-2 mt-3">
                        <button type="submit" id="cari" class="btn btn-sm btn-primary">Cari</button>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Finder</th>
                                <th>Gaji</th>
                                <th>Deskripsi Kerja</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jobs as $job)
                            <tr>
                                <td>{{$job->full_name}}</td>
                                <td>{{$job->job_payment}}</td>
                                <td>{{Str::limit($job->job_description)}}</td>
                                <td>
                                    <a href="{{route('art.lamar',$job->id_job)}}" class="btn btn-sm btn-info">Lamar</a>
                                </td>
                            </tr>  
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection