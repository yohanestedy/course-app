@extends('layouts.main', ['title' => 'Dusun'])

@section('mainContent')
    <section class="section">
        <div class="section-header">
            <h1>Dusun</h1>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Daftar Dusun</h4>
                        <div class="card-header-action">
                            <a class="btn btn-success btn-action" title="Tambah"><i class="fas fa-plus mr-2"></i>Add Dusun</a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $n = 1;
                                    @endphp
                                    @foreach ($dusun as $d)
                                        <tr>
                                            <td>
                                                {{ $n++ }}
                                            </td>
                                            <td>
                                                {{ $d->dusunDetail->name }}
                                            </td>
                                            <td style="width: 20%; text-align: center">
                                                <a class="btn btn-info btn-action mr-1" data-toggle="tooltip"
                                                    title="View"><i class="fas fa-eye"></i></a>
                                                <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip"
                                                    title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"
                                                    data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?"
                                                    data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
