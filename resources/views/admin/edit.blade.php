@extends('layouts.app')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Edit Lowongan</h1>
  </div>
    <!-- Add Job Vacancy Form -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Lowongan</h6>
      </div>
      
      <div class="card-body">
      <form method="post" action="{{route('admin.update',$jobVacancy->id_job)}}" id="form-job">
          @method('put')
          @csrf
      <div class="form-group mt-2">
        <label for="job-payment">Gaji</label>
        <input type="number" name="job_payment" class="form-control {{$errors->has('job_payment') ? 'is-invalid' : ''}}" id="job_payment" placeholder="Masukan gaji" value="{{$jobVacancy->job_payment}}">
        @if ($errors->has('job_payment'))
        <div class="invalid-feedback">
          {{$errors->first('job_payment')}}
        </div>
      @endif
      </div>
      
      <div class="form-group mt-2 mb-3">
        <label for="job-duedate">Tanggal berakhir lowongan</label>
        <input type="date" name="job_due_date" class="form-control {{$errors->has('job_due_date') ? 'is-invalid' : ''}}" id="job_due_date" value="{{$jobVacancy->job_due_date}}">
        @if ($errors->has('job_due_date'))
        <div class="invalid-feedback">
          {{$errors->first('job_due_date')}}
        </div>
      @endif
      </div>
      
      <div class="form-group mt-2 mb-3">
        <label for="job-duedate">Deskripsi Pekerjaan</label>
        <textarea class="form-control {{$errors->has('job_due_date') ? 'is-invalid' : ''}}" name="job_description" id="job_description" placeholder = 'co:/ pekerjaan ini dikhususkan untuk ahli anak' style="height: 300px;">{!!$jobVacancy->job_description!!}</textarea>
        @if ($errors->has('job_description'))
        <div class="invalid-feedback">
          {{$errors->first('job_description')}}
        </div>
        @endif
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect1">Set Visible</label>
        <select class="form-control" name="is_visible" id="exampleFormControlSelect1">
            <option value="0">Un Visible</option>
            <option value="1">Visible</option>
        </select>
      </div>
      <div class="d-grid gap-2 d-md-block">
      <button type="submit" class="btn btn-primary btn-lg mt-2 mb-5">Simpan</button>
      </div>
    </form>
  </div>
</div>
@endsection