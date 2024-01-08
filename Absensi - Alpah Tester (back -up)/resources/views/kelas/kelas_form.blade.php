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
                        <label for="guru_id">Nama Guru</label>
                        {!! Form::select('guru_id', $guru, null, ['class' => 'form-control']) !!}
                        <span class="text-denger">{{ $errors->first('guru_id') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="ruang_id">Ruang</label>
                        {!! Form::select('ruang_id', $ruang, null, ['class' => 'form-control']) !!}
                        <span class="text-denger">{{ $errors->first('ruang_id') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="mapel_id">Mata Pelajaran</label>
                        {!! Form::select('mapel_id', $mapel, null, ['class' => 'form-control']) !!}
                        <span class="text-denger">{{ $errors->first('mapel_id') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="tahun">Tahun</label>
                        {!! Form::datetime('tahun', $model->tahun ?? now()->format('Y'), ['class' => 'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('tahun') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="smester">Smester</label>
                        {!! Form::text('smester', null, ['class' => 'form-control']) !!}
                        <span class="text-denger">{{ $errors->first('smester') }}</span>
                    </div>
                    {!! Form::submit($button, ['class' => 'btn btn-primary']) !!}
                    <a href="{{ route('kelas.index') }}" class="btn btn-secondary mx-2">Kembali</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
