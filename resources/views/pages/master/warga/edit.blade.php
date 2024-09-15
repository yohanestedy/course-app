@extends('layouts.main', ['title' => 'Edit Warga'])

@section('mainContent')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('warga.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>

            </div>
            <h1>Edit Warga</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('warga.index') }}">Warga</a></div>
                <div class="breadcrumb-item">Edit Warga</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form id="form" action="{{ route('warga.update', ['id' => $warga->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <h4>Form Edit Warga</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Warga</label>
                                    <input name="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') ?? $warga->name }}">
                                    <div class="invalid-feedback">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Dusun</label>
                                    <select name="dusun" id="dusun"
                                        class="form-control @error('dusun') is-invalid @enderror">
                                        <option value="">--Pilih Dusun--</option>
                                        @foreach ($dusunDetail as $d)
                                            {{-- jika dusun_detail->dusun_id == warga->dusun_id --}}
                                            {{-- maka buat selected --}}
                                            @if ($d->dusun_id == $warga->dusun_id)
                                                <option value="{{ $d->dusun_id }}" selected>{{ $d->name }}</option>
                                            @else
                                                {{-- else --}}
                                                {{-- loopingan biasa --}}
                                                <option value="{{ $d->dusun_id }}">{{ $d->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        @error('dusun')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Foto</label>
                                    <input name="foto" type="text"
                                        class="form-control @error('foto') is-invalid @enderror"
                                        value="{{ $warga->foto }}">
                                    <div class="invalid-feedback">
                                        @error('foto')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Umur</label>
                                    <input name="age" type="number"
                                        class="form-control @error('age') is-invalid @enderror" value="{{ $warga->age }}"
                                        min="0" max="120" step="1">
                                    <div class="invalid-feedback">
                                        @error('age')
                                            {{ $message }}
                                        @enderror
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
