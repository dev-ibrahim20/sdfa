<table>
<thead>

<tr>
<th>كود الصنف</th>
<th>العنوان بالعربية</th>
<th>العنوان بالانجليزية</th>

@foreach($warehouses as $warehouse)
@can('list_project_'.$warehouse->project_id)
<th>{{$warehouse->title}}</th>
@endcan
@endforeach

</tr>
</thead>
<tbody>
@foreach($products as $product)
<tr>
<td>{{$product->sku}}</td>
<th>{{$product->title_ar}}</th>
<th>{{$product->title_en}}</th>
@foreach($warehouses as $warehouse)
@can('list_project_'.$warehouse->project_id)
@php $product_warehouse = $warehouse->products()->where('product_id',$product->id)->first(); @endphp
<td>{{$product_warehouse->qty ?? ''}}</td>
@endcan
@endforeach
</tr>
@endforeach
</tbody>
</table>
