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
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>Nama Finder</th>
                                <th>Gaji</th>
                                <th>Deskripsi Kerja</th>
                                <th width="100px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($jobs as $job)
                            <tr>
                                <td>{{$job->full_name}}</td>
                                <td>{{$job->job_payment}}</td>
                                <td>{{Str::limit($job->job_description)}}</td>
                                <td>
                                    <a href="{{route('art.lamar',$job->id_job)}}" class="btn btn-sm btn-info">Lamar</a>
                                </td>
                            </tr>  
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function () {
          var table = $('.data-table').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('art.dashboard') }}",
              columns: [
                  {data: 'full_name', name: 'full_name'},
                  {data: 'job_payment', name: 'job_payment'},
                  {data: 'job_description', name: 'job_description'},
                  {data: 'action', name: 'action', orderable: false, searchable: false},
              ]
          });
          
        });
      </script>
@endsection