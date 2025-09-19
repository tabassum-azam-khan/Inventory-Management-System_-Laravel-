<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product_Category extends Model
{
    use HasFactory;
    use SoftDeletes;

        protected $table = 'product_categories';


        public function subCategories(){
            return $this->hasMany(SubCategory::class,'category_id');
        }
}
