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
        <form action="{{route('leaves.store')}}" method="post" enctype="multipart/form-data">@csrf

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create Leave</div>
                <div class="card-body">
                    <div class="form-group">
                        <label>From date</label>
                        <input type="text" name="from" 
                        class="form-control @error('from') is-invalid @enderror" 
                            required="" id="datepicker">
                        @error('from')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group">
                        <label>To date</label>
                        <input type="text" name="to" class="form-control @error('to') is-invalid @enderror" 
                        required="" id="datepicker1">
                        @error('to')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group">
                        <label>Type of leave</label>
                        <select name="type" class="form-control" id="">
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
                        </textarea>
                        @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    
                    <div class="form-group">
                        <button class="btn btn-primary " type="submit">Submit</button>
                    </div>
                    
                </div>
            </div>
        </div>
        
        </div>
      
    </div>
</form>
<div class="col-md-12">
<table class="table table-striped mt-5">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Date From</th>
      <th scope="col">Date To</th>
      <th scope="col">Description</th>
      <th scope="col">Type</th>
      <th scope="col">Reply</th>
      <th scope="col">Status</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
  @if(count($leaves)>0)
  @foreach($leaves as $key=>$leave)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$leave->from}}</td>
      <td>{{$leave->to}}</td>
      <td>{{$leave->description}}</td>
      <td>{{$leave->type}}</td>
      <td>{{$leave->message}}</td>
      <td>
        @if($leave->status==0)
        <span class='alert alert-danger'>Pending</span>
        @else
          <span class='alert alert-success'>Approved</span>
        @endif
      </td>
      <td>
        
        <a href="{{route('leaves.edit',[$leave->id])}}"><i class="fas fa-edit"></i></a>
        
        </td>
        <td>
        

        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal{{$leave->id}}">    
        <i class="fas fa-trash"></i>
        </a>
        
        <!-- Modal -->
            <div class="modal fade" id="exampleModal{{$leave->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{route('leaves.destroy',[$leave->id])}}" method="post">@csrf
                    {{method_field('DELETE')}}
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Do you want to delete?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                    </div>
                </form>
            </div>
            </div>
        </td>
    </tr>
    @endforeach
    @else
    <td>No Leaves created yet!</td>
    @endif
  </tbody>
</table>
</div>
</div>
    
@endsection
