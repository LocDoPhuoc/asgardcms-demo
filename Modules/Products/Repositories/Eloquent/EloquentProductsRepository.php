<?php

namespace Modules\Products\Repositories\Eloquent;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Modules\Products\Repositories\ProductsRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentProductsRepository extends EloquentBaseRepository implements ProductsRepository
{
    public function all()
    {
        return $this->model->orderBy('created_at', 'DESC')->get();
    }

    /**
     * Paginating, ordering and searching through pages for server side index table
     * @param Request $request
     * @return LengthAwarePaginator
     */
    public function serverPaginationFilteringFor(Request $request): LengthAwarePaginator
    {
        $products = $this->allWithBuilder();

        if ($request->get('search') !== null) {
            $term = $request->get('search');
            $products->where('name', 'LIKE', "%{$term}%")
                ->orWhere('description', 'LIKE', "%{$term}%")
                ->orWhere('id', $term);
        }

        if ($request->get('order_by') !== null && $request->get('order') !== 'null') {
            $order = $request->get('order') === 'ascending' ? 'asc' : 'desc';

            $products->orderBy($request->get('order_by'), $order);
        } else {
            $products->orderBy('created_at', 'desc');
        }

        return $products->paginate($request->get('per_page', 10));
    }
}
