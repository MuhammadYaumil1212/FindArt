@extends('layouts.login')
@section('content')
<div class="row justify-content-center">
  <div class="col-xl-6 col-lg-6 col-md-9">
      <div class="card mt-4">
        <div class="card-header text-primary text-small">
          Selamat Datang! {{Auth::user()->username}}
        </div>
            <div class="card-body p-12">
                <!-- Nested Row within Card Body -->
                <div class="row">
                  <div class="col-md-12 mt-2">
                    @include('components.alert')
                  </div>
                  <form action="{{route('user.storeRole')}}" method="POST">
                    @csrf
                    <div class="col-md-12 mt-4 pd-12">
                      <div class="container">

                        <select class="form-control {{$errors->has('role') ? 'is-invalid' : ''}}" name="role" aria-label="Default select example" required>
                          <option selected>Anda Masuk Sebagai ?</option>
                          <option value="1">Pencari ART</option>  
                          <option value="2">ART</option>  
                        </select>
                        @if ($errors->has('role'))
                        <p class="text-danger">{{$errors->first('role')}}</p>
                        @endif
                      </div>
                    </div>
                    <div class="col-md-12 mt-4 ">
                      <div class="container">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Selesai</button>
                      </div>
                    </div>
                  </form>
                </div>
            </div>
      </div>
  </div>
</>
@endsection