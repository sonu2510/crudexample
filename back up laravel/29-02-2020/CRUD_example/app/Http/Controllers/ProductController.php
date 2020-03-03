<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\products;
use DB;
use Yajra\DataTables\DataTables;
class ProductController extends Controller
{
    //
     public function index()
    {
    	//toSql;
    	 //$products = DB::table('products')->get();
    	 $products = products::all();
    	 return view('product.index');
    }  

     public function datatable_product()
    {
        //toSql;
      
        $products = products::all();  

          return Datatables::of($products)  
                 ->addColumn('id', function($products){          
                     return  $products->id; 
                     })
                 ->addColumn('name', function($products){
                     return $products->name;                
                      })
                 ->addColumn('detail', function($products){ 
                     return $products->detail;
                      })                   
                  ->addColumn('action', function($products){
                     return '<a  href="(/product_edit,'.$products->id.')" class="btn btn-outline-success">Edit</a>';                      
                     })                     
                 ->addColumn('delete', function($products){                       
                     return '<a  href="(/product_edit,'.$products->id.')" class="btn btn-outline-success">Upload</a>'; 
                     })                 
                    ->rawColumns(['id,name,detail,action,delete'])
                    ->escapeColumns(['detail'])
                    ->make(true);

    }


 
   
    public function create(){

    	 return view('product.create');
    } 
    public function store(Request $request){

    	
    	/*  $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);*/
 

		 //dd($request->all());
    

/*
       $product_create=new products();
        $product_create->name=$request->input('name');
        $product_create->details=$request->input('details');  */  



        products::create($request->all());   		
     	 return view('product.index');
    
    }
}
