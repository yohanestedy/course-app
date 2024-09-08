@extends('layouts.main', ['title' => 'Tambah Warga'])

@section('mainContent')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('warga.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>

            </div>
            <h1>Tambah Warga</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('warga.index') }}">Warga</a></div>
                <div class="breadcrumb-item">Tambah Warga</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form id="form" action="{{ route('warga.store') }}" method="POST" class="needs-validation"
                            novalidate="">
                            @csrf
                            <div class="card-header">
                                <h4>Form Tambah Warga</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Warga</label>
                                    <input name="name" type="text" class="form-control" required="">
                                    <div class="invalid-feedback">
                                        Form tidak boleh kosong
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Dusun</label>
                                    <select name="dusun" id="dusun" class="form-control" required="">
                                        <option value="">--Select Dusun--</option>
                                        @foreach ($dusunDetail as $d)
                                            <option value="{{ $d->dusun_id }}">{{ $d->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea name="description" class="form-control" required="" style="height: 100px;"></textarea>
                                    <div class="invalid-feedback">
                                        Deskripsikan Warga
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Foto</label>
                                    <input name="foto" type="text" class="form-control" required="">
                                    <div class="invalid-feedback">
                                        Upload Foto Warga
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer text-right">
                                <button id="submitBtn" type="submit" class="btn btn-primary btn-save">Simpan</button>
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
