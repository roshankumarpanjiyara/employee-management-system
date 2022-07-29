@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif
            <form action="{{route('departments.update',[$department->id])}}" method="post">@csrf
                @method('PATCH') 
                <!-- or {{method_field('PATCH')}} -->
                <div class="card">
                    <div class="card-header">{{ __('Update Department') }}</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for=""><b>Name</b></label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$department->name}}">
                            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for=""><b>Description</b></label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="" cols="30" rows="10">{{$department->description}}</textarea>
                            @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Update</button>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
