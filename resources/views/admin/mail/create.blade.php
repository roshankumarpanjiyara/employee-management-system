@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Send Mail') }}</div>

                <div class="card-body">
                <form action="{{route('mails.store')}}" method="post" enctype="multipart/form-data">@csrf
                <div class="form-group">
                <label for="">Select</label>
                <select name="" id="mail" class="form-control">
                <option value="0">Mail to all staff</option>
                <option value="1">Mail to all department</option>
                <option value="2">Choose Person</option>
                </select>
                <br>
                <select name="department" id="department" class="form-control">
                @foreach(App\Models\Department::all() as $department)
                <option value="{{$department->id}}">{{$department->name}}</option>
                @endforeach
                </select>
                
                <select name="person" id="person" class="form-control">
                @foreach(App\Models\User::all() as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
                </select>
                <br>
                <div class="form-group">
                    <label for="">Body</label>
                    <textarea name="body" class="form-control @error('body') is-invalid @enderror" id="" cols="30" rows="10">
                    </textarea>
                    @error('body')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">File</label>
                    <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" >
                    
                    @error('file')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
                </div>
                </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
#department{
    display: none;
}
#person{
    display: none;
}
</style>
@endsection
