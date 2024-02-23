<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Stichoza\GoogleTranslate\GoogleTranslate;

class UserController extends Controller
{
    public function index(){
        $data = Auth::User();
        // dd($data);
        return view('layout.user.user', compact('data'));
    }
    public function profile(){
        try{
            $data = Auth::user();
            if($data->bio != null){
                return view('layout.user.profile',compact('data'));
            }
            return view('layout.user.profile',compact('data'));

        }catch(\Exception $e){
            return redirect()->route('login')
                ->withErrors([
                'email' => 'Please login to access the dashboard.',
            ])->onlyInput('email');
        }
        
    }
    public function edit_profile(){
        try{
            $data = Auth::user();
            return view('layout.user.edit',compact('data'));
        }catch(\Exception $e){
            return redirect()->route('login')
                ->withErrors([
                'email' => 'Please login to access the dashboard.',
            ])->onlyInput('email');
        }
    }
    public function uploads(Request $request, $id){ 
        
        $imageName = Auth::User()->image;
        $data_update = User::find($id);
        $data_update->name = $request->name;
        $data_update->bio = $request->bio;
        $data_update->birth = $request->birth;
       
        if(!$request->image == null){
            
            $request->validate([
                'image' => 'required|mimes:jpeg,png,jpg,gif|max:3048',
            ]); 
            $data_update->image = $request->image;
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();  
            $filename = time().'.'.$extenstion;
            
            $file->move('uploads', $filename);
            $data_update->image = $filename;
            $imagePath = public_path('uploads/' . $imageName);

            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }  
            $data_update->update();
            return redirect()->route('profile');
        }
        else{
            $data_update->name = $request->name;
            $data_update->bio = $request->bio;
            $data_update->birth = $request->birth;
            $data_update->update();
            return redirect()->route('profile');
        }
        return Redirect::back();
        
    }
    // ----
    public function contact(){
        if(Auth::user()){
            $translatedTexts = Word::pluck('description')->all();
            $translatedTexts = [ 
                ['description'=> $translatedTexts],
            ];
            return view('layout.user.contact')->with('translatedTexts', $translatedTexts);
        }else{
            return redirect()->route('login')
                ->withErrors([
                'email' => 'Please login to access the dashboard.',
            ])->onlyInput('email');
        }
    } 
}


