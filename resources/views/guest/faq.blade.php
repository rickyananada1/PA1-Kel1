@extends('layouts.frontend.main')
@section('title')FAQ SPI @endsection
@section('content')
    <!-- Contact Start -->
    <div class="container-fluid py-1 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-2">
            <div class="text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Frequently Askes Questions</h5>
                <h5 class="fw-bold text-uppercase">Questions From</h5>
            </div>
            <div class="container">
                @if ($message = Session::get('message'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    <script>
                        // Membuat pesan success menghilang secara otomatis setelah 3 detik
                        setTimeout(function() {
                            $('.alert-success').fadeOut('slow');
                        }, 2400);
                    </script>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        Please check the form below for errors
                    </div>
                @endif
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-6 wow slideInUp" data-wow-delay="0.3s">
                        <form action="{{ route('faq.create') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="nama" class="form-control border-0 bg-light px-4"
                                            id="floatingName" placeholder="Your Name">
                                        <label for="floatingName">{{ __('Your Name') }}</label>
                                        @error('nama')
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
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" name="noTelepon" class="form-control border-0 bg-light px-4"
                                            id="floatingPhone" placeholder="Phone Number">
                                        <label for="floatingPhone">Phone Number</label>
                                        @error('noTelepon')
                                            <span class="text-danger mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea name="body" class="form-control border-0 bg-light px-4 py-3" rows="4" id="description"
                                            placeholder="Your Report"></textarea>
                                        @error('body')
                                            <span class="text-danger mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="containerFluid">
        <h3>Frequently Asked Questions(FAQs)</h3>
        <div class="accordion">
            <div class="icon"></div>
            <h5>Akreditas Institut Teknologi Del itu apasih?</h5>
        </div>
        <div class="panel">
            <p>
                Di penghujung tahun 2018, IT Del sebagai perguruan tinggi berhasil mendapatkan akreditasi kelas B
                berdasarkan SK BAN PT No. 417/BAN-PT/Akred/PT/XII/2018 pada tanggal 19 Desember 2018.
                Nilai yang dicapai , 332 dikategorikan sebagai skor baik atau kategori B.
            </p>
        </div>

        <div class="accordion">
            <div class="icon"></div>
            <h5>Jelasin Sejarah Singkat nya dong!</h5>
        </div>
        <div class="panel">
            <p>
                Jenderal TNI (Purn.) Luhut B. Pandjaitan mendirikan Yayasan Simargala pada tanggal 30 Agustus 2001 di
                Jakarta.
                Yayasan ini kemudian diubah namanya menjadi Yayasan Del pada tahun yang sama.
                Tujuan pendirian yayasan ini adalah untuk membawa perubahan dan pembaharuan bagi
                individu dan masyarakat melalui program-program pendidikan, sosial, kemanusiaan, seni dan budaya, serta
                kelestarian lingkungan.
            </p>
        </div>

        <div class="accordion">
            <div class="icon"></div>
            <h5>Visi Misi Institut Teknologi Del Apa Sih min?</h5>
        </div>
        <div class="panel">
            <p>
                Visi: <br>
                “Menjadi lembaga selangkah lebih depan dalam pengembangan talenta manusia yang memberikan kontribusi berarti
                pada
                inovasi teknologi dan keberlanjutan sosial”. (Becoming one-step-ahead Institution in the development of
                human talent
                that gives meaningful contribution to technological innovation and social sustainability)<br>

                Misi: <br>
                “Mengotimalkan manusia paripurna dan memberdayakan masyarakat dalam mencerdaskan kehidupan bangsa”.
                (To optimize human completely and to empower community in nurturing the nation’s intellectual life)

            </p>
        </div>

        <div class="accordion">
            <div class="icon"></div>
            <h5>Apasih keunggulan Institut Teknologi Del?</h5>
        </div>
        <div class="panel">
            <p>
                1. Kurikulum Pendidikan IT Del <br>
                2. Pengalaman Pembelajaran Terpadu <br>
                3. Dosen Bereputasi <br>
                4. Kehidupan Berasrama <br>
                5. Fasilitas Kampus <br>
            </p>
        </div>

        <div class="accordion">
            <div class="icon"></div>
            <h5>Bagaimana Dengan Reputasi dan Jejaring Lulusan?</h5>
        </div>
        <div class="panel">
            <p>
            Reputasi Lulusan IT Del sudah terkenal secara umum, antara lain bekerja sebagai Ahli Teknologi Informasi
             dan Komputer di perusahaan nasional dan multi-nasional, dosen di Universitas Amsterdam,  berhasil dalam
             melanjutkan Studi Magister dan Doktor pada universitas dalam dan luar negeri, dan ikatan jejaring
            lulusan yang kompak baik lingkup nasional maupun Internasional.
            </p>
        </div>
    </div>
    <!-- Contact End -->
@endsection
