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
      <th scope="col">Description</th>
        @if(isset(auth()->user()->role->permission['name']['department']['can-edit']))
      <th>Edit</th>
      @endif
       @if(isset(auth()->user()->role->permission['name']['department']['can-delete']))
       <th>Delete</th>
         @endif
    </tr>
  </thead>
     
            <tbody>
                @if(count($departments)>0)
                @foreach($departments as $key=>$department)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$department->name}}</td>
                    <td>{{$department->description}}</td>

                    <td>
                   @if(isset(auth()->user()->role->permission['name']['department']['can-edit']))
                    <a href="{{route('department.edit',[$department->id])}}"><i class="fas fa-edit"></i></a></td>
                    @endif
                    <td>
                      @if(isset(auth()->user()->role->permission['name']['department']['can-delete']))
             <a href="#" data-toggle="modal" data-target="#exampleModal{{$department->id}}">
                        <i class="fas fa-trash"></i>
                    </a>
                @endif
                    <!-- Modal -->
                <div class="modal fade" id="exampleModal{{$department->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <form action="{{route('department.destroy',[$department->id])}}" method="post">@csrf
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
                <td>No departments to display</td>
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
