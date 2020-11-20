<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Authors;
use DB;

class authorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	return view('add_author'); 
    }

    // Add authors
    public function store(Request $request){
    	$validateData     =  $request->validate([
    		'fullName'    => 'required|max:255',
    		'email'       => 'required|unique:authors|max:255',
    		'phone'       => 'required|unique:authors|max:15',
    		'address'     => 'required',
    		'photo'       => 'required',
    		'profileText' => 'required',
    	]);

    	$data=array();
    	$data['fullName']    = $request->fullName;
    	$data['email']       = $request->email;
    	$data['phone']       = $request->phone;
    	$data['address']     = $request->address;
    	$data['profileText'] = $request->profileText;
    	$image = $request->file('photo');

    	if($image){
    		$imageName     = uniqid();
    		$ext           = strtolower($image->getClientOriginalExtension());
    		$imageFullName = $imageName.'.'.$ext;
    		$uploadPath    = 'public/user/';
    		$imageURL      = $uploadPath.$imageFullName;
    		$success	   = $image->move($uploadPath,$imageFullName);
    		if($success){
    			$data['photo'] = $imageURL;
    			$author = DB::table('authors')->insert($data);
    			if($author){
    				$notification = array('message' => 'Successfully Updated',
    				'alert-type'=> 'success');
    				return Redirect()->route('home')->with($notification);
    			}else{
    				$notification = array('message' => 'error',
    				'alert-type'=> 'danger');
    				return Redirect()->route('home')->with($notification);
    			}
    		}else{
    			return Redirect()->back();
    		}
    	}else{
			return Redirect()->back();
		}


    	// echo "<pre>";
    	// print_r($data);
    	// exit();
    }

    // Show all authors
    public function showAuthors(){
    	$authors= Authors::all();
    	return view('all_author',compact('authors')); 
    }

    //Show single author info
    public function viewAuthorInfo($id){
    	$viewAuthorInfo= Authors::all()->where('id',$id)->first();    	
    	return view('view_author',compact('viewAuthorInfo')); 
    }

    //Delete single author info
    public function deleteAuthor($id){
    	$deleteImage= Authors::all()->where('id',$id)->first();
    	$image = $deleteImage->photo;
    	unlink($image);
    	$deleteAuthor= Authors::findOrFail($id)->delete(); 
    	if($deleteAuthor){
			$notification = array('message' => 'Successfully Deleted',
			'alert-type'=> 'success');
			return Redirect()->route('home')->with($notification);
		}else{
			$notification = array('message' => 'error',
			'alert-type'=> 'danger');
			return Redirect()->route('home')->with($notification);
		}
    }


    //edit single author info
    public function editAuthorInfo($id){
    	$editAuthorInfo= Authors::all()->where('id',$id)->first();    	
    	return view('edit_author',compact('editAuthorInfo'));     	
    }

    // Add authors
    public function updateAuthorInfo(Request $request,$id){
    	$validateData     =  $request->validate([
    		'fullName'    => 'max:255',
    		'email'       => 'max:255',
    		'phone'       => 'max:15',
    	]);

    	$data=array();
    	$data['fullName']    = $request->fullName;
    	$data['email']       = $request->email;
    	$data['phone']       = $request->phone;
    	$data['address']     = $request->address;
    	$data['profileText'] = $request->profileText;
    	$image = $request->photo;

    	if($image){
    		$imageName     = uniqid();
    		$ext           = strtolower($image->getClientOriginalExtension());
    		$imageFullName = $imageName.'.'.$ext;
    		$uploadPath    = 'public/user/';
    		$imageURL      = $uploadPath.$imageFullName;
    		$success	   = $image->move($uploadPath,$imageFullName);
    		if($success){
    			$data['photo'] = $imageURL;
    			$img = DB::table('authors')->where('id',$id)->first();
    			$imagePath = $img->photo;
    			$done = unlink($imagePath);
    			$updateInfo= DB::table('authors')->where('id',$id)->update($data);

    			if($updateInfo){
    				$notification = array('message' => 'Successfully Updated Author',
    				'alert-type'=> 'success');
    				return Redirect()->back()->with($notification);
    			}else{
    				$notification = array('message' => 'error',
    				'alert-type'=> 'danger');
    				return Redirect()->route('home')->with($notification);
    			}
    		}else{
    			return Redirect()->back();
    		}
    	}else{
			return Redirect()->back();
		}


    	// echo "<pre>";
    	// print_r($data);
    	// exit();
    }

}
