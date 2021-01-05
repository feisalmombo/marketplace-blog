<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input as input;
use App\Category;
use App\BlogPost;
use App\ActivityLog;
use App\ProfilephotoUpload;
use DB;
use Auth;

class BlogPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $blogposts = DB::table('blog_posts')
            ->join('categories', 'blog_posts.category_id', '=', 'categories.id')
            ->join('users', 'blog_posts.user_id', '=', 'users.id')

            ->select('blog_posts.id',
            'blog_posts.title',
            'blog_posts.post_image_path',
            'blog_posts.post_description',
            'categories.category_name',
            'users.first_name',
            'users.last_name',
            'blog_posts.created_at',
            'blog_posts.updated_at')
            ->latest()
            ->get();

            // return json_encode($blogposts);

        return view('manageBlogPosts.allposts')
        ->with('blogposts', $blogposts);
    }

    public function getAllPost()
    {
        $blogposts = DB::table('blog_posts')
            ->join('categories', 'blog_posts.category_id', '=', 'categories.id')
            ->join('users', 'blog_posts.user_id', '=', 'users.id')

            ->select('blog_posts.id',
            'blog_posts.title',
            'blog_posts.post_image_path',
            'blog_posts.post_description',
            'categories.category_name',
            'users.first_name',
            'users.last_name',
            'blog_posts.created_at',
            'blog_posts.updated_at')
            ->latest()
            ->get();

            // return json_encode($blogposts);

        return view('manageBlogPosts.getallpost')
        ->with('blogposts', $blogposts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::table('categories')
        ->select('id', 'category_name')
        ->get();

        return view('manageBlogPosts.addpost')
        ->with('categories', $categories);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (\Auth::user()->can('create_post')) {
                return $next($request);
            }
            return redirect()->back();
        });
        $this->validate(request(), [
            'title' => 'required|string|unique:blog_posts|min:5|max:100',
            // 'postdescription' => 'required|string|min:5|max:250',
            'postdescription' => 'required|string',
            'postimage' => 'mimes:jpeg,jpg,png|required|max:2048',
            'postcategoryId' => 'required',
        ]);

        $categoryData =  Category::where('category_name', $request->postcategoryId)->first();

        $blogpost = new BlogPost();
        $blogpost->title = $request->title;
        $blogpost->post_image_path = $request->postimage->store('BlogPostImage', 'public');
        $blogpost->post_description = $request->postdescription;
        $blogpost->category_id = $categoryData->id;
        $blogpost->user_id = Auth::user()->id;

        // return \json_encode($blogpost);
        $st = $blogpost->save();
        if (!$st) {
            return redirect()->back()->with('message', 'Failed to upload Blog Post data');
        } else {
            return redirect()->back()->with('message', 'Blog Post is successfully uploaded');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blogpostData = DB::table('blog_posts')
            ->join('categories', 'blog_posts.category_id', '=', 'categories.id')
            ->join('users', 'blog_posts.user_id', '=', 'users.id')

            ->select('blog_posts.id',
            'blog_posts.title',
            'blog_posts.post_image_path',
            'blog_posts.post_description',
            'categories.category_name',
            'users.first_name',
            'users.last_name',
            'blog_posts.created_at',
            'blog_posts.updated_at')
            ->latest()
            ->where('blog_posts.id','=',$id)
            ->get();

            $blogposts = DB::table('blog_posts')
            ->join('categories', 'blog_posts.category_id', '=', 'categories.id')
            ->join('users', 'blog_posts.user_id', '=', 'users.id')

            ->select('blog_posts.id',
            'blog_posts.title',
            'blog_posts.post_image_path',
            'blog_posts.post_description',
            'categories.category_name',
            'users.first_name',
            'users.last_name',
            'blog_posts.created_at',
            'blog_posts.updated_at')
            ->latest()
            ->get();

            // return json_encode($blogpostData);

        return view('manageBlogPosts.blog-singel')
        ->with('posts',$blogpostData)
        ->with('blogposts',$blogposts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->middleware(function ($request, $next) {
            if (\Auth::user()->can('edit_blogpost')) {
                return $next($request);
            }
            return redirect()->back();
        });

        $categories = DB::table('categories')
        ->select('id', 'category_name')
        ->get();

        $post = BlogPost::findOrFail($id);
        return view('manageBlogPosts.editblogpost')
        ->with('posts', $post)
        ->with('categories', $categories);
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
        $this->middleware(function ($request, $next) {
            if (\Auth::user()->can('update_blogpost')) {
                return $next($request);
            }
            return redirect()->back();
        });
        $this->validate(request(), [
            'title' => 'required|string|unique:blog_posts|min:5|max:100',
            'post_description' => 'required|string',
            'postimage' => 'mimes:jpeg,jpg,png|required|max:2048',
            'postcategoryId' => 'required',
        ]);

        $categoryData =  Category::where('category_name', $request->postcategoryId)->first();

        // return json_encode($categoryData);

        $post = BlogPost::findOrFail($id);
        $post->title = $request->title;
        $post->post_image_path = $request->postimage->store('BlogPostImage', 'public');
        $post->post_description = $request->post_description;
        $post->category_id = $categoryData->id;
        $post->user_id = Auth::user()->id;

        // return json_encode($post);
        $st = $post->save();
        if (!$st) {
            return redirect()->back()->with('message', 'Failed to Update Post data');
        } else {
            return redirect()->back()->with('message', 'Post is updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $this->middleware(function ($request, $next) {
            if (\Auth::user()->can('delete_post')) {
                return $next($request);
            }
            return redirect()->back();
        });

        $uid = \Auth::id();
        $post = BlogPost::findOrFail($id);
        $post->delete();
        ActivityLog::where('changetype', 'Delete Post')->update(['user_id' => $uid]);


        $request->session()->flash('message', 'Post is successfully deleted');
        return back();
    }
}
