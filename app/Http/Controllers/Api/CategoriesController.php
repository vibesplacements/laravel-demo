<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Product;
use App\Http\Controllers\Controller\Api;
use App\Http\Requests;
use Illuminate\Http\Request;

class CategoriesController extends ApiController
{
	public function index(Request $request)
	{
		$categories = Category::all();
		return $this->rest->listing($categories)->render();
	}

	public function show($id)
	{
		$category = Category::where('id', $id)->first();
		$products = Product::whereRaw('FIND_IN_SET('.$id.',categories)')->get();
		$category->products = $products;
		return $this->rest->single($category)->render();
	}
}
