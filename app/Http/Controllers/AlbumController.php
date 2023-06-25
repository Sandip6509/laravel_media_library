<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::all();
        return view('albums.index',compact('albums'));
    }

    public function create()
    {
        return view('albums.create');    
    }

    public function store(Request $request) 
    {
        Album::create([
            'title' => $request->title
        ]);

        return redirect()->route('albums.index');
    }

    public function show(Album $album)
    {
        $photos = $album->getMedia();
        return view('albums.show',compact('album','photos'));
    }

    public function edit(Album $album)
    {
        return view('albums.edit',compact('album'));
    }

    public function update(Request $request, Album $album)
    {
        $album->update([
            'title' => $request->title 
        ]);

        return redirect()->route('albums.index');
    }

    public function destroy(Album $album)
    {
        $album->delete();

        return redirect()->route('albums.index');
    }

    public function upload(Request $request,Album $album)
    {
        if($request->has('image')){
            $album->addMedia($request->image)->toMediaCollection();
        }
        return redirect()->back();
    }

    public function showImage(Album $album,$id)
    {
        $media = $album->getMedia();
        $image = $media->where('id',$id)->first();
        return view('albums.image-show',compact('album','image'));
    }
    
    public function deleteImage(Album $album,$id)
    {
        $media = $album->getMedia();
        $image = $media->where('id',$id)->first();
        $image->delete();

        return redirect()->back();
    }
}
