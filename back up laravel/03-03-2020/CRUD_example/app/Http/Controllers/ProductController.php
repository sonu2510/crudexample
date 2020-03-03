<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\products;
use App\Model\product_upload_files;
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


                       $files_product=product_upload_files::where('product_id',$products->id)->first();   
                  
                        if(!empty($files_product)){                           
                           return  '<a href="'.url('product_upload_files/'.$files_product->filename).'">View Upload File</a>';                       
                        }else{
                            return '<a href="'.Route('product.upload',$products->id).'"><button type="button" class="btn btn-outline-dark">Upload'; 
                        }

                     return '<a href="'.Route('product.upload',$products->id).'"><button type="button" class="btn btn-outline-dark">Upload'; 
                     })                 
                    ->rawColumns(['id,name,detail,action,upload'])
                    ->escapeColumns(['detail'])
                    ->make(true);

    }

 
   public function product_upload_view($id){
         $product_details= products::find($id);

         return view ('product.upload_file',compact('product_details'));
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



       public function fileDestroy(Request $request){

      $filename = $request->get('filename');
        $id = $request->get('id');
      
        $files=product_upload_files::where('filename', $filename)->where('product_id', $id)->first();
       // dd($files->invoice_scanned_copy_id);
        $files_delete=product_upload_files::destroy($files->scanned_copy_id);
               
     
        $path = public_path('product_upload_files/').$filename;
      
        if (file_exists($path)) {
            unlink($path);          
        }       
       
        return $filename;
   

    }
    public function fileStore(Request $request){
      

     $rules = array(
        'file'  => 'required'
     );

  /*   $error = Validator::make($request->all(), $rules);

     if($error->fails())
     {
      return response()->json(['errors' => $error->errors()->all()]);
     }*/

        $image = $request->file('file');
        $image_extension=$image->getClientOriginalExtension();
       // $image_name=$image->getClientOriginalName();
      
      
       
             $imageName ='product_file_'.$request->input('id').'.'.$image_extension;
             $image->move(public_path('product_upload_files'), $imageName);
     
      

        $imageUpload = new product_upload_files();
        $imageUpload->product_id = $request->input('id');
     
        $imageUpload->filename = $imageName;
        $imageUpload->save();
        return response()->json(['success' => 'done']);
      
    }

}
