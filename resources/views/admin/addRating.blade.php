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
        <h1 class="h3 mb-0 text-gray-800">Tambahkan Rating</h1>
    </div>
    @include('components.alert')
        <!-- ART yang sedang bekerja -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar ART yang Melamar</h6>
        </div>
        <div class="card-body">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>Nama ART</th>
                          <th>Nama Finder</th>
                          <th>Rating</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($addRating as $rate)
                    @if ($rate->interested_job_status == 0 && $rate->rating == 0)
                      <tr>
                          <td>{{$rate->art_full_name}}</td>
                          <td>{{$rate->full_name}}</td>
                          <form action="{{route('admin.storeRating',$rate->id_rating)}}" method="post">
                            @method('put')
                            @csrf
                            <td>
                              <input type="hidden" name="art_id" value="{{$rate->art_id}}">
                              <input type="hidden" name="art_finder_id" value="{{$rate->art_finder_id}}">
                              <input type="text" class="form-control {{$errors->has('rating') ? 'is-invalid' : ''}}" id="rating" name="rating" value="{{old('rating')}}" placeholder="Masukkan Rating">
                              @if ($errors->has('rating'))
                              <div class="invalid-feedback">
                                {{$errors->first('rating')}}
                              </div>
                            @endif
                            </td>
                            <td>
                              <button type="submit"class="btn btn-sm btn-primary">Tambah</button>
                            </td>
                          </form>
                      </tr>  
                      @else
                      <tr>
                          <td>{{$rate->art_full_name}}</td>
                          <td>{{$rate->full_name}}</td>
                          <td>{{$rate->rating}}</td>
                          <td>
                            <i>Rating sudah terisi</i>
                          </td>
                      </tr>  
                      @endif
                    @endforeach
                  </tbody>
                </table> 
        </div>
    </div>
    {{-- End art yang sedang bekerja --}}
@endsection