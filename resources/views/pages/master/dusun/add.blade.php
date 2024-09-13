@extends('layouts.main', ['title' => 'Tambah Dusun'])

@section('mainContent')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('dusun.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>

            </div>
            <h1>Tambah Dusun</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dusun.index') }}">Dusun</a></div>
                <div class="breadcrumb-item">Tambah Dusun</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form id="form" action="{{ route('dusun.store') }}" method="POST" class="needs-validation"
                            novalidate="">
                            @csrf
                            <div class="card-header">
                                <h4>Form Tambah Dusun</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Dusun</label>
                                    <input name="name" type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" required="">
                                    <div class="invalid-feedback">
                                        {{$errors->has('name') ? $errors->first('name') : 'Nama Dusun harus diisi'}}
                                    </div>
                                    {{-- @if($errors->has('name'))
                                        <div class="error text-danger">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @enderror --}}
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea name="description" class="form-control" style="height: 100px;" required=""></textarea>
                                    <div class="invalid-feedback">
                                        Deskripsikan Dusun
                                    </div>
                                    @if($errors->has('description'))
                                        <div class="error text-danger">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Foto</label>
                                    <input name="foto" type="text" class="form-control" required="">
                                    <div class="invalid-feedback">
                                        Upload Foto Dusun
                                    </div>
                                    @if($errors->has('foto'))
                                        <div class="error text-danger">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @enderror
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


            // Setelah efek loading, lanjutkan dengan submit form
            setTimeout(() => {
                // Kirim form secara manual setelah animasi loading selesai
                document.getElementById('form').submit();
            }, 500); // Sesuaikan durasi loading (1 detik di sini)
        });
        
            // Setelah efek loading, lanjutkan dengan submit form
            setTimeout(() => {
                // Kirim form secara manual setelah animasi loading selesai
                document.getElementById('form').submit();
            }, 500); // Sesuaikan durasi loading (1 detik di sini)
        });
    </script>
@endsection
