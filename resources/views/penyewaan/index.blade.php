@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Daftar Penyewa</h4>
                        <a href="{{ route('penyewaan.create') }}" class="btn btn-primary">Tambah Penyewa</a>
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
                                                    <a href="{{ route('penyewaan.edit', $camping->id) }}"
                                                        class="btn btn-sm btn-warning me-2">Edit</a>
                                                    <form action="{{ route('penyewaan.destroy', $camping->id) }}" method="POST"
                                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">Tidak ada data penyewa</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>  
                    <a href="{{ route('penyewaan.trash') }}" class="btn btn-secondary">Sampah</a>
                </div>
            </div>
        </div>
    </div>

    <div class="pagination-container d-flex justify-content-center mt-4">
        {{ $campings->links('pagination::bootstrap-5') }}
</div>
@endsection
