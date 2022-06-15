<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $data = Http::get('https://jsonplaceholder.typicode.com/posts')->object();
//        foreach ($data as $d){
//            Blog::create([
//                'title'=>$d->title,'description'=>$d->body
//            ]);
//        }
//        $blog = new Blog();
//        $blogs = $blog->all();
        $blogs = Blog::paginate(10);
        return view('blog.index',compact("blogs"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("blog.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "title"=>"required|unique:blogs|max:255",
            "description"=>"required|min:10"
        ]);

        //first method
//        $blog = new Blog();
//        $blog->title = $request->title;
//        $blog->description = $request->description;
//        $blog->save();

        //second method->mass assignment
//        Blog::create([
//            "title"=>$request->title,
//            "description"=>$request->description
//        ]);
        //third method->security issue
        Blog::create($request->all());
//        return redirect()->back();
        return redirect()->route("blog.index")->with("status","New Post is created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blog.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "title"=>"required|unique:blogs,title,$id|max:255",
            "description"=>"required|min:10"
        ]);
        $blog = Blog::findOrFail($id);
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->update();
        return redirect()->route('blog.index')->with("status","Post is updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return redirect()->route("blog.index")->with("status","New Post is deleted");
    }
}
