<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Product::all();

        return view('admin.products.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $this->processImages($request);
        
        Product::create($input);

        //return back()->withSuccess(trans('app.success_store'));
        return redirect()->route(ADMIN.'.products.index')->withSuccess(trans('app.success_store'));
    }
    private function processImages(Request $request)
    {
        $input = $request->all();
        unset($input['featured_image']);
        unset($input['gallery_images']);
        if ($request->hasFile('featured_image')) {
            $input['featured_image'] = $request->file('featured_image')->store('featured_images', ['disk' => 'public']);
        }

        if ($request->hasFile('gallery_images')) {
            $input['gallery_images'] = [];
            foreach ($request->file('gallery_images') as $gallary_image) {
                $input['gallery_images'][] = $gallary_image->store('gallery_images', ['disk' => 'public']);
            }
        }
        return $input;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Product::findOrFail($id);

        return view('admin.products.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Product::findOrFail($id);
        $input = $this->processImages($request);
        $item->update($input);
        //return back()->withSuccess(trans('app.success_update'));
        return redirect()->route(ADMIN.'.products.index')->withSuccess(trans('app.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);

        return back()->withSuccess(trans('app.success_destroy'));
    }
}
