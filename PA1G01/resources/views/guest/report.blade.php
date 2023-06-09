@extends('layouts.frontend.main')
@section('title')
    Report Satuan Pengawas Internal - IT DEL
@endsection
@section('content')
    <div class="text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
        <h5 class="fw-bold text-primary text-uppercase">Report</h5>
        <h1 class="mb-0">Jika Anda Memiliki Kritik Dan Saran, Jangan Ragu Untuk Menghubungi Kami</h1>
    </div>

    <div class="row g-5 mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-6 wow slideInUp " data-wow-delay="0.3s">
                <form action="{{ route('laporan.create') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-bs-dismiss="alert">X</button>
                                    <h4 class="alert-heading">Success!</h4>
                                    <p class="mb-0">Report was sended succesfully!</p>
                                </div>
                                <script>
                                    // Membuat pesan success menghilang secara otomatis setelah 3 detik
                                    setTimeout(function() {
                                        $('.alert-success').fadeOut('slow');
                                    }, 3000);
                                    setTimeout(function() {
                                        $('.alert-danger').fadeOut('slow');
                                    }, 3000);
                                </script>
                            @elseif($errors->any())
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-bs-dismiss="alert">X</button>
                                    <h4 class="alert-heading">Failed</h4>
                                    <p class="mb-0">Please check the form below for errors!</p>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="nama_pelapor" class="form-control border-0 bg-light px-4"
                                    id="floatingName" placeholder="Your Name">
                                <label for="floatingName">{{ __('Your Name') }}</label>
                                @error('nama_pelapor')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" name="email" class="form-control border-0 bg-light px-4"
                                    id="floatingEmail" placeholder="Your Email">
                                <label for="floatingEmail">Your Email</label>
                                @error('email')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="noTelepon" class="form-control border-0 bg-light px-4"
                                    id="floatingPhone" placeholder="Phone Number">
                                <label for="floatingPhone">Phone Number</label>
                                @error('noTelepon')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="judul_laporan" class="form-control border-0 bg-light px-4"
                                    id="floatingTitle" placeholder="Report Title">
                                <label for="floatingTitle">Report Title</label>
                                @error('judul_laporan')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <select name="kategoriPelapor_id" class="form-control" id="kategoriPelapor">
                                    @foreach ($kategori_pelapor as $row)
                                        <option value="{{ $row->id }}">{{ $row->nama_kategori }}</option>
                                    @endforeach
                                </select>
                                <label for="kategoriPelapor" class="form-label">{{ __('Kategori yang Dilapor') }}</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" name="unit_pelapor" class="form-control border-0 bg-light px-4"
                                    id="unit" placeholder="Unit Kerja">
                                <label for="unit">Unit Kerja Pelapor</label>
                                @error('unit_pelapor')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea name="body" class="form-control border-0 bg-light px-4 py-3" rows="100" id="description"
                                    placeholder="Your Report"></textarea>
                                @error('body')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Lampiran</label>
                            <input name="lampiran" class="form-control border-0 bg-light px-4" type="file" id="formFile"
                                accept=".pdf,.docx,.jpeg,.png,.jpg">
                            @error('lampiran')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit">Send Report</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('scripts')

    @endpush
@endsection
