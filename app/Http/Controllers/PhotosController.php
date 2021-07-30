<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Image;

class PhotosController extends Controller
{
    public function create($album_id){
      return view('photos.create')->with('album_id',$album_id);
    }
    public function store(Request $request){
        $this->validate($request,[
            'title' => 'required',
            'photo' => 'required'
        ]);

        //Get file name with extension
        $fileNameWithExt =  $request->file('photo')->getClientOriginalName();

        //Get file name without extension
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

        //Get file extension
        $extension = $request->file('photo')->getClientOriginalExtension();

        //Create new file name
        $fileNameToStore = $fileName.'_'.time().'.'.$extension;

        //Store to Database as path
        $imagePath = $request->file('photo')->storeAs('public/photos/'.$request->input('album_id'), $fileNameToStore);

        $photo = new Image;
        $photo->album_id = $request->input('album_id');
        $photo->title = $request->input('title');
        $photo->description = $request->input('description');
        $photo->photo = $fileNameToStore;
        $photo->size = $request->file('photo')->getClientSize();
        $photo->save();
        return redirect('/albums/'.$request->input('album_id'))->with('success', 'Photo Uploaded');
    }

    public function show($id){
        $photo = Image::find($id);
        return view('photos.show')->with('photo', $photo);
    }

    public function destroy($id){
        $photo = Image::find($id);
        if(storage::delete('public/photos/'.$photo->album_id.'/'.$photo->photo)){
            $photo->delete();
        }

        return redirect('/albums/'.$photo->album_id)->with('success', 'Photo Deleted');
    }
}
