<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    protected $fillable = ['title', 'slug', 'status'];

    public static function rules()
    {
        $commun = [
            'title' => 'required|min:2',
            'slug' => 'required|min:2'
        ];

        return $commun;
    }


}
