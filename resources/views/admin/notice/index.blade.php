@extends('admin.layouts.master')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">All Notice</li>
                </ol>
            </nav>
            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif
            @if(count($notices)>0)
            @foreach($notices as $notice)
            <div class="card alert alert-info">
                <div class="card-header alert alert-warning">
                    <i class="fas fa-table mr-1"></i>
                    {{$notice->title}} 
                </div>
                <div class="card-body">
                    <p>{{$notice->description}} </p>
                    <p class="badge badge-success">Data: {{$notice->date}} </p>
                    <p class="badge badge-warning">Created by: {{$notice->name}} </p>
                </div>
                <div class="card-footer">
                @if(isset(auth()->user()->role->permission['name']['notice']['can-edit']))
                <a href="{{route('notices.edit',[$notice->id])}}"><i class="fas fa-edit"></i></a>
                @endif
                @if(isset(auth()->user()->role->permission['name']['notice']['can-delete']))

                <a href="#" data-toggle="modal" data-target="#exampleModal{{$notice->id}}">    
                <i class="fas fa-trash float-right"></i>
                </a>
                @endif
                <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{$notice->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form action="{{route('notices.destroy',[$notice->id])}}" method="post">@csrf
                            {{method_field('DELETE')}}
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    
                    
                                </button>
                            </div>
                            <div class="modal-body">
                                Do you want to delete?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <p>No notice available</p>
            @endif
        </div>
    </div>
</div>
@endsection
