@extends('layouts.app_corona')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ $title }}</div>
                <div class="card-body">
                    <a href="{{ route('kelas.create') }}" class="btn btn-primary">Tambah Data</a>
                    <hr>
                    {!! Form::open(['route' =>'kelas.index', 'method' => 'GET']) !!}
                    <div class="input-group">
                        <input name="q" type="text" class="form-control" placeholder="Cari Semester" aria-label="Cari Semester" aria-describedby="basic-addon2" value="{{ request('q') }}">
                        <div class="input-group-append">
                          <button class="btn btn-sm btn-facebook" type="submit">
                            <i class="mdi mdi-account-search"></i>
                          </button>
                        </div>
                    </div>
                    {!! Form::close() !!}
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
                                            {!! Form::open([
                                                'route' => ['kelas.destroy', $item->id],
                                                'method' => 'DELETE',
                                                'onsubmit' => 'return confirm("Yakin Ingin Menghapus Data ini?")',
                                            ]) !!}
                                            <a href="{{ route('kelas.show', $item->id) }}" class="btn btn-info ml-1 mr-1">
                                                Detail 
                                            </a>
                                            <a href="{{ route('kelas.edit', $item->id) }}" class="btn btn-warning ml-1 mr-1">
                                                Edit    
                                            </a>
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
