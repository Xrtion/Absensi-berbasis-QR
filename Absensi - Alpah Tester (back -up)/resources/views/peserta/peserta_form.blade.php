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
                    {{-- {!! Form::hidden('pertemuan_id', $pertemuan_id, []) !!} --}}
                    <div class="form-group">
                        <label for="siswa_id">Nama Siswa</label>
                        {!! Form::select('siswa_id', $siswa, null, ['class' => 'form-control', 'id' => 'siswa_id'])!!}
                        <span class="text-denger">{{ $errors->first('siswa_id') }}</span>
                    </div>
                    {!! Form::submit($button, ['class' => 'btn btn-primary']) !!}
                    <a href="{{ route('kelas.show', $kelas_id) }}" class="btn btn-secondary mx-2">Kembali</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection