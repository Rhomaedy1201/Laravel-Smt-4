@extends('backend/layouts.template')

@section('content')

@include('backend/layouts.header')
@include('backend/layouts.sidebar')

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Pengalaman Kerja</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Riwayat</a></li>
        <li class="breadcrumb-item active">Pengalaman Kerja</li>
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
              <h5 class="card-title">Menambah Pengalaman Kerja</h5>

              <!-- Horizontal Form -->
              <form id="pengalaman_kerja_form" method="POST" 
              action="{{ isset($pengalaman_kerja) ? route('pengalaman_kerja.update', $pengalaman_kerja->id) : 
              route('pengalaman_kerja.store') }}">
                {!! csrf_field() !!}
                {!! isset($pengalaman_kerja) ? method_field('PUT') : '' !!}
                <input type="hidden" name="id" value="{{ $pengalaman_kerja->id }}"><br>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Perusahaan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" 
                    value="{{ isset($pengalaman_kerja) ? $pengalaman_kerja->nama : '' }}" required />
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Jabatan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="jabatan" name="jabatan" 
                    value="{{ isset($pengalaman_kerja) ? $pengalaman_kerja->jabatan : '' }}" required />
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Tahun Masuk</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="tahun_masuk" name="tahun_masuk" 
                    value="{{ isset($pengalaman_kerja) ? $pengalaman_kerja->tahun_masuk : '' }}" required />
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Tahun Selesai</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="tahun_keluar" name="tahun_keluar" 
                    value="{{ isset($pengalaman_kerja) ? $pengalaman_kerja->tahun_keluar : '' }}" required />
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Save</button>
                  <a href="{{ route('pengalaman_kerja.index') }}" class="btn btn-secondary">
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
