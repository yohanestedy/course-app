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
                        <form action="{{ route('dusun.store') }}" method="POST" class="needs-validation" novalidate="">
                            @csrf
                            <div class="card-header">
                                <h4>Form Tambah Dusun</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Dusun</label>
                                    <input name="name" type="text" class="form-control" required="">
                                    <div class="invalid-feedback">
                                        Form tidak boleh kosong
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea name="description" class="form-control" required="" style="height: 100px;"></textarea>
                                    <div class="invalid-feedback">
                                        Deskripsikan Dusun
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Foto</label>
                                    <input name="foto" type="text" class="form-control" required="">
                                    <div class="invalid-feedback">
                                        Upload Foto Dusun
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary btn-save">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
