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
                                    <td>Nama Guru</td>
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
                                {{-- <tr>
                                    <td>Absensi Dengan QR</td>
                                    <td>
                                        <button id="open-popup" class=" btn btn-primary">Scan Qr</button>
                                        <script>
                                            document.getElementById('open-popup').addEventListener('click', function() {
                                                var popupUrl = '/popup'; // Ganti dengan URL pop-up yang sesuai
                                                var popupWindow = window.open(popupUrl, 'Popup', 'width=600,height=400');
                                            });
                                        </script>
                                        <button id="open-popup1" class=" btn btn-primary">Tampilkan Code Qr</button>
                                        <script>
                                            document.getElementById('open-popup1').addEventListener('click', function() {
                                                var popupUrl = '/popup-tampil-qr'; // Ganti dengan URL pop-up yang sesuai
                                                var popupWindow = window.open(popupUrl, 'popup-tampil-qr', 'width=600,height=400');
                                            });
                                        </script>
                                    </td>
                                </tr> --}}
                            </thead>
                        </table>
                        <hr>
                        <h3>Tambah Data Siswa</h3>
                        @if ($model->peserta)
                        <div><a href="{{ route('peserta.create', [
                                'kelas_id' => $model->id,
                            ]) }}">Tambah siswa</a></div>
                        @endif
                        <hr>
                        <h3>Pertemuan</h3>
                        @if ($model->pertemuan->count())
                        <div><a href="{{ route('pertemuan.create', [
                                'kelas_id' => $model->id,
                            ]) }}">Tambah pertemuan</a></div>
                        @endif

                        @if ($model->pertemuan->count() == 0)
                        <div>Belum ada pertemuan <a href="{{ route('pertemuan.create', [
                                'kelas_id' => $model->id,
                            ]) }}">Tambah pertemuan</a></div>
                        @else
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
                                        <a href="{{ route('pertemuan.show', $item->id) }}" class="btn btn-info btn-sm ml-1 mr-1">
                                            Detail 
                                        </a>
                                        <a href="{{ url('operator/pertemuan/hapus/'.$item->id, []) }}"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah anda yakin mau menghapus Siswa ini?')"  
                                            >Hapus
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                        <br>
                        <a href="{{ route('kelas.index') }}" class="btn btn-secondary mx-2">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection