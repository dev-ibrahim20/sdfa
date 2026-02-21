<?php

namespace App\Exports;

use App\Models\Warehouse;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProductsTemplateFileExport implements FromView
{
    public function view(): View
    {
        return view('backend.pages.xls.export.products_template', [
            'warehouses' => Warehouse::get()
        ]);
    }
}
