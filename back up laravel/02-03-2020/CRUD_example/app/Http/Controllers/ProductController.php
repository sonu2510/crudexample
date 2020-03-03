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
                     return '<a  href="/product_edit/'.$products->id.'" class="btn btn-outline-success">Edit</a>';                      
                     })                     
                 ->addColumn('delete', function($products){                       
                     return '<a  href="/product_delete/'.$products->id.'" class="btn btn-outline-danger ">Delete</a>'; 
                     }) 
                ->addColumn('upload', function($products){                       
                     return '<a  href="/product_delete/'.$products->id.'" class="btn btn-outline-info">Upload</a>'; 
                     })                 
                    ->rawColumns(['id,name,detail,action,upload'])
                    ->escapeColumns(['detail'])
                    ->make(true);

    }


 
   
    public function create(){

    	 return view('product.create');
    } 
    public function product_edit($id)
    {

        $product_details= products::find($id);
   
        return view('Product.create',compact('product_details'));

    }
     public function delete($id)
    {   
     
     
      $product_details= products::find($id);

       if ($product_details != null) {
              $product_details->delete();
            
                  return redirect()->route('product')->with('success','Product deleted successfully');
       }

       // products::find($id)->delete();
          return redirect()->route('product')->with('success','Product deleted successfully');
        // return view('/product.index');
    }

    public function store(Request $request){

    	
    	/*  $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);*/
 

		 //dd($request->all());
    
  //  dd($request->get("id") );die;


         if($request->get("id") == '') { 
             products::create($request->all()); 
         } else {         
             products::find($request->get("id"))->update($request->all());
         }
   
/*
       $product_create=new products();
        $product_create->name=$request->input('name');
        $product_create->details=$request->input('details');  */  



      //  products::create($request->all());   		
     	  return redirect()->route('product')->with('success','Product Added  successfully');
    
    }
}
