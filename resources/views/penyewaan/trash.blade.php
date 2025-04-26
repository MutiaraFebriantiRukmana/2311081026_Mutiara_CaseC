@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Daftar Sampah</h4>
                    </div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Penyewa</th>
                                        <th>Nama Alat</th>
                                        <th>Tanggal Sewa</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Jumlah Unit</th>
                                        <th>Harga Per Hari</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($campings as $index => $camping)
                                        <tr>
                                            <td>{{ $campings->firstItem() + $index }}</td>
                                            <td>{{ $camping->nama_penyewa }}</td>
                                            <td>{{ $camping->nama_alat }}</td>
                                            <td>{{ $camping->tanggal_sewa }}</td>
                                            <td>{{ $camping->tanggal_kembali }}</td>
                                            <td>{{ $camping->jumlah_unit }}</td>
                                            <td>{{ $camping->harga_per_hari }}</td>
                                            <td>{{ $camping->status }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <form action="{{ route('penyewaan.restore', $camping->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success btn-sm">Pulihkan</button>
                                                    </form>
                                                    <form action="{{ route('penyewaan.forceDelete', $camping->id) }}" method="POST"
                                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Hapus Permanent</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9" class="text-center">Tidak ada data sampah</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <a href="{{ route('penyewaan.index') }}" class="btn btn-dark">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pagination-container d-flex justify-content-center mt-4">
        {{ $campings->links('pagination::bootstrap-5') }}
</div>
@endsection
