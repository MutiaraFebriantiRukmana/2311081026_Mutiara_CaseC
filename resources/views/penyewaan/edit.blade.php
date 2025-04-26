@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Edit Data Penyewaan</h4>
                        <a href="{{ route('penyewaan.store') }}" class="btn btn-secondary">Kembali</a>
                    </div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('penyewaan.update', $campings->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="nama_penyewa" class="form-label">Nama Penyewa<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nama_penyewa') is-invalid @enderror"
                                    id="nama_penyewa" name="nama_penyewa" value="{{ old('nama_penyewa', $campings->nama_penyewa) }}" required>
                                @error('nama_penyewa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nama_alat" class="form-label">nama_alat <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nama_alat') is-invalid @enderror" id="nama_alat"
                                    name="nama_alat" value="{{ old('nama_alat', $campings->nama_alat) }}" required>
                                @error('nama_alat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="tanggal_sewa" class="form-label">tanggal_sewa <span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('tanggal_sewa') is-invalid @enderror" id="tanggal_sewa"
                                    name="tanggal_sewa" value="{{ old('tanggal_sewa', $campings->tanggal_sewa) }}" required>
                                @error('tanggal_sewa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="tanggal_kembali" class="form-label">tanggal_kembali <span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('tanggal_kembali') is-invalid @enderror" id="tanggal_kembali"
                                    name="tanggal_kembali" value="{{ old('tanggal_kembali', $campings->tanggal_kembali) }}" required>
                                @error('tanggal_kembali')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="jumlah_unit" class="form-label">jumlah_unit <span class="text-danger">*</span></label>
                                <input type="integer" class="form-control @error('jumlah_unit') is-invalid @enderror" id="jumlah_unit"
                                    name="jumlah_unit" value="{{ old('jumlah_unit', $campings->jumlah_unit) }}" required>
                                @error('jumlah_unit')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="harga_per_hari" class="form-label">harga_per_hari <span class="text-danger">*</span></label>
                                <input type="integer" class="form-control @error('harga_per_hari') is-invalid @enderror" id="harga_per_hari"
                                    name="harga_per_hari" value="{{ old('harga_per_hari', $campings->harga_per_hari) }}" required>
                                @error('harga_per_hari')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-control @error('status') is-invalid @enderror"
                                    id="status" name="status">
                                    <option value="">-- Pilih Status --</option>
                                    <option value="dipinjam" {{ old('status', $campings->status) == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                                    <option value="dikembalikan" {{ old('status', $campings->status) == 'dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                                    <option value="terlambat" {{ old('status', $campings->status) == 'terlambat' ? 'selected' : '' }}>Terlambat</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
