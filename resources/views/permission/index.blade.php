@extends('admin.layouts.master')

@section('content')
<div class="container" style="margin-top: 5rem !important;">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Department List</div>

                <div class="card-body">

                <div class="form-group">
<table class="table table-bordered" id="dataTable">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th>Edit</th>
       <th>Delete</th>
    </tr>
  </thead>
     
            <tbody>
                @if(count($permissions)>0)
                @foreach($permissions as $key=>$permission)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$permission->role->name}}</td>
                    @if(isset(auth()->user()->role->permission['name']['permission']['can-edit']))
                    <td>
                        <a href="{{route('permissions.edit',[$permission->id])}}"><i class="fas fa-edit"></i></a></td>
                       @endif
                        <td>
                     
                        @if(isset(auth()->user()->role->permission['name']['permission']['can-delete']))  
             <a href="#" data-toggle="modal" data-target="#exampleModal{{$permission->id}}">
                        <i class="fas fa-trash"></i>
                    </a>
                     </td>
                 @endif
                    <!-- Modal -->
                <div class="modal fade" id="exampleModal{{$permission->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <form action="{{route('permissions.destroy',[$permission->id])}}" method="post">@csrf
                        {{method_field('DELETE')}}
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Confirm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                      
                        Do you want to delete?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                      </div>
                    </div>
                  </form>
                  </div>
                </div>
                <!--Modal end-->

                   
                    </td>
                
                
                </tr>
                @endforeach
                @else
                <td>No permissions to display</td>
                @endif
               
               
              
            </tbody>
</table>


                </div>
             
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
