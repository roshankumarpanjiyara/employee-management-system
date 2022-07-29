@extends('admin.layouts.master')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">All Users</li>
                </ol>
            </nav>
            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif
        <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Users 
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Department</th>
                                    <th>Designation</th>
                                    <th>Start Date</th>
                                    <th>Address</th>
                                    <th>Mobile</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($users)>0)
                                @foreach($users as $key=>$user)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td><img src="{{asset('profile')}}/{{$user->image}}" Width="50"></td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td><span class="badge badge-success">{{$user->role->name ??''}}</span></td>
                                    <td>{{$user->department->name ??''}}</td>
                                    <td>{{$user->designation}}</td>
                                    <td>{{$user->start_from}}</td>
                                    <td>{{$user->address}}</td>
                                    <td>{{$user->mobile_number}}</td>
                                    <td>
                                    @if(isset(auth()->user()->role->permission['name']['user']['can-edit']))
                                    
                                    <a href="{{route('users.edit',[$user->id])}}"><i class="fas fa-edit"></i></a>
                                    @endif
                                    </td>
                                    <td>
                                    @if(isset(auth()->user()->role->permission['name']['user']['can-delete']))

                                    <a href="#" data-toggle="modal" data-target="#exampleModal{{$user->id}}">    
                                    <i class="fas fa-trash"></i>
                                    </a>
                                    @endif
                                    <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form action="{{route('users.destroy',[$user->id])}}" method="post">@csrf
                                                {{method_field('DELETE')}}
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                <td>No Users created yet!</td>
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
