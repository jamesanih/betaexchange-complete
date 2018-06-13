<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Helpers\Utility;
use App\Models\BlogPost;



class BlogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

   /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $data['title']='Bitcoins';
    $data['blogs']=BlogPost::latest('id')->get(); 
    return view('admin.blogs.index',$data);
  }

 /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
   public function create()
   {
   
         $data['page_title']="Add";
         $data['page_action']="Save";
      return view('admin.blogs.createOrUpdate',$data);
   }
 
   /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */
   public function store(Request  $request)
   {
   
           try {
     $input=$request->all();
     $input['published_date']=\date('Y-m-d');
     $input['slug']=str_slug($input['title'], "-");
     $input['short_description']=substr($input['content'], 0, 300) ;
     $input['user_id']=\Auth::user()->id;
  BlogPost::create($input);
  return  \Response::json(array('success' => true));
            
        } catch (Exception $e) {
            
        }
        $data['page_title']="Add";
        $data['page_action']="Save";
      return view('admin.blogs.createOrUpdate',$data);
    

  }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $data['blog']=BlogPost::find($id);
        return view('admin.blogs.delete',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $data['blog']=BlogPost::find($id);
      $data['page_title']="Edit";
      $data['page_action']="Update";
    return view('admin.blogs.createOrUpdate',$data);
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

          try {
        $post = BlogPost::find($id);
     if($post)
     {
     $post ->title = $request['title'];
     $post ->slug =str_slug($request['slug'], "-");
     $post ->short_description =substr($request['content'], 0, 300);
     $post ->content = $request['content'];
     $post->published_date=\date('Y-m-d');
     $post ->save();


    }
     return  \Response::json(array('success' => true));
      
    } catch (Exception $e) {
      
    }
    
        $data['page_title']="Edit";
        $data['page_action']="Update";
     return view('admin.blogs.createOrUpdate',$data);

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $post =BlogPost::find($id);
     if($post)
     {
       // delete
      $post->delete();

       return  redirect('administrator/blog');
     }
    
     App::abort(404);
    }


}

  


?>