@extends('layouts.main', ['title' => 'Edit Dusun'])

@section('mainContent')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('dusun.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>

            </div>
            <h1>Edit Dusun</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dusun.index') }}">Dusun</a></div>
                <div class="breadcrumb-item">Edit Dusun</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        {{-- ada form lain dgn id yg sama --}}
                        <form id="form" action="{{ route('dusun.update', ['id' => $dusunDetail->dusun_id]) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <h4>Form Edit Dusun</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Dusun</label>
                                    <input name="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') ?? $dusunDetail->name }}">
                                    <div class="invalid-feedback">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" style="height: 100px;">{{ $dusunDetail->description }}</textarea>
                                    <div class="invalid-feedback">
                                        @error('description')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Foto</label>
                                    <input name="foto" type="text"
                                        class="form-control @error('foto') is-invalid @enderror"
                                        value="{{ $dusunDetail->foto }}">
                                    <div class="invalid-feedback">
                                        @error('foto')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer text-right">
                                <button id="submitBtn" type="submit"
                                    class="btn btn-primary btn-save submitBtn">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('jsLibraries')
    <script>
        document.getElementById('submitBtn').addEventListener('click', function(e) {
            e.preventDefault(); // Mencegah submit default agar kita bisa menambahkan efek loading

            // Tambahkan kelas 'btn-progress' ke tombol
            this.classList.add('btn-progress');

            // Nonaktifkan tombol saat loading
            this.disabled = true;

            // Setelah efek loading, lanjutkan dengan submit form
            setTimeout(() => {
                // Kirim form secara manual setelah animasi loading selesai
                document.getElementById('form').submit();
            }, 500); // Sesuaikan durasi loading (1 detik di sini)
        });
    </script>
@endsection
