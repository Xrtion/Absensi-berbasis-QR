@extends('layouts.app_corona_blank')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">{{ $title }}</div>
                <div class="card-body">
                    {!! Form::model($model, ['route'=> $route, 'method' => $method]) !!}
                    <div class="form-group">
                        <label for="NISN">NISN</label>
                        {!! Form::text('NISN', null, ['class' => 'form-control']) !!}
                        <span class="text-denger">{{ $errors->first('NISN') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="siswa_id">Nama</label>
                        {!! Form::select('siswa_id', $siswa, null, ['class' => 'form-control']) !!}
                        <span class="text-denger">{{ $errors->first('siswa_id') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        {!! Form::select('jurusan', 
                        [
                            'Akuntansi' => 'Akuntansi',
                            'Teknik komputer dan jaringan' => 'Teknik komputer dan jaringan',
                            'Multimedia' => 'Multimedia',
                            'Pemasaran' => 'Pemasaran',
                        ], null, 
                        ['class' => 'form-control']) !!}
                        <span class="text-denger">{{ $errors->first('jurusan') }}</span>
                    </div>
                    {!! Form::submit($button, ['class' => 'btn btn-primary']) !!}
                    <a href="{{ route('siswa.index') }}" class="btn btn-secondary mx-2">Kembali</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
