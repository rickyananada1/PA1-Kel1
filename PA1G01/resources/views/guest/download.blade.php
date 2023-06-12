@extends('layouts.frontend.main')
@section('title')
    Laporan Satuan Pengawas Internal - IT DEL
@endsection
@section('content')
    <table class="table table-success table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama File</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Unduh</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($file as $row)
                <tr>
                    <td>{{ $file->firstItem() + $loop->index }}</td>
                    <td>{{ $row->namaFile }}</td>
                    <td><?php
                        $bodyWords = str_word_count(strip_tags($row->description), 1);
                        $shortBody = implode(' ', array_slice($bodyWords, 0, 4));
                        ?>
                        <p>{!! $shortBody !!}...</p></td>
                    <td>
                        @if ($row->lampiran)
                            @if (Str::endsWith($row->lampiran, ['.pdf']))
                                <a href="{{ asset('uploads/file/' . $row->lampiran) }}" class="btn btn-success btn-sm"><i
                                        class="fa fa-download"></i></a>
                            @else
                                <embed src="{{ asset('uploads/file/' . $row->lampiran) }}" width="500" height="375"
                                    type="{{ mime_content_type(storage_path('app/uploads/file/' . $row->lampiran)) }}">
                            @endif
                        @else
                            -
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">{{ 'Data Masih Kosong' }}</td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection
