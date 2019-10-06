<?php

namespace Modules\Products\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Products\Entities\Products;
use Modules\Products\Http\Requests\CreateProductsRequest;
use Modules\Products\Http\Requests\UpdateProductsRequest;
use Modules\Products\Repositories\ProductsRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Products\Traits\UploadProductImageTrait;

class ProductsController extends AdminBaseController
{
    use UploadProductImageTrait;

    /**
     * @var ProductsRepository
     */
    private $products;

    public function __construct(ProductsRepository $products)
    {
        parent::__construct();

        $this->products = $products;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $products = $this->products->all();

        return view('products::admin.products.index', compact('products',  $products));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('products::admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateProductsRequest $request
     * @return Response
     */
    public function store(CreateProductsRequest $request)
    {
        $image = $request->file('image');
        $imageName = str_slug($request->input('name')).'_'.time();
        $folder = '/uploads/images/';
        $imageUrl = $folder . $imageName . '.' . $image->getClientOriginalExtension();
        $this->uploadImage($image, $folder, 'public', $imageName);
        $this->products->create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'image' => $imageUrl
        ]);

        return redirect()->route('admin.products.products.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('products::products.title.products')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Products $product
     * @return Response
     */
    public function edit(Products $product)
    {
        return view('products::admin.products.edit', compact('product', $product));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Products $products
     * @param  UpdateProductsRequest $request
     * @return Response
     */
    public function update(Products $products, UpdateProductsRequest $request)
    {
        $this->products->update($products, $request->all());

        return redirect()->route('admin.products.products.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('products::products.title.products')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Products $products
     * @return Response
     */
    public function destroy(Products $products)
    {
        $this->products->destroy($products);

        return redirect()->route('admin.products.products.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('products::products.title.products')]));
    }
}
