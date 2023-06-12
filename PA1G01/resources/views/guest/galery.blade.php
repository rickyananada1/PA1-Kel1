@extends('layouts.frontend.main')
@section('title')
    Galeri Satuan Pengawas Internal - IT DEL
@endsection
@section('content')
    <div class="rt-container">
        <div class="col-rt-12">
            <!-- Search Form Start -->
            <div class="col-lg-3">
                <div class="mb-3 wow slideInUp" data-wow-delay="0.1s">
                    <div class="input-group">
                        <input type="text" id="search" class="form-control p-1" placeholder="Search">
                    </div>
                </div>
            </div>
            <div class="Scriptcontent">
                <div class="gallery row">
                    @foreach ($galery as $row)
                        <div class="col-md-3">
                            @if ($row->images->isNotEmpty())
                                <div class="gallery-item">
                                    @php
                                        $firstImage = $row->images->first();
                                        $resizedImage = Image::make(public_path('uploads/galeri/' . $firstImage->image))->fit(1280, 960);
                                    @endphp
                                    <a href="{{ asset('uploads/galeri/' . $firstImage->image) }}" target="_blank">
                                        <img class="img-fluid" src="{{ $resizedImage->encode('data-url') }}"
                                            onclick="openLightbox('{{ asset('uploads/galeri/' . $firstImage->image) }}')">
                                    </a>
                                </div>
                            @endif
                            <?php
                            $bodyWords = str_word_count(strip_tags($row->nama), 1);
                            $shortBody = implode(' ', array_slice($bodyWords, 0, 4));
                            ?>
                            <a href="{{ route('multi.image', [$row->id, $row->slug]) }}" class="image-name-link"
                                style="font-weight: 560; font-family: 'Nunito', sans-serif; font-size:0.9em; margin-left: 1.3em;">
                                {{ $shortBody }}...
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12">
            {{ $galery->links() }}
        </div>
    </div>
    @push('styles')
        <style>
            .gallery-item {
                padding: 10px;
                box-sizing: border-box;
            }

            .gallery-item img {
                width: 100%;
                height: auto;
                border: 1px solid #ddd;
                border-radius: 4px;
            }
        </style>
    @endpush

    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
            crossorigin="anonymous"></script>
        <script>
            $.document.ready(function() {
                $('#search').on('keyup', function() {
                    var value = $(this).val().tolowerCase();
                    $('.col-md-3').filter(function() {
                        $(this).toggle($(this).text().tolowerCase().indexOf(value) > -1);
                    });
                })
            })
        </script>
    @endpush
@endsection
