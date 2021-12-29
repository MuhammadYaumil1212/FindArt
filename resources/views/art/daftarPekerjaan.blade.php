@extends('layouts.app')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Pekerjaan Anda</h1>
    </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
        <div class="card-body">
            <div class="form-group mt-2">
                <label for="job-status">Status pekerjaan</label>
                <select name="job-status" id="job-status" class="form-control" onchange="getMyJob()">
                    <option value="4" selected>Semua</option>
                    <option value="0">Pending</option>
                    <option value="1">Ditolak</option>
                    <option value="2">Diterima</option>
                    <option value="3">Sudah berhenti</option>
                </select>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
							<th>Pencari ART</th>
							<th>Gaji</th>
							<th>Tgl berakhir lowongan</th>
							<th>Tgl perubahan</th>
							<th>Status pekerjaan</th>
							<th>Aksi</th>
						</tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>2011/04/25</td>
                            <td>Diterima</td>
                            <td>
                                <a href="#" class="btn btn-link">Chat</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>2011/07/25</td>
                            <td>Diterima</td>
                            <td>
                                <a href="#" class="btn btn-link">Chat</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection