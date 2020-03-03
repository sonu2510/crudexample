<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class product_upload_files extends Model
{
    //

     protected $table = 'product_upload_files';

     protected $primaryKey = 'scanned_copy_id';

     public function product_id()
    {
    	//dd($this->hasOne('App\Model\Invoice\Country','country_id','country_destination'));
        return $this->hasOne('App\Model\products','id','product_id');
    }
}
