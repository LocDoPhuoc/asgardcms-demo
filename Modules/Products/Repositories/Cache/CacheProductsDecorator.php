<?php

namespace Modules\Products\Repositories\Cache;

use Modules\Products\Repositories\ProductsRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheProductsDecorator extends BaseCacheDecorator implements ProductsRepository
{
    public function __construct(ProductsRepository $products)
    {
        parent::__construct();
        $this->entityName = 'products.products';
        $this->repository = $products;
    }
}
