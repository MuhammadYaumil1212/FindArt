@extends('layouts.login')
@section('content')
<div class="card o-hidden border-0 shadow-lg my-5">
  <div class="card-body">
      <!-- Nested Row within Card Body -->
      <div class="row">
          <img src="{{asset('img/maid2.jpg')}}" class="col-lg-5 d-none d-lg-block">
          <div class="col-lg-7">
              <div class="p-5">
                  <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-4">Buat Akun</h1>
                  </div>
                  <form class="user" method="post" action="{{ route('user.registrasi') }}">
                    @csrf
                      <div class="form-group row">
                          <div class="col-sm-6 mb-3 mb-sm-0">
                              <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}} " name="name" id="exampleFirstName" value="{{old('name')?:''}}" placeholder="Name">
                                  @if ($errors->has('name'))
                                      <p class="text-danger">{{$errors->first('name')}}</p>
                                  @endif
                          </div>
                       
                          <div class="col-sm-6">
                              <input type="text" class="form-control {{$errors->has('contact_number') ? 'is-invalid' : ''}}" name="contact_number" value="{{old('contact_number')?:''}}"  id="contact_number"
                                  placeholder="No Telepon">
                              @if ($errors->has('contact_number'))
                                  <p class="text-danger">{{$errors->first('contact_number')}}</p>
                              @endif
                          </div>
                          <div class="col-sm-12 mt-2">
                                <textarea class="form-control {{$errors->has('address') ? 'is-invalid' : ''}}" name="address" id="exampleFormControlTextarea1" rows="3" value="{{old('address')?:''}}"  placeholder="Alamat"></textarea>
                                @if ($errors->has('address'))
                                  <p class="text-danger">{{$errors->first('address')}}</p>
                              @endif
                          </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0 mt-2">
                            <select class="form-control {{$errors->has('province_id') ? 'is-invalid' : ''}}" name="province_id" aria-label="Default select example" required>
                                <option selected>Provinsi</option>
                                @foreach ($provinces as $province)
                                    <option value="{{$province->id}}">{{$province->name}}</option>
                                @endforeach
                              </select>
                              @if ($errors->has('province_id'))
                                  <p class="text-danger">{{$errors->first('province_id')}}</p>
                              @endif
                        </div>
                        
                          <div class="col-sm-6 mb-3 mb-sm-0 mt-2">
                            <select class="form-control {{$errors->has('city_id') ? 'is-invalid' : ''}}" name="city_id" aria-label="Default select example" required>
                                <option selected>Kota</option>
                                @foreach ($cities as $city)
                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                @endforeach
                              </select>
                              @if ($errors->has('city_id'))
                                  <p class="text-danger">{{$errors->first('city_id')}}</p>
                              @endif
                          </div>

                          <div class="col-sm-6 mt-3">
                            <select class="form-control {{$errors->has('district_id') ? 'is-invalid' : ''}}" name="district_id" aria-label="Default select example">
                                <option selected>Kecamatan</option>
                                @foreach ($districts as $district)
                                    <option value="{{$district->id}}">{{$district->name}}</option>  
                                @endforeach
                              </select>
                              @if ($errors->has('district_id'))
                                  <p class="text-danger">{{$errors->first('district_id')}}</p>
                              @endif
                          </div>

                          <div class="col-sm-6 mt-3">
                            <select class="form-control {{$errors->has('sub_district_id') ? 'is-invalid' : ''}}" name="sub_district_id" aria-label="Default select example">
                                <option selected>Kelurahan</option>
                                @foreach ($sub_districts as $sub)
                                    <option value="{{$sub->id}}">{{$sub->name}}</option>
                                @endforeach
                              </select>
                              @if ($errors->has('sub_district_id'))
                                  <p class="text-danger">{{$errors->first('sub_district_id')}}</p>
                              @endif
                          </div>
                          <div class="col-sm-12 mt-3">
                            <input type="text" class="form-control {{$errors->has('username') ? 'is-invalid' : ''}}" name="username" id="exampleFirstusername"
                                placeholder="username">
                                @if ($errors->has('username'))
                                  <p class="text-danger">{{$errors->first('username')}}</p>
                              @endif
                          </div>
                          <div class="col-sm-12 mt-3 ">
                            <select class="form-control {{$errors->has('role') ? 'is-invalid' : ''}}" name="role" >
                                <option selected>Mendaftar Sebagai</option>
                                <option value="0">ART</option>
                                <option value="1">Pencari ART</option>
                              </select>
                              @if ($errors->has('role'))
                                  <p class="text-danger">{{$errors->first('role')}}</p>
                              @endif
                          </div>
                          <div class="col-sm-6 mt-3">
                              <input type="password" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}"
                                  id="exampleRepeatPassword" name="password" value="{{old('password')?:''}}"  placeholder="password">
                                  @if ($errors->has('password'))
                                  <p class="text-danger">{{$errors->first('password')}}</p>
                              @endif
                          </div>

                          <div class="col-sm-6 mt-3">
                              <input type="password" class="form-control {{$errors->has('password_confirmation') ? 'is-invalid' : ''}}"
                                  id="exampleRepeatPassword" value="{{old('password_confirmation')?:''}}"  name="password_confirmation" placeholder="Ulangi password">
                                  @if ($errors->has('password_confirmation'))
                                  <p class="text-danger">{{$errors->first('password_confirmation')}}</p>
                              @endif
                          </div>
                      </div>
                      <button type="submit" class="btn btn-primary btn-user btn-block">
                          Daftar
                      </button>
                  </form>
                  <hr>
                  <div class="text-center">
                      <a class="small" href="{{route('user.login')}}">Already have an account? Login!</a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection