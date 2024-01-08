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
                        <label for="guru_id">Nama</label>
                        {!! Form::select('guru_id', $guru, null, ['class' => 'form-control']) !!}
                        <span class="text-denger">{{ $errors->first('guru_id') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="NUPTK">NUPTK</label>
                        {!! Form::text('NUPTK', null, ['class' => 'form-control']) !!}
                        <span class="text-denger">{{ $errors->first('NUPTK') }}</span>
                    </div>
                    {!! Form::submit($button, ['class' => 'btn btn-primary']) !!}
                    <a href="{{ route('guru.index') }}" class="btn btn-secondary mx-2">Kembali</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
