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
                                    <td>{{ $model->guru->name}}</td>
                                </tr>
                                <tr>
                                    <td>Waktu Mulai</td>
                                    <td>{{ $model->waktu_mulai }}</td>
                                </tr>
                                <tr>
                                    <td>Waktu Selesai</td>
                                    <td>{{ $model->waktu_selesai }}</td>
                                </tr>
                                <tr>
                                    <td>Topik</td>
                                    <td>{{ $model->topik }}</td>
                                </tr>
                                <tr>
                                    <td>Ruang</td>
                                    <td>{{ $model->ruang->nama }}</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>
                                        @if ($absensi)
                                            {{ $absensi->status }}
                                        @else
                                            Kamu belum absen
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Absensi Dengan QR</td>
                                    <td>
                                        <button id="open-popup" class="btn btn-primary" siswa-id="{{ Auth::id() }}">Scan Qr</button>
                                        {{-- <button id="open-popup" class=" btn btn-primary">Scan Qr</button> --}}
                                        <script>
                                            document.getElementById('open-popup').addEventListener('click', function() {
                                                var siswa_id = this.getAttribute('siswa-id');
                                                var popupUrl = '/popupsiswa'; // Ganti dengan URL pop-up yang sesuai
                                                var popupUrl = '/popupsiswa?siswa-id=' + siswa_id;
                                                var popupWindow = window.open(popupUrl, 'Popup', 'width=600,height=400');
                                            });
                                        </script>
                                    </td>
                                </tr>
                            </thead>
                        </table>
                        <hr>
                        <a href="{{ route('tamsiswa.index') }}" class="btn btn-secondary mx-2 mt-2">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection