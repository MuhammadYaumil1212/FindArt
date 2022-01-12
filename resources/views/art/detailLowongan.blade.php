@extends('layouts.app')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Lowongan</h1>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="col-8 mx-auto">
                <div class="card mt-4">
                        <div class="col-md-12">
                            <img src="{{asset('/img/thumbnail.jpg')}}" class="img-fluid" alt="">
                            <p style="font-weight: bold; font-size: 20px;" class="mt-2">GAJI: Rp{{$apply->job_payment}} </p>
                            <h5>Tuan Rumah : {{$apply->full_name}}</h3>
                            <div>
                                <p style="font-weight: 500; font-size: 17px; margin-bottom: 1em">Provinsi: {{ Auth::user()->Province->name}}
                                </p>
                            </div>
                            <div>
                                <p style="font-weight: 500; font-size: 17px; margin-bottom: 1em">Kota: {{Auth::user()->City->name}} </p>
                            </div>
                            <div>
                                <p style="font-weight: 500; font-size: 17px; margin-bottom: 1em">Kecamatan: {{Auth::user()->District->name}}</p>
                            </div>
                            <div>
                                <p style="font-weight: 500; font-size: 17px; margin-bottom: 1em">Kelurahan: {{Auth::user()->SubDistrict->name}}</p>
                            </div>
                            <p style="font-weight: 500; font-size: 17px; margin-bottom: 1em">
                                Alamat lengkap: {{Auth::user()->address}}
                            </p>
                            <p class="text-primary" style="font-weight: 200;"><b>DESKRIPSI</b></p>
                                <div>
                                    {!!$apply->job_description!!}
                                </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12">
                            <form action="{{route('art.apply',$apply->id_job)}}" method="post">
                                @csrf
                                <input type="hidden" name="art_id" value="{{$userId->id}}">
                                <button type="submit" class="btn btn-primary btn-lg mb-5 d-block mx-auto">Apply</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection