<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;
use App\Post;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;
use Auth;
use phpDocumentor\Reflection\Types\Array_;
use PhpParser\Node\Stmt\Return_;


class PostController extends Controller
{
    public function post(){
        $categories = Category::all();

         return view ('posts.post',['categories' =>  $categories,]);
    }
    public function addPost(Request $request)

    {

        $this->validate($request, [
        'post_title' => 'required',
        'post_body' => 'required',
        'category_id' => 'required',
        'post_image' => 'required'
    ]);
        $posts = new Post;
        $posts->post_title = $request->input('post_title');
        $posts->user_id = Auth::user()->id;
        $posts->post_body = $request->input('post_body');
        $posts->category_id = $request->input('category_id');
        if(Input::hasFile('post_image')){
            $file = Input::file('post_image');
            $file-> move(public_path().'/posts/', $file->getClientOriginalName());
            $url = URL::to("/") .'/posts/'. $file->getClientOriginalName();

        }
        $posts->post_image = $url;
        $posts->save();
        return redirect('/home')->with('response','Post Published  Successfully');

    }
      public function view($post_id){
        $posts = Post::where('id','=',$post_id)->get();
          $categories = Category::all();

        return view('posts.view', ['posts' => $posts, 'categories' => $categories]);

      }
      public function edit($post_id){
        $categories = Category::all();
        $posts = Post::find($post_id);
        $category = Category::find($posts->category_id);
        return view('posts.edit' ,['categories' => $categories, 'posts' => $posts,'category' => $category]);

    }


    public function editPost( Request  $request,$post_id){

        $this->validate($request, [
            'post_title' => 'required',
            'post_body' => 'required',
            'category_id' => 'required',
            'post_image' => 'required'
        ]);
        $posts = new Post;
        $posts->post_title = $request->input('post_title');
        $posts->user_id = Auth::user()->id;
        $posts->post_body = $request->input('post_body');
        $posts->category_id = $request->input('category_id');
        if(Input::hasFile('post_image')){
            $file = Input::file('post_image');
            $file-> move(public_path().'/posts/', $file->getClientOriginalName());
            $url = URL::to("/") .'/posts/'. $file->getClientOriginalName();
        }
        $posts->post_image = $url;
        $data = array(
            'post_title' => $posts->post_title,
            'user_id' => $posts->user_id,
            'post_body' => $posts->post_body,
            'post_image' => $posts->post_image
        );
        Post::where('id',$post_id)->update($data);
        $posts->update();
        return redirect('/home')->with('response','Post Updated  Successfully');

    }

      public function delete($post_id){

        return $post_id;
      }
}
