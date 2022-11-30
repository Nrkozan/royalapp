@extends('layout')

@section('content')
    <div class="page-header">
        <div class="page-header-content container d-lg-flex">
            <div class="d-flex">
                <h4 class="page-title mb-0">
                    Book - <span class="fw-normal">List</span>
                </h4>

                <a href="#page_header" class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto" data-bs-toggle="collapse">
                    <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                </a>
            </div>

            <div class="collapse d-lg-block my-lg-auto ms-lg-auto" id="page_header">
                <div class="hstack gap-3 mb-3 mb-lg-0">
                    <a href="{{route('bookAdd')}}" type="button" class="btn btn-primary">
                        <i class="ph-plus-circle me-2"></i>
                        Add Book
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content container pt-0">



        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Book List</h5>
            </div>


            <div class="table-responsive">
                <table class="table table-xs">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Relase Date</th>
                        <th>ISBN</th>
                        <th>Format</th>
                        <th>Page</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($books['items'] as $book)
                    <tr>
                        <td>{{$book['id']}}</td>
                        <td>{{$book['title']}}</td>
                        <td>{{ \Carbon\Carbon::parse($book['release_date'])->format('d/m/Y')}}</td>
                        <td>{{ Str::limit($book['isbn'], 16, '...')}}</td>
                        <td>{{$book['format']}}</td>
                        <td>{{$book['number_of_pages']}}</td>
                        <td>
                            <a href="{{route('bookEdit', $book['id'])}}" class="alert alert-success p-1">Edit</a>
                            <a href="{{route('deleteBook', $book['id'])}}" class="alert alert-danger p-1">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    </div>


@endsection

