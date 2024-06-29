@extends('layout.main')

@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-0 text-gray-800">Riwayat</h1>

        <!-- Content Row -->
        <div class="row mt-3">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Nama Karyawan</th>
                                        <th>Bagian</th>
                                        <th>Kerusakan</th>
                                        <th>Detail</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($riwayat as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->employee->nama_karyawan }}</td>
                                            <td>{{ $item->employee->departement }}</td>
                                            <td>{{ $item->details }}</td>
                                            <td>{{ $item->damage }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>
                                                @can('admin')
                                                    <a href="{{ url('/edit') }}/{{ $item->id }}" class="btn btn-warning">Edit status</a>
                                                @endcan
                                                <a href="/cetak/{{ $item->id }}" class="btn btn-success">Cetak</a>
                                                <!-- Form Hapus -->
                                                <form action="{{ route('riwayat.destroy', $item->id) }}" method="POST" style="display:inline;">
                                                 @csrf
                                                  @method('DELETE')
                                                 <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus permintaan ini?')">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center"><strong>Tidak ada request perbaikan</strong></td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection