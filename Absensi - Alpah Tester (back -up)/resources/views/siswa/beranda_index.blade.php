@extends('layouts.app_corona_guru')

@section('content')
<div class="content-wrapper">
    <div class="card corona-gradient-card mb-3">
      <div class="card-body py-0 px-0 px-sm-3">
        <div class="row align-items-center">
          <div class="col-4 col-sm-3 col-xl-2">
            <img src="{{ asset('corona') }}/assets/images/logo-mini.png" class="gradient-corona-img img-fluid" alt="">
          </div>
          <div class="col-5 col-sm-7 col-xl-8 p-0">
            <h4 class="mb-1 mb-sm-0">Selamat Datang Kembali {{ Auth::user()->name }}</h4>
            <p class="mb-0 font-weight-normal d-none d-sm-block">SMK Revanny Indra Putra Jambi</p>
          </div>
          <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Mata Pelajaran Hari ini</h4>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Ruang</th>
                    <th>Mata Pelajaran</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Jacob</td>
                    <td>53275531</td>
                    <td>12 May 2017</td>
                    <td><label class="badge badge-danger">Pending</label></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection
