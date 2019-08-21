<?php

namespace Corp;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = ['title','img','alias','text','customer','keywords','meta_desc','category_id', 'url'];
    public function category(){
      return   $this->belongsTo('Corp\Portfoliocategory','category_id', 'id');
    }
}
