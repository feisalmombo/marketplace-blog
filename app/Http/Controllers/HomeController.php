<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use Auth;
use DB;
use App\User;
use Charts;

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
        $usersCount = DB::select('SELECT COUNT(*) as "usersCount" FROM users');

        $postsCount = DB::select('SELECT COUNT(*) as "postsCount" FROM blog_posts');

        $categoriesCount = DB::select('SELECT COUNT(*) as "categoriesCount" FROM categories');

        $commentsCount = DB::select('SELECT COUNT(*) as "commentsCount" FROM contact_infos');

        $subscribersCount = DB::select('SELECT COUNT(*) as "subscribersCount" FROM subscribers');



        // return \json_encode($commentsCount);

        return view('home')
        ->with('usersCount', $usersCount)
        ->with('postsCount', $postsCount)
        ->with('categoriesCount', $categoriesCount)
        ->with('commentsCount', $commentsCount)
        ->with('subscribersCount', $subscribersCount);
    }
}
