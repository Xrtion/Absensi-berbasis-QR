@extends('layouts.app_corona_siswa')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Kelas Kamu Smester ini</div>
                <div class="card-body">
                    <div class="table-responsive mt-3">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th class="col-1">No</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ( $model as $item )
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->kelas->mapel->nama }}</td>
                                        <td>
                                            <a href="{{ route('siswakelas.show', $item->kelas->id) }}" class="btn btn-info ml-1 mr-1">
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
                        {!! $model->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
