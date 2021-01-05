<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\ActivityLog;
use DB;
use Auth;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table('categories')
        ->latest()
        ->get();

        return view('manageCategories.viewcategories')
        ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manageCategories.addcategory');
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
            if (\Auth::user()->can('create_category')) {
                return $next($request);
            }
            return redirect()->back();
        });
        $this->validate(request(), [
            'category' => 'required|string',
        ]);

        $blogcategory = new Category();
        $blogcategory->category_name = $request->category;

        // return json_encode($blogcategory);
        $st = $blogcategory->save();
        if (!$st) {
            return redirect()->back()->with('message', 'Failed to upload Category data');
        } else {
            return redirect()->back()->with('message', 'Category is successfully uploaded');
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
        $this->middleware(function ($request, $next) {
            if (\Auth::user()->can('edit_category')) {
                return $next($request);
            }
            return redirect()->back();
        });
        $category = Category::findOrFail($id);

        return view('manageCategories.editcategory')
        ->with('categories', $category);
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
            if (\Auth::user()->can('update_category')) {
                return $next($request);
            }
            return redirect()->back();
        });
        $this->validate(request(), [
            'category' => 'required',
        ]);

        $blogcategory = Category::findOrFail($id);
        $blogcategory->category_name = $request->category;
        $st = $blogcategory->save();
        if (!$st) {
            return redirect()->back()->with('message', 'Failed to Update Category data');
        } else {
            return redirect()->back()->with('message', 'Category is updated successfully');
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
            if (\Auth::user()->can('delete_category')) {
                return $next($request);
            }
            return redirect()->back();
        });

        $uid = \Auth::id();
        $category = Category::findOrFail($id);
        $category->delete();
        ActivityLog::where('changetype', 'Delete Category')->update(['user_id' => $uid]);


        $request->session()->flash('message', 'Cateory is successfully deleted');
        return back();
    }
}
