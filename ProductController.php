<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use DB;


class ProductController extends Controller
{
    

    public function index(Request $request)
    {
        //$details=DB::connection('mysql2')-> select("select n_id,c_hash,c_title,c_description,photo from blog_mst  ");
        return view('index');
    }
    public function adddetails(Request $request)
    {
        return view('create');
    }
    public function view()
     {
       // $a=Auth::Id();
       //return $a;
          $users = DB::select("select * from blog_mst");
       //return $users;
          return view('store',compact('users'));
          return users;
       }
public function display()
{
    $users=DB::select("select * from blog_mst");
    return view('display',compact('users'));
}
   
    public function store(Request $data)
    {
         //dd($data['title']);

                $title=$data['title'];
            
                $hash=$data['hash'];
          
               $desc=$data['desc'];
               //$image=$data['photo'];
              // dd(1);

             // $image=file($data['image']);
              //dd($data);
              //$data->file('photo');
              $file = $data->file('image');
              $filename=  $file->getClientOriginalName();
$file->move(base_path('/public/image'), $filename);
            //   $image1=$image->getClientOriginalName();
            //   $data->image->storeAs('public/image',$image1);
                products::create([
                
                   'c_title'=>$title,
                   'c_hash'=>$hash,
                   'c_description'=>$desc ,
                   'photo'=>$filename,
                  
                   
        
           ]);
           return view('index');


     }
     



}
