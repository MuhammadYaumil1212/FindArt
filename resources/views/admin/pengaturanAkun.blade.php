@extends('layouts.app')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pengaturan Akun</h1>
    </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
        <div class="card-body">
            <img src="{{asset('img/undraw_profile.svg')}}" class="img-fluid d-block mx-auto" alt="Avatar" width="10%">
            <form method="post" id="form-setting">
				<div class="form-group mt-2">
					<label for="profile_photo">Foto profile</label>
					<input type="file" name="profile_photo" class="form-control" id="profile_photo">
				</div>

				<div class="form-group mt-2">
					<label for="contact">No telpon</label>
					<input type="text" name="contact"  class="form-control" id="contact" placeholder="Isi no telpon anda" value=""> 
				</div>

				<div class="form-group mt-2">
					<label for="provinsi">Provinsi</label>
					<select type="text" name="provinsi" class="form-select" id="provinsi" required>
                        <option value="1">Contoh</option>
                        <option value="2">Contoh</option>
                        <option value="3">Contoh</option>
                    </select>
				</div>

				<div class="form-group mt-2">
					<label for="kota">Kota</label>
					<select type="text" name="kota" class="form-select" id="kota" required>
                        <option value="1">Contoh</option>
                        <option value="2">Contoh</option>
                        <option value="3">Contoh</option>
                    </select>
				</div>

				<div class="form-group mt-2">
					<label for="kecamatan">Kecamatan</label>
					<select type="text" name="kecamatan" class="form-select" id="kecamatan" required>
                        <option value="1">Contoh</option>
                        <option value="2">Contoh</option>
                        <option value="3">Contoh</option>
                    </select>
				</div>

				<div class="form-group mt-2">
					<label for="kelurahan">Kelurahan</label>
					<select type="text" name="kelurahan" class="form-select" id="kelurahan" required>
                        <option value="1">Contoh</option>
                        <option value="2">Contoh</option>
                        <option value="3">Contoh</option>
                    </select>
				</div>

				<div class="form-group mt-2">
					<label for="address">Alamat</label>
					<textarea name="address" class="form-control" id="address" cols="100" rows="10" placeholder="Isi alamat lengkap anda" required></textarea>
				</div>

				<button type="submit" class="btn btn-primary mt-3 mb-5">Simpan</button>
				<a href="{{route('admin.ubahPassword')}}" class="btn btn-warning mt-3 mb-5">Ubah Password</a>
			</form>
        </div>
    </div>
@endsection