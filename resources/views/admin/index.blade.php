@extends('main')

@section('content')
@if($message = Session::get('success'))
    <div class="alert alert-success">
        {{$message}}
    </div>
@endif
    <div class="card">
        <div class="card-header">
            <div class="row">
            <div class="col col-md-6"><b>Customers Data</b></div>
            <div class="col col-md-6">
                <a href="{{route('admin.create')}}" class="btn btn-success btn-sm float-end">Add</a>
            </div>
        </div>
        </div>
       
        
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Action</th>
                   
                </tr>
                @if (count($data) >0)
                    @foreach ($data as $item)
                        <tr>
                            <td><img src="{{asset('images/' . $item->image)}}" width="75" height="75" alt="{{$item->customer_name}} Image "></td>
                            <td>{{$item->customer_name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->gender}}</td>
                           <td>
                           
                             <form action="{{ route('admin.destroy',$item->id) }}" method="Post">
                                <a href="{{ route('admin.show', $item->id) }}" class="btn btn-info btn-sm ">View</a>
                                <a href="{{ route('admin.edit',  $item->id) }}" class="btn btn-success btn-sm ">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                           </td>
                        </tr>
                        
                    @endforeach

                @else
                  <tr> <td class="text-center" colspan="5">No data Found</td></tr>  
                @endif
            </table>
            {!! $data-> links() !!}
        </div>
    </div>
@endsection('content')