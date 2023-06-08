@extends('layouts.frontend.main')
@section('title')
    ALL EVENTS
@endsection
@section('content')
    <div class="row g-5">
        <div class="dropdown mb-1">
            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                aria-expanded="false">
                <span class="mr-2"></span>
                <p class="text-white m-0 d-inline">Nama Kategori</p>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                @foreach ($kategori as $row)
                    <li><a class="dropdown-item"
                            href="{{ route('detail.kategori', [$row->id, $row->slug]) }}">{{ $row->nama_kategori }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <!-- Blog Start -->
        <div class="col-md-11">
            <div class="row g-5">
                <!-- Article Section Start -->
                <div class="col-md-12">
                    <div class="position-relative pb-3 mb-4">
                        <h4 class="mb-0">EVENTS</h4>
                    </div>
                    <div class="row">
                        @foreach ($event as $row)
                            <div class="col-md-4 mb-5">
                                <div class="blog-item bg-light rounded overflow-hidden">
                                    <div class="blog-img position-relative overflow-hidden">
                                        @php
                                            $resizedImage = Image::make(public_path('uploads/event/' . $row->gambar_event))->fit(600, 400);
                                        @endphp
                                        <img class="img-fluid" src="{{ $resizedImage->encode('data-url') }}">
                                    </div>
                                    <div class="p-4">
                                        <div class="d-flex mb-3">
                                            <small class="me-3">
                                                @foreach ($user as $p)
                                                    <i class="far fa-user text-primary me-2"></i>{{ $p->name }}
                                                @endforeach
                                            </small>
                                            <small>
                                                <i class="far fa-calendar-alt text-primary me-2"></i>
                                                @if ($row->created_at == null)
                                                    <span class="text-danger">{{ __('Tidak ada tanggal') }}</span>
                                                @else
                                                    {{ Carbon\Carbon::parse($row->created_at)->format(' F d, Y')  }}
                                                @endif
                                            </small>
                                        </div>
                                        <?php
                                        $bodyWords = str_word_count(strip_tags($row->judul), 1);
                                        $shortBody = implode(' ', array_slice($bodyWords, 0, 4));
                                        ?>
                                        <h6 class="mb-2 border-l-4">{{ $shortBody }}...</h6>
                                        <?php
                                        $bodyWords = str_word_count(strip_tags($row->body), 1);
                                        $shortBody = implode(' ', array_slice($bodyWords, 0, 10));
                                        ?>
                                        <p>{!! $shortBody !!}...</p>
                                        <a style="font-size: 0.8rem"
                                            href="{{ route('detailArtikel', [$row->id, $row->slug]) }}">READ MORE <i
                                                class="bi bi-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="categoryDropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            View All
                        </button>
                        <div class="dropdown-menu" aria-labelledby="categoryDropdown">
                            <a class="dropdown-item" href="{{ route('allArtikel') }}">Artikel</a>
                            <a class="dropdown-item" href="{{ route('allEvent') }}">Kegiatan</a>
                            <a class="dropdown-item" href="{{ route('allNews') }}">Berita</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
