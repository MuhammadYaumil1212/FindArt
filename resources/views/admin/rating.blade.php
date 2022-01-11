@extends('layouts.app')
@section('content')
{{-- 
    0 = pending
    1 = ditolak
    2 = diterima
    3 = sudah berhenti
    --}}
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Rating</h1>
        <a href="{{route('admin.addRating')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="far fa-star"></i> Berikan Rating </a>
    </div>
    @include('components.alert')
  <!-- ART yang sedang bekerja -->
        <div class="col">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Rating</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama ART</th>
                                <th>Nama Finder</th>
                                <th>Rating</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($rating as $rate)
                          @if ($rate->rating == 0)
                            <tr>
                                <td>{{$rate->art_full_name}}</td>
                                <td>{{$rate->full_name}}</td>
                                <td>Rating masih kosong</td>
                            </tr>  
                            @else
                            <tr>
                                <td>{{$rate->art_full_name}}</td>
                                <td>{{$rate->full_name}}</td>
                                <td>{{$rate->rating}}</td>
                            </tr>  
                            @endif
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- End art yang sedang bekerja --}}
@endsection