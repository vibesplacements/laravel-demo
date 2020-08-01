<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    protected $fillable = ['product_title', 'slug', 'categories', 'featured_image', 'gallery_images', 'description', 'status'];
    
    
    public function setCategoriesAttribute($value)
    {
        $this->attributes['categories'] = implode(',',$value);
    }
    
    public function getCategoriesAttribute($value)
    {
        return explode(',', $value);
    }
    public function setGalleryImagesAttribute($value)
    {
        $this->attributes['gallery_images'] = implode(',',$value);
    }
    
    public function getGalleryImagesAttribute($value)
    {
        return ($value)?explode(',', $value):null;
    }

}
