<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\users;
use App\Models\photos;

class PhotoController extends Controller
{
    public function uploadPhoto($id){
        $user = users::find($id);
        return view('pages.photoPages.uploadPhoto', compact('user'));
    }

    public function storePhotoUpload(Request $request, $id){
        $isValid = $this->validate($request, [
            'uploadedPhoto' => 'mimes:jpeg,jpg,JPG,png,bmp,tiff |max:4096',
        ],
            $messages = [
                'required' => 'The :attribute field is required.',
                'mimes' => 'Only jpeg, jpg, JPG, png, bmp, and tiff types are allowed to upload.'
            ]
        );
        $user = users::find($id);
        if($isValid){
            $photo = new photos;
            $photo->username = $user->username;
            $photo->title = $request->input('title');
            $photo->description = $request->input('description');
            $photo->location = $request->input('location');
            //this part is for the actual image that was uploaded
            if($request->hasfile('uploadedPhoto')){
                $file = $request->file('uploadedPhoto');
                $extention = $file->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $file->move('upload/mainSitePhotos/', $filename);
                $photo->uploadedPhoto = $filename;
            }
            $photo->save();

            return back()->with('status', 'Photo Submitted Successfully');
        }else{
            return view('pages.photoPages.uploadPhoto', compact('user'))->with('status', 'Error: Only jpeg, jpg, png, bmp, and tiff types are allowed to upload.');
        }
    }

    public function photoHome(){
        $photo = photos::all();
        if(Auth::check()){
            $user = Auth::user()->id;
            return view('pages.photoWall', compact('user'), compact('photo'));
        }else{
            return view('pages.photoWall', compact('photo'));
        }
    }

    public function viewSelectedPhoto($id){
        $photo = photos::find($id);
        return view('pages.photoPages.viewClosePhoto', compact('photo'));
    }
}
