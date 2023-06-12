@extends('layouts.frontend.main')
@section('title')
    All Berita Satuan Pengawas Internal - IT DEL
@endsection
@section('content')
    <div class="col-md-12">
        <h4 class="widgettitle" style="margin-bottom: 1.5em">DEL NEWS</h4>
        <div class="row">
            @php $count = 0; @endphp
            @foreach ($berita as $row)
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                        @php
                            $resizedImage = Image::make(public_path('uploads/berita/' . $row->gambar_berita))->fit(300, 200);
                        @endphp
                        <img class="card-img-top" src="{{ $resizedImage->encode('data-url') }}" alt="Berita Image">
                        <div class="card-body">
                            <?php
                            $bodyWords = str_word_count(strip_tags($row->judulBerita), 1);
                            $shortBody = implode(' ', array_slice($bodyWords, 0, 4));
                            ?>
                            <h5 class="rpwe-title"><a href="{{ route('detailBerita', [$row->id, $row->slug]) }}"
                                    class="h6 fw-medium d-flex align-items-center mb-0 text-primary">{{ $shortBody }}...</a>
                            </h5>
                            <small
                                class="text-muted">{{ Carbon\Carbon::parse($row->created_at)->format(' F d, Y') }}</small>
                        </div>
                    </div>
                </div>
                @php $count++; @endphp
                @if ($count % 4 === 0)
                    <!-- After every 4th post, create a new row -->
        </div>
        <div class="row">
            @endif
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

    <style type="text/css" media="all">
        .card {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card-img-top {
            object-fit: cover;
            height: 200px;
        }
    </style>
@endsection
