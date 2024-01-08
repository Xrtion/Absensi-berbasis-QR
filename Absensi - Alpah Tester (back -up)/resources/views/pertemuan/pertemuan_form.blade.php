@extends('layouts.app_corona_blank')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">{{ $title }}</div>
                <div class="card-body">
                    {!! Form::model($model, ['route'=> $route, 'method' => $method]) !!}
                    {!! Form::hidden('kelas_id', $kelas_id, []) !!}
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        {!! Form::date('tanggal', null, ['class' => 'form-control']) !!}
                        <span class="text-denger">{{ $errors->first('tanggal') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="guru_id">Nama Guru</label>
                        {!! Form::select('guru_id', $guru, null, ['class' => 'form-control', 'id' => 'guru_id'])!!}
                        <span class="text-denger">{{ $errors->first('guru_id') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="waktu_mulai">Waktu Mulai</label>
                        {!! Form::time('waktu_mulai', null, ['class' => 'form-control']) !!}
                        <span class="text-denger">{{ $errors->first('waktu_mulai') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="waktu_selesai">Waktu Selesai</label>
                        {!! Form::time('waktu_selesai', null, ['class' => 'form-control']) !!}
                        <span class="text-denger">{{ $errors->first('waktu_selesai') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="ruang_id">Ruang</label>
                        {!! Form::select('ruang_id', $ruang, null, ['class' => 'form-control', 'id' => 'ruang_id'])!!}
                        <span class="text-denger">{{ $errors->first('ruang_id') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="topik">Topic</label>
                        {!! Form::textarea('topik', null, ['class' => 'form-control']) !!}
                        <span class="text-denger">{{ $errors->first('topik') }}</span>
                    </div>
                    <br>
                    {!! Form::submit($button, ['class' => 'btn btn-primary']) !!}
                    <a href="{{ url()->previous() }}" class="btn btn-secondary mx-2">Kembali</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection