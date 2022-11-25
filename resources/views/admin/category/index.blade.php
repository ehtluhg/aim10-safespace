@extends('layouts.master')
@section('title', 'Category')

@section('content')
<div class="row ">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                @if(session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                <h3 class="card-title">Category</h3>
                <br>
                <a role="button" class="btn btn-success" href="{{ url('admin/add-category') }}">+ Add Category</a>
                <div class="table-responsive">
                    <br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"> ID </th>
                                <th scope="col"> Name </th>
                                <th scope="col-2"> Description </th>
                                <th scope="col"> Image </th>
                                <th scope="col"> Status </th>
                                <th scope="col"> Created By </th>
                                <th scope="col"> Created At </th>
                                <th scope="col"> Updated At </th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $item)
                            <tr>
                                <td scope="row">{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td class="text-wrap">
                                    <div>
                                        {{ $item->description }}
                                    </div>
                                </td>
                                <td>
                                    <img src="{{ asset('uploads/category/' . $item->image) }}" width="50px" height="50px" />
                                </td>
                                <td>
                                    {{ $item->status == 1 ? 'Approved' : 'Pending' }}
                                </td>
                                <td>{{ $item->created_by }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->updated_at }}</td>
                                <td> <a role="button" href="{{ url('admin/edit-category/' . $item->id) }}" name="view"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square text-light" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg></a></td>
                                <td> <a onclick="return confirm('Do you want to delete this category?');" role="button" href="{{ url('admin/delete-category/' . $item->id) }}" name="delete"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash text-danger" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                        </svg></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection