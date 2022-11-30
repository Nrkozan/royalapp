@extends('layout')

@section('content')
    <div class="page-header">
        <div class="page-header-content container d-lg-flex">
            <div class="d-flex">
                <h4 class="page-title mb-0">
                    Add New Author
                </h4>

                <a href="#page_header" class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto" data-bs-toggle="collapse">
                    <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                </a>
            </div>

            <div class="collapse d-lg-block my-lg-auto ms-lg-auto" id="page_header">
                <div class="hstack gap-3 mb-3 mb-lg-0">
                    <a href="{{route('home')}}" type="button" class="btn btn-light">
                        <i class="ph-caret-left me-2"></i>
                        Author List
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div class="content container pt-0">

        @if($errors->any())
            {!!  implode('', $errors->all('<div class="alert alert-danger p-1">:message</div>')) !!}
        @endif

        <form method="post" action="{{route('storeAuthor')}}" class="card">
            {{ csrf_field() }}
            <div class="card-body p-2 border-bottom">
                <div class="row ">
                    <label class="col-lg-2 col-form-label">Firt Name:</label>
                    <div class="col-lg-10">
                        <input required type="text" name="first_name" class="form-control" >
                    </div>
                </div>
            </div>
            <div class="card-body p-2 border-bottom">
                <div class="row ">
                    <label class="col-lg-2 col-form-label">Last Name:</label>
                    <div class="col-lg-10">
                        <input required type="text" name="last_name" class="form-control" >
                    </div>
                </div>
            </div>
            <div class="card-body p-2 border-bottom">
                <div class="row ">
                    <label class="col-lg-2 col-form-label">Birthday:</label>
                    <div class="col-lg-10">
                        <input type="datetime-local" class="form-control" name="birthday">
                    </div>
                </div>
            </div>
            <div class="card-body p-2 border-bottom">
                <div class="row ">
                    <label class="col-lg-2 col-form-label">Biography:</label>
                    <div class="col-lg-10">
                        <textarea name="biography" id="" cols="30" class="form-control" rows="3"></textarea>
                    </div>
                </div>
            </div>
            <div class="card-body p-2 border-bottom">
                <div class="row ">
                    <label class="col-lg-2 col-form-label">Gender:</label>
                    <div class="col-lg-10">
                        <div class="form-check-horizontal">
                            <label class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" value="male" name="gender" checked="">
                                <span class="form-check-label">Male</span>
                            </label>

                            <label class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" value="female" name="gender">
                                <span class="form-check-label">Female</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-2 border-bottom">
                <div class="row ">
                    <label class="col-lg-2 col-form-label">Place of Birth:</label>
                    <div class="col-lg-10">
                        <input required type="text" name="place_of_birth" class="form-control" >
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

