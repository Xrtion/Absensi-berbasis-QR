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
                        <label for="guru_id">Nama Wali Kelas</label>
                        {!! Form::select('guru_id', $guru, null, ['class' => 'form-control']) !!}
                        <span class="text-denger">{{ $errors->first('guru_id') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Ruang</label>
                        {!! Form::text('nama', null, ['class' => 'form-control']) !!}
                        <span class="text-denger">{{ $errors->first('nama') }}</span>
                    </div>
                    
                    {!! Form::submit($button, ['class' => 'btn btn-primary']) !!}
                    <a href="{{ route('ruang.index') }}" class="btn btn-secondary mx-2">Kembali</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
