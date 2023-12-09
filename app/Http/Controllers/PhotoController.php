<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\users;

class PhotoController extends Controller
{
    public function uploadPhoto($id){
        $user = users::find($id);
        return view('pages.photoPages.uploadPhoto', compact('user'));
    }
}
