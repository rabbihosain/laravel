<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use DB;

class helloController extends Controller
{
    public function index(){
        $post = DB::table('posts')->join('categories', 'posts.category_id', 'categories.id')
        ->select('posts.*', 'categories.name', 'categories.slug')->paginate(3);

        return view('index', compact('post'));
    }

    public function addCategory(){
        return view('add_category');
    }
    public function saveCategory(Request $request){
        $validateData = $request->validate([
            'name' =>'required|unique:categories|max:20|min:3',
            'slug' =>'required|unique:categories|max:20|min:3',
            
        ]);

        $data = new Category;

        $data->name = $request->name;
        $data->slug = $request->slug;

        $insertCat = $data ->save();


        if($insertCat){
            $notification = array(
                'message' => 'Succussfully Category Inserted',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message'=>'Something went wrong',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function allCategory(){
        $category= DB::table('categories')->get();
        return view('all_category', compact('category'));
    }

    public function viewCategory($id){
        $category= DB::table('categories')->where('id', $id)->first();

        return view('categoryview')->with('cat', $category);
    }

    public function deleteCategory($id){
        $delete= DB::table('categories')->where('id', $id)->delete();

        $notification = array(
            'message' => 'Succussfully Category Deleted',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function editCategory($id){
        $category= DB::table('categories')->where('id', $id)->first();

        return view('categoryedit', compact('category'));
    }

    public function updateCategory(Request $request,$id){
        $validateData = $request->validate([
            'name' =>'required|max:20|min:3',
            'slug' =>'required|max:20|min:3',
            
        ]);
        $data= array();
        $data['name']=$request->name;
        $data['slug']=$request->slug;
        $category=DB::table('categories')->where('id', $id)->update($data);
        
        if($category){
            $notification = array(
                'message' => 'Succussfully Category Udated',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message'=>'Something went wrong',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    


}
