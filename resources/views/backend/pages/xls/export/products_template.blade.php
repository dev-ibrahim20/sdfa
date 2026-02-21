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
<tr>
<td></td>
<td></td>
@foreach($warehouses as $warehouse)
@can('list_project_'.$warehouse->project_id)
<td></td>
@endcan
@endforeach
</tr>
</tbody>
</table>
