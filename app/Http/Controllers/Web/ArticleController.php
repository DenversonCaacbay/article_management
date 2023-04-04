<?php

namespace App\Http\Controllers\Web;

use App\Models\Article;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $articles = Article::oldest()->paginate(2);
        return view('web.article.home', compact('articles'))
            ->with('i', (request()->input('page', 1) - 1) * 2);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('web.article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

        return redirect()->route('web.article.home')
            ->with('success', 'Article Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $articles = Article::find($id);
        return view('web.article.view')->with('articles', $articles);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articles = Article::find($id);
        return view('web.article.update', compact('articles'));
    }

    public function update(Request $request, $id)
    {
        $articles = Article::find($id);
        $input = $request->all();
        $articles->update($input);
        return redirect('web.article.home')->with('flash_message', 'Article Updated!');
    }


    public function destroy($id)
    {
        Article::destroy($id);
        return redirect('web.article.home')->with('flash_message', 'Article deleted!');
    }
}
