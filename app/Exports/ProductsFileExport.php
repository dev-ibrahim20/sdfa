<?php

namespace App\Exports;
use App\Models\Warehouse;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProductsFileExport implements FromView
{
    public function view(): View
    {
        return view('backend.pages.xls.export.products', [
            'products' => Product::get(),
            'warehouses' => Warehouse::get()
        ]);
    }
}
