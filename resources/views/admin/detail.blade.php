@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-md-12 mb-4">
    <div class="d-grid gap-2 d-md-block">
    <a href="{{route('admin.dashboard')}}" class="btn btn-sm btn-outline-primary">Kembali</a>
    <a href="{{route('admin.edit',$jobVacancy->id_job)}}" class="btn btn-sm btn-outline-warning">Edit</a>
  </div>
  </div>
  <div class="col-md-4">
    <div class="card" style="width: 18rem;">
      <img src="{{asset('/uploads/job')}}/{{$jobVacancy->photo_url}}" alt="{{$jobVacancy->photo_url}}" class="card-img-top">
    </div>
  </div>
  <div class="col-md-6 mb-4">
    <div class="card" style="width: 18rem; padding:4px;">
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Nama : {{$jobVacancy->full_name}}</li>
        <li class="list-group-item">Rp{{$jobVacancy->job_payment}}</li>
        <li class="list-group-item">{{$jobVacancy->job_due_date}}</li>
        <li class="list-group-item">
          @if ($jobVacancy->is_visible == 1)
            <span class="badge badge-success">Visible</span>
            @else
            <span class="badge badge-danger">Disabled</span>
          @endif
        </li>
      </ul>
    </div>
  </div>
  <div class="col-md-12">
    <div class="card">
      <div class="card-header text-small text-primary">Job Description</div>
      <div class="card-body">
        <p class="card-text">{!!$jobVacancy->job_description!!}</p>
      </div>
    </div>
  </div>
</div>
@endsection