@extends('layout')

@section('content')
    <div class="page-header">
        <div class="page-header-content container d-lg-flex">
            <div class="d-flex">
                <h4 class="page-title mb-0">
                    Authors - <span class="fw-normal">List</span>
                </h4>

                <a href="#page_header" class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto" data-bs-toggle="collapse">
                    <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                </a>
            </div>

            <div class="collapse d-lg-block my-lg-auto ms-lg-auto" id="page_header">
                <div class="hstack gap-3 mb-3 mb-lg-0">
                    <a href="{{route('authorAdd')}}" type="button" class="btn btn-primary">
                        <i class="ph-user-circle-plus me-2"></i>
                        Add New Author
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content container pt-0">
      <div class="d-flex w-100 w-md-25">
          <input type="text" class="form-control mb-2" placeholder="Search a author..." id="search">
      </div>
        <div class="row" id="authorList">
            @foreach($authors['items'] as $author)
                <div class="col-md-6 author">
                    <div class="card">
                        <div class="card-body p-2 d-flex justify-content-between">
                            <div class="d-flex flex-row">
                                <div class="my-auto text-center d-none d-md-block  @if($author['gender'] == 'female') bg-pink @else bg-primary @endif rounded-circle p-1">
                                    <i class="fas fa-{{$author['gender']}} text-white"></i>
                                </div>
                                <div class="d-flex flex-column ps-2">
                                    <div>
                                        <span class="fw-light fs-base">#{{$author['id']}}</span>
                                        <span class="fw-bold">{{$author['first_name'].' '.$author['last_name']}}</span>
                                    </div>
                                    <div>
                                        <span>{{$author['place_of_birth']}}</span>
                                        <span class="fw-light">{{\Carbon\Carbon::parse($author['birthday'])->format('d.m.Y')}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="my-auto">
                                <a href="{{route('author',$author['id'])}}" type="button" class="btn btn-light">
                                    <i class="ph-pen me-2"></i>
                                     Edit
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


    </div>

    <script>
        //search a author
        $(document).ready(function(){
            $("#search").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#authorList .author").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>

@endsection

