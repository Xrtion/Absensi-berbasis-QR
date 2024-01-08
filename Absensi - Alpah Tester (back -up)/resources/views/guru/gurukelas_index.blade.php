@extends('layouts.app_corona_guru')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ $title }}</div>
                <div class="card-body">
                    <div class="table-responsive mt-3">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Guru</th>
                                    <th>Ruang</th>
                                    <th>Mapel</th>
                                    {{-- <th>Tanggal Mulai</th> --}}
                                    <th>Semester</th>
                                    <th>Tahun Ajar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ( $models as $item )
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->guru->name }}</td>
                                        <td>{{ $item->ruang->nama }}</td>
                                        <td>{{ $item->mapel->nama }}</td>
                                        {{-- <td>{{ $item->tangga_mulai }}</td> --}}
                                        <td>{{ $item->smester }}</td>
                                        <td>{{ $item->tahun }}</td>
                                        <td>
                                            <a href="{{ route('gurukelas.show', $item->id) }}" class="btn btn-info ml-1 mr-1">
                                                Detail 
                                            </a>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @empty
                                    <td colspan="4">Tidak Ada Data</td>
                                @endforelse
                            </tbody>
                        </table>
                        {!! $models->links() !!}
                        <hr>
                        {{-- <a href="{{ route('beranda.index') }}" class="btn btn-secondary mx-2">Kembali Ke halamanan Utama</a> --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
