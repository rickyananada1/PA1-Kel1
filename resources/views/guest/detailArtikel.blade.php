@extends('layouts.frontend.main')
@section('title')
    DETAIL ARTIKEL
@endsection

@section('content')
    <!-- Blog Start -->
    <div class="container-fluid wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-3">
            <div class="row g-5">
                <!-- Blog list Start -->
                <div class="col-lg-8">
                    <div class="row g-2">
                        <h4>{{ $artikel->judul }}</h4>
                        <div class="d-flex mb-1">
                            <small class="me-3">
                                @foreach ($user as $u)
                                    <i class="far fa-user text-primary me-2"></i>{{ $u->name }}
                                @endforeach
                            </small>
                            <small>
                                <i class="far fa-calendar-alt text-primary me-2"></i>
                                @if ($artikel->created_at == null)
                                    <span class="text-danger">{{ __('Tidak ada tanggal') }}</span>
                                @else
                                    {{ Carbon\Carbon::parse($artikel->created_at)->format('F d, Y') }}
                                @endif
                            </small>
                        </div>
                        <div class="blog-img position-relative overflow-hidden">
                            @php
                                $resizedImage = Image::make(public_path('uploads/artikel/' . $artikel->gambar_article))->resize(660, null, function ($constraint) {
                                    $constraint->aspectRatio();
                                });
                            @endphp
                            <img class="img-fluid" src="{{ $resizedImage->encode('data-url') }}">
                        </div>
                        <div class="marquee container">
                            <p>{!! $artikel->body !!}</p>
                        </div>
                    </div>
                </div>
                <!-- Blog list End -->

                <!-- Sidebar Start -->
                <div class="col-md-4">
                    <div id="sidebar">
                        <div id="rpwe_widget-2" class="et_pb_widget rpwe_widget recent-posts-extended">
                            <h2 style="font-size: 20px;" class="widgettitle mb-4">Kegiatan Terbaru</h2>
                            <div class="rpwe-block">
                                @foreach ($event as $row)
                                    <ul class="rpwe-ul" style="margin-bottom: 1.2em">
                                        <li class="rpwe-li rpwe-clearfix">
                                            @php
                                                $resizedImage = Image::make(public_path('uploads/event/' . $row->gambar_event))->fit(120, 80);
                                            @endphp
                                            <img class="img-fluid" style="object-fit: cover;"
                                                src="{{ $resizedImage->encode('data-url') }}">
                                            <div class="rpwe-content">
                                                <?php
                                                $bodyWords = str_word_count(strip_tags($row->judul), 1);
                                                $shortBody = implode(' ', array_slice($bodyWords, 0, 6));
                                                ?>
                                                <p class="rpwe-title"><a
                                                        href="{{ route('detailEvent', [$row->id, $row->slug]) }}"
                                                        style="font-size: 1em;"
                                                        class="h6 fw-medium d-flex align-items-center px-3 mb-0 text-primary">{{ $shortBody }}...</a>
                                                </p>
                                                <small class="rpwe-time published text-center ps-3"
                                                    datetime="2023-04-12T16:28:02+07:00"
                                                    style="font-size: 12px;">{{ Carbon\Carbon::parse($row->created_at)->format(' F d, Y ') }}</small>
                                            </div>
                                        </li>
                                        <hr style="border-top: 1px solid #ccc;">
                                        <!-- Add more recent posts here -->
                                    </ul>
                                @endforeach
                            </div>
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
                <!-- Sidebar End -->
            </div>
        </div>
    </div>
    <style type="text/css" media="all">
        .rpwe-ul {
            list-style: none;
            padding: 0;
        }

        .rpwe-li {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .rpwe-li .rpwe-img {
            margin-right: 10px;
        }

        .rpwe-li .rpwe-title a {
            color: #000;
            font-weight: normal;
            text-decoration: none;
        }

        .widget_categories ul {
            list-style: none;
            padding: 0;
        }

        .widget_categories li {
            margin-bottom: 5px;
        }

        .feedzy-rss .rss_item .title a {
            font-weight: bold;
            color: #000;
            text-decoration: none;
        }

        .feedzy-rss .rss_item .rss_content p {
            margin-bottom: 0;
        }

        .feedzy-rss .rss_item hr {
            border: none;
            border-top: 1px solid #bbb8b8;
            margin: 10px 0;
        }

        .feedzy-rss .rss_item .title a {
            color: #00aaff;
        }

        .sidebar {
            float: right;
            width: 100%;
        }

        .sidebar-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-list li {
            margin-bottom: 20px;
        }
    </style>
@endsection
