@extends('layouts.main', ['title' => 'Detail Dusun'])

@section('mainContent')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('dusun.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Detail Dusun {{ $dusunDetail->name }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dusun.index') }}">Dusun</a></div>
                <div class="breadcrumb-item">Detail Dusun {{ $dusunDetail->name }}</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Deskripsi Dusun</h4>
                        </div>
                        <div class="card-body">
                            <img src="{{asset('storage/dusun/'.$dusunDetail->foto)}}" width="100%">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Totam molestias consequatur
                                repudiandae impedit in dolor fuga doloremque recusandae quidem sequi nobis quibusdam,
                                nulla
                                vel nemo quam eaque, perspiciatis, aspernatur cupiditate.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
