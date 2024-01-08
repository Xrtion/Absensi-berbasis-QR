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
                                </tr>
                            </thead>
                        </table>
                        <hr>
                        <h3>Data Siswa</h3>
                        {!! Form::open(['route' => 'absensi.store', 'method' => 'POST']) !!}
                        <table class="table table-striped mt-3">
                            <thead>
                                <tr>
                                    <td class="col-1">No</td>
                                    <td>Nama Siswa</td>
                                    <td>Absensi</td>
                                    <td>Aksi</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($model->kelas->peserta as $item)
                                {{-- {{ dd($model)}} --}}
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->siswa->name}}</td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio"
                                                name="siswa_id[{{ $item->siswa_id }}]" value="masuk"
                                                id="absen_masuk{{ $item->siswa_id }}">
                                            <label class="form-check-label" for="absen_masuk">Masuk</label>
                                            <input type="hidden" name="kelas_id[{{ $item->siswa_id }}]" value="{{ $item->kelas_id }}">
                                            <input type="hidden" name="pertemuan_id[{{ $item->siswa_id }}]" value="{{ $model->id }}">
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio"
                                                name="siswa_id[{{ $item->siswa_id }}]" value="izin"
                                                id="absen_izin{{ $item->siswa_id }}">
                                            <label class="form-check-label" for="absen_izin">Izin</label>
                                            <input type="hidden" name="kelas_id[{{ $item->siswa_id }}]" value="{{ $item->kelas_id }}">
                                            <input type="hidden" name="pertemuan_id[{{ $item->siswa_id }}]" value="{{ $model->id }}">
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio"
                                                name="siswa_id[{{ $item->siswa_id }}]" value="alpa"
                                                id="absen_alpa{{ $item->siswa_id }}">
                                            <label class="form-check-label" for="absen_alpa">Alpah</label>
                                            <input type="hidden" name="kelas_id[{{ $item->siswa_id }}]" value="{{ $item->kelas_id }}">
                                            <input type="hidden" name="pertemuan_id[{{ $item->siswa_id }}]" value="{{ $model->id }}">
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ url('operator/peserta/hapus/'.$item->id, []) }}"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah anda yakin mau menghapus Siswa dari kelas ini?')"  
                                            >Hapus
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                        {!! Form::submit("Simpan", ['class' =>'btn btn-primary']) !!}
                        {!! Form::close() !!}
                        <a href="{{ route('kelas.index') }}" class="btn btn-secondary mx-2 mt-2">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection