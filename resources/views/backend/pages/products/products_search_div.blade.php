<div class="row">

<table style="width:100%" class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
<thead>
<tr>

<th> {{__('lang.title')}} </th>
<th> {{__('lang.qty')}} </th>
<th> {{__('lang.inspection_qty')}} </th>
<th> {{__('lang.inspection_file')}} </th>
<th> </th>

</tr>
</thead>

<tbody>

@foreach( $products as $product )

<tr>

<td> {{$product->title}} </td>
<td> {!! Form::text('product_qty', null , ['id'=>'qty_product_'.$product->id,'class' => 'form-control', 'placeholder'=> __('lang.qty')] ) !!} </td>

<td> {!! Form::text('inspection_qty', null , ['id'=>'inspection_product_'.$product->id,'class' => 'form-control', 'placeholder'=> __('lang.inspection_qty')] ) !!} </td>

<td> {!! Form::file('inspection_file', null , ['id'=>'inspection_file_product_'.$product->id,'class' => 'form-control'] ) !!} </td>


<td><a href="#" product_id="{{$product->id}}" class="add_to_product_table"><i id="add_plus_{{$product->id}}" class="fe-plus"></i></a></td>

</tr>

@endforeach

</tbody>
</table>

</div>