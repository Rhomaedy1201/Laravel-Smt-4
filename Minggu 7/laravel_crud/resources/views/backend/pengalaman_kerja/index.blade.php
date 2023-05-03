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
              <h5 class="card-title">Pengalaman Kerja</h5>
          
              <!-- Horizontal Form -->
              <form>
                <div class="panael-body">
                  @if ($message = Session::get('success'))
                      <div class="alert alert-success">
                        <p>{{ $message }}</p>
                      </div>
                  @endif
                </div>
                <div class="text-start">
                  <a href="{{ route('pengalaman_kerja.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah</a>
                </div>
              </form>
              <br>
              <br>
              <!-- End Horizontal Form -->
              {{-- Table --}}
              <table class="table table-striped table-advace table-hover">
                <tbody>
                  <tr>
                    <th><i class="icon_bag"></i>No</th>
                    <th><i class="icon_bag"></i>Nama</th>
                    <th><i class="icon_document"></i>Jabatan</th>
                    <th><i class="icon_calender"></i>Tahun Masuk</th>
                    <th><i class="icon_calender"></i>Tahun Selesai</th>
                    <th><i class="icon_cogs"></i>Action</th>
                  </tr>
                  <?php $index = 0 ?>
                  @foreach ($pengalaman_kerja as $item)
                  <?php $index++ ?>
                  <tr>
                    <td>{{ $index }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->jabatan }}</td>
                    <td>{{ $item->tahun_masuk }}</td>
                    <td>{{ $item->tahun_keluar }}</td>
                    <td>
                      <div class="btn-group">
                        <form action="{{ route('pengalaman_kerja.destroy', $item->id) }}" method="POST">
                          <a class="btn btn-warning" href="{{ route('pengalaman_kerja.edit',$item->id) }}">
                            <i class="ri-edit-2-line"></i>
                          </a>

                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini??..')">
                            <i class="ri-delete-bin-2-line"></i>
                          </button>
                        </form>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
          
            </div>
          </div>
        </div>
      </div>

          

    </div>
  </section>

</main><!-- End #main -->

@endsection