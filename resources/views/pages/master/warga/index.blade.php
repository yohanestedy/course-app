@extends('layouts.main', ['title' => 'Warga'])

@section('mainContent')
    <section class="section">
        <div class="section-header">
            <h1>Warga</h1>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Daftar Warga</h4>
                        <div class="card-header-action">
                            <a class="btn btn-primary btn-action" href="#"><i class="fas fa-plus mr-2"></i>Tambah</a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Warga</th>
                                        <th>Dusun</th>
                                        <th style="text-align: center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $n = 1;
                                    @endphp


                                    @foreach ($warga as $w)
                                        <tr>
                                            <td>
                                                {{ $n++ }}
                                            </td>
                                            <td>
                                                {{ $w->name }}
                                            </td>
                                            <td>
                                                {{ $w->dusunDetail->name }}
                                            </td>
                                            <td style="width: 20%; text-align: center">

                                                {{-- Tombol Edit --}}
                                                <a class="btn btn-info btn-action mr-1" data-toggle="tooltip"
                                                    href="{{ route('warga.detail', ['id' => $w->id]) }}" title="Detail"><i
                                                        class="fas fa-eye"></i></a>

                                                {{-- Tombol Edit --}}
                                                <a class="btn btn-success btn-action mr-1" data-toggle="tooltip"
                                                    href="{{ route('warga.edit', ['id' => $w->id]) }}" title="Edit"><i
                                                        class="fas fa-pencil-alt"></i></a>

                                                {{-- Tombol Delete --}}
                                                <form action="{{ route('warga.delete', ['id' => $w->id]) }}"
                                                    style="display:inline"; method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-action swal-delete"
                                                        data-toggle="tooltip" title="Hapus"><i
                                                            class="fas fa-trash-alt"></i></button>
                                                </form>
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


@section('jsLibraries')
    <script src="{{ asset('/node_modules/sweetalert/dist/sweetalert.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            // SweetAlert untuk konfirmasi penghapusan
            $(".swal-delete").click(function(event) {
                event.preventDefault();

                let form = $(this).closest("form");

                swal({
                    title: 'Hapus Data Warga?',
                    text: 'Setelah dihapus, Anda tidak dapat memulihkan data ini!',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        form.submit(); // Submit form setelah konfirmasi
                    } else {
                        swal('File Anda aman!');
                    }
                });
            });

            // SweetAlert untuk notifikasi sukses atau error dari session
            @if (session()->has('success'))
                swal('Success', '{{ session('success') }}', 'success');
            @elseif (session()->has('error'))
                swal('Error', '{{ session('error') }}', 'error');
            @endif
        });
    </script>
@endsection
