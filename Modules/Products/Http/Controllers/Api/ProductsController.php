<?php

namespace Modules\Products\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Products\Repositories\ProductsRepository;
use Modules\Products\Transformers\ProductsTransformer;

class ProductsController extends Controller{
    private $products;

    public function __construct(ProductsRepository $products){
        $this->products = $products;
    }

    public function index(Request $request)
    {
        return ProductsTransformer::collection($this->products->serverPaginationFilteringFor($request));
    }
}
