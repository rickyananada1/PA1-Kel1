<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArtikelRequest;
use App\Models\Artikel;
use App\Models\Kategori;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikel = Artikel::latest()->paginate(null);
        return view('admin.artikel.index', compact('artikel'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.artikel.create', compact('kategori'));
    }


    public function store(ArtikelRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->judul);
        $data['user_id'] = Auth::id();
        $data['views'] = 0;

        if ($request->hasFile('gambar_article')) {
            $gambar = $request->file('gambar_article');
            $filename = time() . '_' . $gambar->getClientOriginalName();
            $path = public_path('uploads/artikel/' . $filename);

            // Resize gambar
            $resizedImage = Image::make($gambar)->fit(800, 600);
            $resizedImage->save($path);

            $data['gambar_article'] = $filename;
        }

        Artikel::create($data);
        return redirect()->route('artikel.index')->with('success', 'Data berhasil tersimpan');
    }

    public function edit($id)
    {
        $artikel = Artikel::find($id);
        $kategori = Kategori::all();
        return view('admin.artikel.edit', compact('artikel', 'kategori'));
    }

    public function update(ArtikelRequest $request, $id)
    {
        // dd($request->all());
        $artikel = Artikel::find($id);
        if (empty($request->file('gambar_article'))) {
            $artikel->update([
                'judul' => $request->judul,
                'body' => $request->body,
                'kategori_id' => $request->kategori_id,
                'is_active' => $request->is_active,
                'slug' => Str::slug($request->judul),
                'user_id' => Auth::id(),
            ]);
        } else {
            $gambar_article = $request->file('gambar_article');
            $filename = time() . '_' . $gambar_article->getClientOriginalName();
            $gambar_article->move(public_path('uploads/artikel'), $filename);
            Storage::delete($artikel->gambar_article);
            $artikel->update([
                'judul' => $request->judul,
                'body' => $request->body,
                'kategori_id' => $request->kategori_id,
                'is_active' => $request->is_active,
                'slug' => Str::slug($request->judul),
                'user_id' => Auth::id(),
                'gambar_article' => $filename,
            ]);
        }
        
        return redirect()->route('artikel.index')->with('success', 'Data berhasil diupdate');
    }


    public function destroy($id)
    {
        $artikel = Artikel::find($id);
        if ($artikel) {
            Storage::delete($artikel->gambar_article);
            $artikel->delete();
            return redirect()->route('artikel.index')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->route('artikel.index')->with('error', 'Data tidak ditemukan');
        }
    }
}
