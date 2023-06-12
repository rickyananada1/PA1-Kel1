<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Event;
use App\Models\Kategori;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{

    public function index()
    {
        $event = Event::latest()->paginate(null);
        return view('admin.event.index', compact('event'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.event.create', compact('kategori'));
    }

    public function store(EventRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->judul);
        $data['user_id'] = Auth::id();
        $data['views'] = 0;

        if ($request->hasFile('gambar_event')) {
            $gambar = $request->file('gambar_event');
            $filename = time() . '_' . $gambar->getClientOriginalName();
            $path = public_path('uploads/event/' . $filename);

            // Resize gambar
            $resizedImage = Image::make($gambar)->fit(800, 600);
            $resizedImage->save($path);

            $data['gambar_event'] = $filename;
        }

        Event::create($data);
        return redirect()->route('event.index')->with('success', 'Data berhasil tersimpan');
    }


    public function edit($id)
    {
        $event = Event::find($id);
        $kategori = Kategori::all();
        return view('admin.event.edit', compact('event', 'kategori'));
    }

    public function update(EventRequest $request, $id)
    {
        // dd($request->all());
        $event = Event::find($id);
        if (empty($request->file('gambar_event'))) {
            $event->update([
                'judul' => $request->judul,
                'body' => $request->body,
                'kategori_id' => $request->kategori_id,
                'is_active' => $request->is_active,
                'slug' => Str::slug($request->judul),
                'user_id' => Auth::id(),
            ]);
        } else {
            $gambar_event = $request->file('gambar_event');
            $filename = $gambar_event->getClientOriginalName();
            $gambar_event->move(public_path('uploads/event/'), $filename);
            Storage::delete($event->gambar_event);
            $event->update([
                'judul' => $request->judul,
                'body' => $request->body,
                'kategori_id' => $request->kategori_id,
                'is_active' => $request->is_active,
                'slug' => Str::slug($request->judul),
                'user_id' => Auth::id(),
                'gambar_event' => $filename,
            ]);
        }
        return redirect()->route('event.index')->with('success', 'Data berhasil diupdate');
    }


    public function destroy($id)
    {
        $event = Event::find($id);
        if ($event) {
            Storage::delete($event->gambar_event);
            $event->delete();
            return redirect()->route('event.index')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->route('event.index')->with('error', 'Data tidak ditemukan');
        }
    }
}
