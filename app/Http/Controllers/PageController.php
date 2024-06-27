<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Mail\CarrerRequestMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('home', 'test');
    }

    public function home()
    {
        $articlePolitica = Article::where('category_id', 1)->where('is_accepted', true)->orderBy('created_at', 'desc')->take(4)->get();
        $articleEconomia = Article::where('category_id', 2)->where('is_accepted', true)->orderBy('created_at', 'desc')->take(4)->get();
        $articleFood = Article::where('category_id', 3)->where('is_accepted', true)->orderBy('created_at', 'desc')->take(4)->get();
        $articleSport = Article::where('category_id', 4)->where('is_accepted', true)->orderBy('created_at', 'desc')->take(4)->get();
        $articleIntrattenimento = Article::where('category_id', 5)->where('is_accepted', true)->orderBy('created_at', 'desc')->take(4)->get();
        $articleTech = Article::where('category_id', 6)->where('is_accepted', true)->orderBy('created_at', 'desc')->take(4)->get();

        return view('homepage', compact('articlePolitica', 'articleEconomia', 'articleFood', 'articleSport', 'articleIntrattenimento', 'articleTech'));
    }

    public function careers()
    {
        if (Auth::user()->is_admin && Auth::user()->is_revisor && Auth::user()->is_writer) {
            return redirect()->route('home')->with('message', 'Sei già stato assunto per tutte le posizioni attive!');
        }

        return view('careers');
    }

    public function careerSubmit(Request $request)
    {
        $request->validate([
            'role' => 'required',
            'email' => 'required',
            'message' => 'required'
        ]);

        $user = Auth::user();
        $role = $request->role;
        $email = $request->email;
        $message = $request->message;

        Mail::to('admin@thepost.it')->send(new CarrerRequestMail(compact('role', 'email', 'message')));

        switch ($role) {
            case 'admin':
                $user->is_admin = NULL;
                break;
            case 'revisor':
                $user->is_revisor = NULL;
                break;
            case 'writer':
                $user->is_writer = NULL;
                break;
        }

        $user->update();

        return redirect(route('home'))->with('message', 'Grazie per averci contattato!');
    }



    /* ROTTA TEST */
    public function test()
    {
        return view('test');
    }

    /* test create livewire */

    public function testLivewire()
    {
        return view('testLivewire');
    }
}
