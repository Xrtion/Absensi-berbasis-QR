@extends('layouts.app_corona')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">{{ $title }}</div>
                <div class="card-body">
                    <a href="{{ route('ruang.create') }}" class="btn btn-primary">Tambah Data</a>
                    <hr>
                    {!! Form::open(['route' =>'ruang.index', 'method' => 'GET']) !!}
                    <div class="input-group">
                        <input name="q" type="text" class="form-control" placeholder="Cari Data Ruang" aria-label="Cari Data Ruang" aria-describedby="basic-addon2" value="{{ request('q') }}">
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
                                    <th>Ruang</th>
                                    <th>Wali Kelas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ( $models as $item )
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->guru->name }}</td>
                                        <td>
                                            {!! Form::open([
                                                'route' => ['ruang.destroy', $item->id],
                                                'method' => 'DELETE',
                                                'onsubmit' => 'return confirm("Yakin Ingin Menghapus Data ini?")',
                                            ]) !!}
                                            <a href="{{ route('ruang.edit', $item->id) }}" class="btn btn-warning">
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
