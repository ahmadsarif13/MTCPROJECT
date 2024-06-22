@extends('layout.main')

@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-0 text-gray-800">Formulir permintaan perbaikan</h1>

        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <form action="/pengajuan" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="damage">Kerusakan</label>
                                <input type="text" class="form-control form-control-solid" id="damage" name="damage" placeholder="Masukan kerusakan">
                            </div>
                            
                            <div class="mb-3">
                                <label for="details">Detail kerusakan</label>
                                <textarea class="form-control form-control-solid" name="details" id="details" rows="3"></textarea>
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