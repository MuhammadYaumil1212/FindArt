@extends('layouts.app')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Lowongan</h1>
    </div>
			<!-- Add Job Vacancy Form -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Form Tambah Lowongan</h6>
        </div>
				
        <div class="card-body">
					<form method="post" action="{{route('admin.store')}}" id="form-job" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label for="job-thumbnail">Thumbnail</label>
					<input type="file" name="photo_url" class="form-control" id="job_thumbnail" required>
				</div>

				<div class="form-group mt-2">
					<label for="job-payment">Gaji</label>
					<input type="number" name="job_payment" class="form-control" id="job_payment" placeholder="Masukan gaji">
				</div>
				
				<div class="form-group mt-2 mb-3">
					<label for="job-duedate">Tanggal berakhir lowongan</label>
					<input type="date" name="job_due_date" class="form-control" id="job_due_date">
				</div>
				
				<div class="form-group mt-2 mb-3">
					<label for="job-duedate">Deskripsi Pekerjaan</label>
					<textarea class="form-control" name="job_description" id="job_description" placeholder = 'co:/ pekerjaan ini dikhususkan untuk ahli anak' style="height: 300px;"></textarea>
				</div>
				
				<button type="submit" class="btn btn-med btn-primary btn-lg mt-2 mb-5">Simpan</button>
			</form>
		</div>
	</div>
@endsection