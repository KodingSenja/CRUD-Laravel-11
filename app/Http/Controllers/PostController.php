<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Http\Middleware\IsAdmin;

class PostController extends Controller implements HasMiddleware
{
    /**
     * Display a listing of the resource.
     */

     public static function middleware(): array
     {
        return [
            //cara mengatur middleware 
            //except => index dan show tidak menggunakan middleware
            new Middleware(IsAdmin::class, except: ['index','show']),
           
        ];
     }


    public function index()
    {
        //mengambil semua data dari tabel post
       $post = Post::all();
       return view('post.tampil',['post' => $post]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category ::all ();
        return view('post.tambah',['category'=> $category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png|max:10240',
            'title' => 'required',
            'content'=> 'required',
            'category_id' => 'required'
        ]);

        $newImageName = time (). '.'.$request->image->extension();

        $request->image->move(public_path('image'), $newImageName);

        $post = new Post;

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->category_id = $request->input('category_id');
        $post->image = $newImageName;


        $post->save();

        return redirect('/post');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        return view('post.detail',['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::all();
        $post = Post::find($id);

        return view ('post.edit',['post'=>$post, 'category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'content'=> 'required',
            'category_id' => 'required'
        ]);

        $post = Post::find($id);

        if($request->has('image'))
        {
            //hapus data lama
            File::delete('image/'.$post->image);

            
            $newImageName = time (). '.'.$request->image->extension();

            $request->image->move(public_path('image'), $newImageName);

            $post->image = $newImageName;
        }

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->category_id = $request->input('category_id');

        $post->save();

        return redirect('/post');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        File::delete('image/'.$post->image);

        $post->delete();

        return redirect('/post');
    }
}
