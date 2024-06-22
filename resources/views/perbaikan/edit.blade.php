@extends('layout.main')

@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-0 text-gray-800">Formulir edit perbaikan</h1>

        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-6 mt-3">
                <div class="card">
                    <div class="card-body">
                        <form action="/pengajuan/{{ $riwayat->id }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="damage">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="pending">Pending</option>
                                    <option value="selesai">Selesai</option>
                                </select>
                            </div>
                            
                            <button class="btn btn-md btn-primary">Simpan</button>
                            <a href="/riwayat" class="btn btn-md btn-danger">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection