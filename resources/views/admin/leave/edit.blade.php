@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Leave Form
                    
                </li>
              </ol>
            </nav>
            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif
        <form action="{{route('leaves.update',[$leave->id])}}" method="post" enctype="multipart/form-data">@csrf
        {{method_field('PATCH')}}
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Update Leave</div>
                <div class="card-body">
                    <div class="form-group">
                        <label>From date</label>
                        <input type="text" name="from" 
                        class="form-control @error('from') is-invalid @enderror" 
                            required="" id="datepicker" value="{{$leave->from}}">
                        @error('from')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group">
                        <label>To date</label>
                        <input type="text" name="to" class="form-control @error('to') is-invalid @enderror" 
                        required="" id="datepicker1" value="{{$leave->to}}">
                        @error('to')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group">
                        <label>Type of leave</label>
                        <select name="type" class="form-control" id="" value="{{$leave->type}}">
                            <option value="">Select</option>
                            <option value="annualleave">Annual Leave</option>
                            <option value="sickleave">Sick Leave</option>
                            <option value="parental">Parental Leave</option>
                            <option value="other">Other Leave</option>
                        </select>
                    </div>
                    
                    
                    <div class="form-group">
                        <label>Description</label>
                        <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror" required="">
                        {{$leave->description}}
                        </textarea>
                        @error('description')
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
