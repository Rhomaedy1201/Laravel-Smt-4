@extends('backend/layouts.template')

@section('content')

@include('backend/layouts.header')
@include('backend/layouts.sidebar')

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Pendidikan</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Riwayat</a></li>
        <li class="breadcrumb-item active">Pendidikan</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Menambah Pendidikan</h5>

              <!-- Horizontal Form -->
              <form id="pendidikan_form" method="POST" 
              action="{{ isset($pendidikan) ? route('pendidikan.update', $pendidikan->id) : 
              route('pendidikan.store') }}">
                {!! csrf_field() !!}
                {!! isset($pendidikan) ? method_field('PUT') : '' !!}
                <input type="hidden" name="id" value="{{ isset($pendidikan) ? $pendidikan->id : '' }}"><br>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Perusahaan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" 
                    value="{{ isset($pendidikan) ? $pendidikan->nama : '' }}" required />
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Tingkatan</label>
                  <div class="col-lg-10">
                    <select name="tingkatan" id="tingkatan" class="form-control m-bot15" required>
                        <option value="1 {{ (isset($pendidikan) && $pendidikan->tingkatan == 1) }}">TK</option>
                        <option value="2 {{ (isset($pendidikan) && $pendidikan->tingkatan == 2) }}">SD</option>
                        <option value="3 {{ (isset($pendidikan) && $pendidikan->tingkatan == 3) }}">SMP</option>
                        <option value="4 {{ (isset($pendidikan) && $pendidikan->tingkatan == 4) }}">SMA/SMK</option>
                        <option value="5 {{ (isset($pendidikan) && $pendidikan->tingkatan == 5) }}">D3</option>
                        <option value="6 {{ (isset($pendidikan) && $pendidikan->tingkatan == 6) }}">D4/S1</option>
                        <option value="7 {{ (isset($pendidikan) && $pendidikan->tingkatan == 7) }}">S2</option>
                        <option value="8 {{ (isset($pendidikan) && $pendidikan->tingkatan == 8) }}">S3</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Tahun Masuk</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="tahun_masuk" name="tahun_masuk" 
                    value="{{ isset($pendidikan) ? $pendidikan->tahun_masuk : '' }}" required />
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Tahun Selesai</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="tahun_keluar" name="tahun_keluar" 
                    value="{{ isset($pendidikan) ? $pendidikan->tahun_keluar : '' }}" required />
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Save</button>
                  <a href="{{ route('pendidikan.index') }}" class="btn btn-secondary">
                    Cancel
                  </a>
                </div>
              </form><!-- End Horizontal Form -->

            </div>
          </div>

      </div>
    </div>

  </div>
</section>

</main><!-- End #main -->

@endsection
