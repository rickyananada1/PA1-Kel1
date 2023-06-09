@extends('layouts.frontend.main')
@section('title')
    Pengumuman Satuan Pengawas Internal - IT DEL
@endsection
@section('content')
    <table class="table table-success table-striped">
        <thead >
            <tr>
                <th scope="col">No</th>
                <th scope="col">Pengumuman</th>
                <th scope="col">Author</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pengumuman as $row)
                <tr>
                    <td>{{ $pengumuman->firstItem() + $loop->index }}</td>
                    <td><a href="{{ route('announcement.detail', [$row->id, $row->slug]) }}">
                            {{ $row->judul_pengumuman }}</a>
                    </td>
                    @foreach ($user as $u)
                        <td>{{ $u->name }}</td>
                    @endforeach
                @empty
                <tr>
                    <td colspan="3" class="text-center">{{ 'Data Masih Kosong' }}</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
