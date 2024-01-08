@extends('layouts.app_corona_blank')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">Form User</div>
                <div class="card-body">
                    {!! Form::model($model, ['route'=> $route, 'method' => $method]) !!}
                    <div class="form-group">
                        <label for="name">Nama</label>
                        {!! Form::text('name', null, ['class' => 'form-control', 'autofocus']) !!}
                        <span class="text-denger">{{ $errors->first('name') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        {!! Form::text('email', null, ['class' => 'form-control']) !!}
                        <span class="text-denger">{{ $errors->first('email') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                        <span class="text-denger">{{ $errors->first('password') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="nohp">No HandPhone</label>
                        {!! Form::text('nohp', null, ['class' => 'form-control']) !!}
                        <span class="text-denger">{{ $errors->first('nohp') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="akses">Akses</label>
                        {!! Form::select('akses', 
                        [
                            'operator' => 'Operator',
                            'guru' => 'Guru',
                            'siswa' => 'Siswa'
                        ], null, 
                        ['class' => 'form-control']) !!}
                        <span class="text-denger">{{ $errors->first('akses') }}</span>
                    </div>
                    {!! Form::submit($button, ['class' => 'btn btn-primary']) !!}
                    <a href="{{ route('user.index') }}" class="btn btn-secondary mx-2">Kembali</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
