<?php

namespace App\Http\Controllers;

use App\Http\Requests\MetaRequest;
use App\Models\Meta;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MetaController extends Controller
{

    public function index()
    {
        $meta = Meta::latest()->paginate(null);
        return view('admin.meta.index', compact('meta'));
    }


    public function create()
    {
        $meta = Meta::all();
        return view('admin.meta.create', compact('meta'));
    }


    public function store(MetaRequest $request)
    {
        $validatedData = $request->validated();
        try {
            $validatedData['meta_key'] = Str::slug($request->meta_key);
            Meta::create($validatedData);
            return redirect()->route('meta.index')->with('success', 'Meta Profil berhasil dibuat');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['meta_key' => 'Meta Key sudah digunakan.']);
        }
    }

    public function edit($id)
    {
        $meta = Meta::findOrFail($id);
        return view('admin.meta.edit', compact('meta'));
    }

    public function update(MetaRequest $request, $id)
    {
        // $meta = Meta::findOrFail($id);
        $meta = Meta::where('id', $id)->first();
        $meta->meta_title = $request->meta_title;
        $meta->meta_description = $request->meta_description;
        $meta->save();
        //     'meta_description' => $request->meta_description
        // $meta->update([
        //     // 'meta_key' => Str::slug($request->meta_key),
        //     'meta_title' => $request->meta_title,
        //     'meta_description' => $request->meta_description
        // ]);

        return redirect()->route('meta.index')->with('success', 'Meta profil berhasil diupdate');
    }


    public function destroy($id)
    {
        Meta::findOrFail($id)->delete();
        return redirect()->route('meta.index')->with('success', 'Meta profil berhasil dihapus');
    }
}
