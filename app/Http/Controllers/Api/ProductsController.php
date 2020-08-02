<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Product;
use App\Http\Controllers\Controller\Api;
use App\Http\Requests;
use Illuminate\Http\Request;

class ProductsController extends ApiController
{
    

	/**
	 * @api {get} /products Get all products 
	 * @apiDescription Get products 
	 * @apiGroup Products
	 *
	 * @apiVersion 0.1.0
	 */
	public function index(Request $request)
	{
		$products = Product::whereStatus('1')->get();
		return $this->rest->listing($products)->render();
	}


	public function show($id)
	{
		$product = Product::where('id', $id)->first();
		return $this->rest->single($product)->render();
	}

	public function search(Request $request)
	{
		$str = $request['q'];
		$product = Product::where('product_title','LIKE','%'.$str.'%')->orWhere('description','LIKE','%'.$str.'%')->get();
		return $this->rest->single($product)->render();
	}
}
