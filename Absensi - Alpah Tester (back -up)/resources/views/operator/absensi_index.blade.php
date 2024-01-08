@extends('layouts.app_corona')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">Data Seluruh Absensi</div>
                <div class="card-body">
                    <div class="table-responsive mt-3">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Siswa</th>
                                    <th>Status</th>
                                    <th>Ruang</th>
                                    <th>Tanggal pertemuan</th>
                                    <th>Di Absen Oleh</th>
                                    <th>Jam dan Tanggal Absensi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ( $models as $item )
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->siswa->name }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>{{ $item->pertemuan->ruang->nama }}</td>
                                        <td>{{ $item->pertemuan->tanggal }}</td>
                                        <td>{{ $item->absen_oleh }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            {!! Form::open([
                                                'route' => ['absensi.destroy', $item->id],
                                                'method' => 'DELETE',
                                                'onsubmit' => 'return confirm("Yakin Ingin Menghapus Data ini?")',
                                            ]) !!}
                                            {!! Form::submit("Hapus", ['class' =>'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @empty
                                    <td colspan="4">Tidak Ada Data</td>
                                @endforelse
                            </tbody>
                        </table>
                        {!! $models->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
