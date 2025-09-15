@extends('admin.layouts.master')
@section('content')
<div class="container mt-5" style="margin-top: 5rem !important;">
    <div class="row justify-content-center">
        <div class="col-md-8">
             @if (Session::has('message'))
             <div class="alert alert-success" role="alert">
                 {{ Session::get('message') }}
             </div>
             @endif
             <form action="{{route('department.store')}}" method="post">@csrf
            <div class="card">
                <div class="card-header">Create New Department</div>
                <div class="card-body">
        <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>

                </span>

                @enderror


        </div>
          <div class="form-group">
                <label for="">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" ></textarea>
           
                @error('description')
                <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>

                </span>

                @enderror


        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

                 
                </div>
            </div>
            </form>
        </div>
    </div>
</div>


@endsection
