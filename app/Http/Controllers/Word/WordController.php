<?php

namespace App\Http\Controllers\Word;
use App\Models\Word;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Stichoza\GoogleTranslate\GoogleTranslate;

class WordController extends Controller
{
    public function index(){
        try {
            $data = Word::all();
            $data_user = User::all();
            $user = Auth::user();
            if ($data_user == $user) {
                return view('welcome',compact('data','user'));
            }
            return view('welcome',compact('data','data_user'));

        } catch (\Exception $e) {
            return redirect()->route('login')
            ->withErrors([
            'email' => 'Please login to access the dashboard.',
            ])->onlyInput('email');
        }
    }
    public function word(){
        if(Auth::user()) {
            $data_word = Word::paginate(12);
            $search = null;

            $translatedTexts = Word::pluck('description')->all();
            $translatedTexts = [ 
                ['description'=> $translatedTexts],
            ];
            // dd($translatedTexts);
            return view('layout.word.word', compact('data_word','search'))->with('translatedTexts', $translatedTexts);
            // return view('layout.user.contact')->with('translatedTexts', $translatedTexts);
        } else {
            return redirect()->route('login')
            ->withErrors([
            'email' => 'Please login to access the dashboard.',
            ])->onlyInput('email');
        }
    }
    public function search(Request $request){
        if(Auth::user()) {
            $search = $request->input('search');
        
            $filter_word = Word::where('word', 'like', '%' . $search . '%')
                ->orwhere('word_km', 'like', '%' . $search . '%')
                ->orwhere('word_en', 'like', '%' . $search . '%')
                ->get();
            if($search == ''){
                $search == null;
                return redirect()->route('word')->with(compact('filter_word','search'));
            }
            return view('layout.word.word', compact('filter_word','search'));
        } else {
            return redirect()->route('login')
            ->withErrors([
            'email' => 'Please login to access the dashboard.',
            ])->onlyInput('email');
        }

    }
}
