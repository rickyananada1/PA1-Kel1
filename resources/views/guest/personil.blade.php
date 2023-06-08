@extends('layouts.frontend.main')

@section('title')
    PERSONIL
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 me-5" style="margin-left: -4em">
                <h2 style="font-size: 20px;">{{ $menu->meta_title }}</h2>
                <p>{!! $menu->meta_description !!}</p>
            </div>
            <div class="col-md-4 mx-2">
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
                                                style="font-size: 12px;">{{ Carbon\Carbon::parse($row->created_at)->format(' F d, Y') }}</small>
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
        </div>
    </div>
    <style>
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
    </style>
@endsection
