@extends('layouts.app')
@section('content')
    <div class="row m-5">
        <div class="col-md-4">
            <h3>Add ticket category</h3>
            <form action="{{ route('ticketCategory.store') }}" method="POST">
                @csrf
                <div class="form-group mb-4">
                    <label class="form-label" for="category">Category</label>
                    <input class="form-control" name="category" type="text" class="form-control" id="category"
                        value="{{ old('category') }}" placeholder="Example input">
                    @error('category')
                        <x-alerts :warning='true' :message='$message' />
                    @enderror
                    <div class="d-grid gap-2 mx-auto mt-3">
                        <button type="submit" class=" btn btn-primary btn-lg">Add ticket category</button>
                    </div>
                </div>
            </form>
            @if (session('success'))
                <x-alerts :warning='false' :message="session('success')" />
            @endif
        </div>

        <div class="col-md-6">


            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Created_at</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ticketCategories as $ticketCategory)
                        <tr>
                            <td>{{ $ticketCategory->id }}</td>
                            <td>{{ $ticketCategory->category }}</td>
                            <td>{{ $ticketCategory->created_at->diffForHumans() }}</td>
                            <td>
                                <form class="col-md-6" action="{{ route('ticketCategory.destroy', $ticketCategory->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
