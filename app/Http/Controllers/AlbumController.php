<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
class AlbumController extends Controller
{
    public function index(){
        $albums = Album::with('Images')->get();
        return view('album.index')->with('albums', $albums);
    }

    public function create(){
        return view('album.create');
    }

    public function store(Request $request){

        $this->validate($request,[
            'name' => 'required',
            'cover_image' => 'required'
        ]);

        //Get file name with extension
        $fileNameWithExt =  $request->file('cover_image')->getClientOriginalName();

        //Get file name without extension
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

        //Get file extension
        $extension = $request->file('cover_image')->getClientOriginalExtension();

        //Create new file name
        $fileNameToStore = $fileName.'_'.time().'.'.$extension;

        //Store to Database as path
        $imagePath = $request->file('cover_image')->storeAs('public/storage/album_covers', $fileNameToStore);

        $album = new Album;
        $album->name = $request->input('name');
        $album->description = $request->input('description');
        $album->cover_image = $fileNameToStore;
        $album->save();
        return redirect('/')->with('success', 'Album Created');
    }
    public function show($id){

        $album = Album::with('Images')->find($id);
        return view('album.show')->with('album', $album);
    }
}
