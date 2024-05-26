@foreach($data as $row)
           <tr>
                <td> <img src="{{ asset('/uploads/'.$row->image) }}" width="100" class="img-thumbnail" alt="Image"></td>
                <td> {{ $row->date }} </td>
                <td> {{ $row->teacher_name }} </td>
                <td> {{ $row->site_name }} </td>
                <td> {{ $row->scategory_name }} </td>
                <td> {{ $row->amount }} </td>
                <td> {{ $row->reff }} </td>
                
               @if(spend_edit())
                <td> <button type="button" value="{{ $row->id}}" class="btn btn-primary btn-sm editIcon" data-bs-toggle="modal" data-bs-target="#editEmployeeModal">Edit</button>  </td>
                <td> <button type="button" value="{{ $row->id}}" class="btn btn-danger btn-sm deleteIcon" >Delete</button>  </td>
               @endif
               <td> {{ $row->created_at }} </td>
               <td> {{ $row->updated_at }} </td>
            </tr>            
@endforeach
  <tr class="pagin_link">
        <td colspan="4" align="center">
           {!! $data->links() !!}
        </td>
   </tr>  