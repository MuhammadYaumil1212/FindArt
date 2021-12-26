@extends('layouts.app')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Lowongan</h1>
    </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Lowongan</h6>
        </div>
        <div class="card-body">
            <form method="post" id="form-job">
				<div class="form-group">
					<label for="job-thumbnail">Thumbnail</label>
					<input type="file" name="job_thumbnail" class="form-control" id="job_thumbnail" required>
				</div>

				<div class="form-group mt-2">
					<label for="job-payment">Gaji</label>
					<input type="number" name="job_payment" class="form-control" id="job_payment" placeholder="Masukan gaji" min="500000" required>
				</div>

				<div class="form-group mt-2 mb-3">
					<label for="job-duedate">Tanggal berakhir lowongan</label>
					<input type="date" name="job_duedate" class="form-control" id="job_duedate" pattern="\d{4}-\d{2}-\d{2}" required>
				</div>

                <div class="form-group mt-2 mb-3">
					<label for="job-duedate">Tanggal berakhir lowongan</label>
					<textarea class="form-control" name="description" id="description" placeholder="Deskripsi pekerjaan" style="height: 300px;"></textarea>
				</div>

				<button type="submit" class="btn btn-primary btn-lg mt-2 mb-5">Simpan</button>
			</form>
        </div>
    </div>
@endsection