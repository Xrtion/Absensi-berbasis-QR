@extends('layouts.app_corona_blank')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ $title }}</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-contextual">
                            <thead>
                                <tr>
                                    <td class="col-1">Nama Guru</td>
                                    <td>{{ $model->guru->name }}</td>
                                </tr>
                                <tr>
                                    <td>Ruang</td>
                                    <td>{{ $model->ruang->nama }}</td>
                                </tr>
                                <tr>
                                    <td>Mata Pelajaran</td>
                                    <td>{{ $model->mapel->nama }}</td>
                                </tr>
                                <tr>
                                    <td>Smester</td>
                                    <td>{{ $model->smester }}</td>
                                </tr>
                                <tr>
                                    <td>Tahun Ajar</td>
                                    <td>{{ $model->tahun }}</td>
                                </tr>
                            </thead>
                        </table>
                        <hr>
                        <h3>Pertemuan</h3>
                        <table class="table table-striped mt-3">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Tanggal</td>
                                    <td>Nama Guru</td>
                                    <td>Waktu Mulai</td>
                                    <td>Waktu Selesai</td>
                                    <td>Topik</td>
                                    <td>Ruang</td>
                                    <td>Aksi</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($model->pertemuan as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->tanggal}}</td>
                                    <td>{{ $item->guru->name}}</td>
                                    <td>{{ $item->waktu_mulai}}</td>
                                    <td>{{ $item->waktu_selesai}}</td>
                                    <td>{{ $item->topik}}</td>
                                    <td>{{ $item->ruang->nama}}</td>
                                    <td>
                                        <a href="{{ route('tamsiswapertemuan.show', $item->id) }}" class="btn btn-info btn-sm ml-1 mr-1">
                                            Detail 
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                        <a href="{{ route('tamsiswa.index') }}" class="btn btn-secondary mx-2">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection