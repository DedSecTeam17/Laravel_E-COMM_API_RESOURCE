<?php

namespace App\Http\Controllers;

use App\Exceptions\ProductNotBelongToCurrentUser;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\Product\ProductCollection;
use App\Http\Resources\Product\ProductResource;
use App\Model\Category;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class ProductController extends Controller
{


    public function __construct()
    {

        $this->middleware("auth:api")->except('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return  ProductCollection::collection(Product::all()->where('user_id',Auth::id()));
    }

    /**new
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product=new Product();
        $product->name=$request->name;
        $product->detail=$request->detail;
        $product->price=$request->price;
        $product->stock=$request->stock;
        $product->discount=$request->discount;
        $product->user_id=Auth::id();
        $product->category_id=$request->category_id;
        $product->save();
        return response(
            new ProductResource($product),\Symfony\Component\HttpFoundation\Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return ProductResource
     */
    public function show(Product $product)
    {
        //
        return new ProductResource($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Model\Product $product
     * @return \Illuminate\Http\Response
     * @throws ProductNotBelongToCurrentUser
     */
    public function update(ProductRequest $request, Product $product)
    {
            $this->checkProductOwner($product);
            $product->update($request->all());
            return response(
                [
                    'data'=>  new ProductResource($product)
                ],\Symfony\Component\HttpFoundation\Response::HTTP_CREATED);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Product $product
     * @return \Illuminate\Http\Response
     * @throws ProductNotBelongToCurrentUser
     */
    public function destroy(Product $product)
    {
        $this->checkProductOwner($product);
        try {
            $product->delete();
        } catch (\Exception $e) {
        }


        return response(
            [
               null
            ],\Symfony\Component\HttpFoundation\Response::HTTP_NO_CONTENT);   //
    }

    private  function  checkProductOwner($product)
    {
        if (Auth::id()!==$product->user_id)
        {
            throw new ProductNotBelongToCurrentUser;
        }
    }
}
