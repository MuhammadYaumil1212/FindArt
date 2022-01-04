@extends('layouts.app')
@section('content')
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
      <a href="{{route('admin.tambahLowongan')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus"></i> Tambah Lowongan </a>
  </div>
  <div class="col-md-12">
    @include('components.alert')
  </div>
    <!-- Cards data -->
    @if (!empty($paginationJob))
    @foreach ($paginationJob as $job)
    <div class="col-md-12">
        <div class="card mb-3" style="max-width: 920px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="/uploads/job/{{$job->photo_url}}" class="img-fluid rounded-start" style="height: 300px;" alt="{{$job->photo_url}}">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Rp{{$job->job_payment}}</h5>
                        <p class="card-text">{{Str::limit($job->job_description,200)}}</p>
                        <p class="card-text text-small">Due Date : {{$job->job_due_date}}</p>
                        <p class="card-text"><small class="text-muted">{{\Carbon\Carbon::parse($job->created_at)->diffForHumans()}}</small></p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    {!! $paginationJob->links() !!}
    @else
        <p>There is no record</p>
    @endif
  <!-- End Cards -->
@endsection