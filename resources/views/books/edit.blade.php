@extends('layout.layout')

@section('title', 'Update a Book')

@section('content')
    <div class="container">
        <div class="row pt-5 d-flex justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="fs-6 text-primary">
                            <i class="bi bi-file-earmark-plus-fill"></i>
                            <span>Udate a book</span>
                        </h3>
                    </div>
                    <div class="card-body">
                        {{-- Error message --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li class="">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('books.update', $book->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <input type="text" name="title" class="form-control p-2" placeholder="Title"
                                    value="{{ $book->title }}" />
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" name="author" class="form-control p-2" placeholder="Author"
                                    value="{{ $book->author }}" />
                            </div>
                            <div class="form-group mb-3">
                                <input type="number" min=0 name="stock" class="form-control p-2" placeholder="Stock"
                                    value="{{ $book->stock }}" />
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" name="isbn" class="form-control p-2" placeholder="ISBN"
                                    value="{{ $book->isbn }}" />
                            </div>
                            <div class="form-group">
                                <input type="number" name="price" class="form-control p-2" placeholder="Price"
                                    value="{{ $book->price }}" />
                            </div>
                            <button type="submit" class="btn btn-info col-12 mt-3 p-2">
                                <i class="bi bi-plus-circle"></i>
                                <span class="fw-bold fs-6">Update</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
