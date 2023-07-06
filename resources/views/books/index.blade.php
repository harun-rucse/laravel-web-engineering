@extends('layout.layout')

@section('title', 'All Books list')

@section('content')
    <div class="container-fluid">
        <div class="row py-1">
            <!-- Main section start -->
            <div class="row mt-3 d-flex justify-content-center">
                <div class="col-sm-12 col-lg-10">
                    <div class="card text-dark">
                        <div class="card-header bg-white fs-5 d-flex justify-content-between flex-column flex-sm-row">
                            <p><i class="bi bi-tag-fill"></i> All Books Information</p>
                            <div class="d-flex align-items-center gap-2">
                                <!-- Search form -->
                                <form action="{{ route('books.search') }}" method="POST"
                                    class="d-flex align-items-center gap-2">
                                    @csrf
                                    <input type="text" class="form-control" name="search" value="{{ $search }}" />
                                    <button type="submit" class="btn btn-primary btn-sm">Search</button>
                                </form>
                                <a href="{{ route('books.download') }}" class="btn btn-link">Download</a>
                            </div>
                        </div>

                        <div class="card-body">
                            <!-- Table start -->
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered mt-2">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Stock</th>
                                            <th>ISBN</th>
                                            <th>Price</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($books as $book)
                                            <tr>
                                                <td>{{ $book->id }}</td>
                                                <td>{{ $book->title }}</td>
                                                <td>{{ $book->author }}</td>
                                                <td>{{ $book->stock }}</td>
                                                <td>{{ $book->isbn }}</td>
                                                <td>{{ $book->price }}</td>

                                                <td class="d-flex align-items-center gap-4">
                                                    <!-- edit button -->
                                                    <a href="{{ route('books.edit', $book->id) }}"
                                                        class="btn btn-sm btn-primary">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>

                                                    <!-- delete button -->
                                                    <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')

                                                        <input type="hidden" name="id" value="{{ $book->id }}">
                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                            <i class="bi bi-trash-fill"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- Table end -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main section end -->
        </div>
    </div>
@endsection
