<?php

namespace App\Imports;
use App\Models\WarehouseProduct;
use App\Models\Warehouse;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
class ProductsFileImports implements ToCollection, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */


    public function collection(Collection $rows)
    {
        foreach( $rows as $k=>$row ) {
                
                if( $k == 0 ){
                $warehouses = Warehouse::whereIn('title_ar',$row)->get();
                }else{
                
                //insert or update product
                $insert_data['sku'] = $row[0];
                $insert_data['title_ar'] = $row[1] ?? $row[0];
                $insert_data['title_en'] = $row[2] ?? ( $row[1] ?? $row[0] );
                $insert_data['user_id'] = \Auth::user()->id;
                $product = Product::updateOrCreate(['sku'=>$row[0]],$insert_data);

                //insert or update product in warehouses
                foreach( $warehouses as $k=>$warehouse){
                    if(isset($row[$k+3])  && isset($product->id) && isset($warehouse->id) ){
                        WarehouseProduct::updateOrCreate(['warehouse_id'=>$warehouse->id , 'product_id'=>$product->id ] , ['qty'=>$row[$k+3]] );
                    }
                }

                }


             
            }
      
    
    }

    public function startRow(): int
    {
        return 1;
    }



}
