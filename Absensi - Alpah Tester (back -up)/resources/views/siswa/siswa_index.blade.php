@extends('layouts.app_corona')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">{{ $title }}</div>
                <div class="card-body">
                    <a href="{{ route('siswa.create') }}" class="btn btn-primary">Tambah Data</a>
                    <hr>
                    {!! Form::open(['route' =>'siswa.index', 'method' => 'GET']) !!}
                    <div class="input-group">
                        <input name="q" type="text" class="form-control" placeholder="Cari Data NISN" aria-label="Cari Data NISN" aria-describedby="basic-addon2" value="{{ request('q') }}">
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
                                    <th>NISN</th>
                                    <th>Nama</th>
                                    <th>Jurusan</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ( $models as $item )
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->NISN }}</td>
                                        <td>{{ $item->siswa->name }}</td>
                                        <td>{{ $item->jurusan }}</td>
                                        <td>{{ $item->siswa->email }}</td>
                                        <td>
                                            {!! Form::open([
                                                'route' => ['siswa.destroy', $item->id],
                                                'method' => 'DELETE',
                                                'onsubmit' => 'return confirm("Yakin Ingin Menghapus Data ini?")',
                                            ]) !!}
                                            <a href="{{ route('siswa.edit', $item->id) }}" class="btn btn-warning">
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
