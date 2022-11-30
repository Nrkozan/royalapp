@extends('layout')

@section('content')
    <div class="page-header">
        <div class="page-header-content container d-lg-flex">
            <div class="d-flex">
                <h4 class="page-title mb-0">
                   Add New Book
                </h4>

                <a href="#page_header" class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto" data-bs-toggle="collapse">
                    <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                </a>
            </div>

            <div class="collapse d-lg-block my-lg-auto ms-lg-auto" id="page_header">
                <div class="hstack gap-3 mb-3 mb-lg-0">
                    <a href="{{route('books')}}" type="button" class="btn btn-light">
                        <i class="ph-caret-left me-2"></i>
                        Book List
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div class="content container pt-0">

        @if($errors->any())
            {!!  implode('', $errors->all('<div class="alert alert-danger p-1">:message</div>')) !!}
        @endif

        <form method="post" action="{{route('storeBook')}}" class="card">
            {{ csrf_field() }}
            <div class="card-body p-2 border-bottom">
                <div class="row ">
                    <label class="col-lg-2 col-form-label">Title:</label>
                    <div class="col-lg-10">
                        <input required type="text" name="title" class="form-control" >
                    </div>
                </div>
            </div>
            <div class="card-body p-2 border-bottom">
                <div class="row ">
                    <label class="col-lg-2 col-form-label">Authors:</label>
                    <div class="col-lg-10">
                        <select required name="author" class="form-control" id="">
                            <option value="">
                                Select Author
                            </option>
                            @foreach($authors['items'] as $author)
                                <option value="{{$author['id']}}">{{$author['first_name'].' '.$author['last_name']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-body p-2 border-bottom">
                <div class="row ">
                    <label class="col-lg-2 col-form-label">Relase Date:</label>
                    <div class="col-lg-10">
                        <input required type="datetime-local" name="release_date" class="form-control" >
                    </div>
                </div>
            </div>
            <div class="card-body p-2 border-bottom">
                <div class="row ">
                    <label class="col-lg-2 col-form-label">Description:</label>
                    <div class="col-lg-10">
                        <textarea required name="description" class="form-control" id="" cols="30" rows="4"></textarea>
                    </div>
                </div>
            </div>
            <div class="card-body p-2 border-bottom">
                <div class="row ">
                    <label class="col-lg-2 col-form-label">ISBN:</label>
                    <div class="col-lg-10">
                        <input required type="text" name="isbn" class="form-control" id="mask_isbn">
                    </div>
                </div>
            </div>
            <div class="card-body p-2 border-bottom">
                <div class="row ">
                    <label class="col-lg-2 col-form-label">Format:</label>
                    <div class="col-lg-10">
                        <input required type="text" name="format" class="form-control" >
                    </div>
                </div>
            </div>
            <div class="card-body p-2 border-bottom">
                <div class="row ">
                    <label class="col-lg-2 col-form-label">Number of pages:</label>
                    <div class="col-lg-10">
                        <input required type="number" min="1" step="1" name="number_of_pages" class="form-control" >
                    </div>
                </div>
            </div>
            <div class="card-body p-2 d-flex justify-content-end">
                <button class="btn btn-success fw-bold">
                    Save
                </button>
            </div>
        </form>
    </div>




@endsection

