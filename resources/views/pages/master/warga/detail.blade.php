@extends('layouts.main', ['title' => 'Detail Warga'])

@section('mainContent')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('warga.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Detail Warga</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('warga.index') }}">Warga</a></div>
                <div class="breadcrumb-item">Detail Warga</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Deskripsi Warga</h4>
                        </div>
                        <div class="card-body">
                            <img src="{{ asset('storage/warga/' . $warga->foto) }}" width="25%">
                            <p>Nama: {{ $warga->name }}</p>
                            <p>Umur: {{ $umur }} tahun</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
