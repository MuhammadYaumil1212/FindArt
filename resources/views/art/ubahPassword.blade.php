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
            <form action="post" id="form-change-password">
				<div class="form-group">
					<label for="new_password">Password baru</label>
					<input type="password" name="new_password" class="form-control" id="new_password" placeholder="Masukan password baru" required>
				</div>

				<div class="form-group mt-2">
					<label for="confirm_password">Konfirmasi password</label>
					<input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Masukan konfirmasi password" required>
				</div>

				
					<button type="submit" class="btn btn-primary mt-2">Simpan</button>
				
			</form>
        </div>
    </div>
@endsection