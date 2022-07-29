@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Notice
                    
                </li>
              </ol>
            </nav>
            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif
        <form action="{{route('notices.update',[$notice->id])}}" method="post">@csrf
        {{method_field('PATCH')}}
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Notice</div>
                <div class="card-body">
                <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" required="" value="{{$notice->title}}">
                        
                        @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                <div class="form-group">
                        <label>Description</label>
                        <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror" required="">
                        {{$notice->description}}
                        </textarea>
                        @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        <input type="text" name="date" 
                        class="form-control @error('date') is-invalid @enderror" 
                            required="" id="datepicker" value="{{$notice->date}}">
                        @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group">
                        <label>Created By</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                        required="" value="{{auth()->user()->name}}" readonly>
                        @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    
                    
                    
                
                    
                    <div class="form-group">
                        <button class="btn btn-primary " type="submit">Update</button>
                    </div>
                    
                </div>
            </div>
        </div>
        
        </div>
      
    </div>
</form>


</div>
    
@endsection
