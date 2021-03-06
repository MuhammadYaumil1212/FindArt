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
        <h1 class="h3 mb-0 text-gray-800">ART Ku</h1>
    </div>
    @include('components.alert')
        <!-- ART yang sedang bekerja -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar ART yang Sedang Bekerja</h6>
        </div>
        <div class="card-body">
            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4 mt-3" id="art-container">
                @foreach ($listSeeker as $list)
                @if ($list->accepted_job_status == 2)
                <div class="col">
                    <div class="card h-100">
                        <a href="#">
                            <img src="/uploads/job/{{$list->photo_url}}" class="img-fluid d-block mx-auto" alt="{{$list->photo_url}}" width="100%">
                        </a>
                        <div class="card-body">
                            <h5 class="text-center card-title">{{$list->art_full_name}}</h5>
                            <p class="text-center text-small">Kontak: {{$list->kontak}}</p>
                            <p class="text-center text-small">Kontrak Berakhir : {{\Carbon\Carbon::parse($list->job_due_date)->isoFormat('DD-MMMM-YYYY')}}</p>
                            @if($list->art_descriptiosn != "")
                            <p class="text-center text-small">Deskripsi : <br> {{$list->art_description}}</p>
                            @else
                            <p class="text-center text-small">Deskripsi : <br> No Description</p>
                            @endif
                            <form action="{{route('admin.updateJobStatus',$list->id_accepted)}}" method="post">
                                @method('put')
                                @csrf
                                <input type="hidden" name="art_id" value="{{$list->id}}">
                                <input type="hidden" name="art_finder_id" value="{{$list->art_finder_id}}">
                                <button  type="submit" name="accepted_job_status" value="3" class="btn btn-danger d-block mx-auto mt-2 ml-4">Berhentikan</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
    {{-- End art yang sedang bekerja --}}
@endsection