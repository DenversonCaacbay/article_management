<?php

namespace App\Http\Controllers\Web;


use App\Models\Article;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $articles = Article::oldest()->paginate(2);
        return view('home', compact('articles'))
            ->with('i', (request()->input('page', 1) - 1) * 2);

    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {

        $photo = $request->file('photo');

        if($request->hasFile('photo')){
            $filenameWithExt = $photo->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $photo->getClientOriginalExtension();
            $image = $filename.'_'.time().'.'.$extension;
            $path = $photo->move('public/images', $image);

        }else{
            $image = 'default.png';
        }

        //
        $articles = new Article();
        $articles->fill($request->all());
        $articles->photo = $image;
        $articles->save();

        return redirect()->route('home')
            ->with('success', 'Article Created!');
    }



    public function show($id)
    {
        $articles = Article::find($id);
        return view('view')->with('articles', $articles);
    }


    public function edit($id)
    {
        $articles = Article::find($id);
        return view('update', compact('articles'));
    }

    public function update(Request $request, $id)
    {
        $articles = Article::find($id);
        $input = $request->all();
        $articles->update($input);
        return redirect('home')->with('flash_message', 'Article Updated!');
    }


    public function destroy($id)
    {
        Article::destroy($id);
        return redirect('home')->with('flash_message', 'Article deleted!');
    }
}
