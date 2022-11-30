@extends('layout')

@section('content')
    <div class="page-header">
        <div class="page-header-content container d-lg-flex">
            <div class="d-flex">
                <h4 class="page-title mb-0">
                    {{$author['first_name'].' '.$author['last_name']}} - <span class="fw-normal">#{{$author['id']}}</span>
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

        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0"><i class="ph-user me-1"></i> Author Detail</h6>
                    </div>

                    <p class="pe-3 ps-3 pt-2 pb-1">
                        {{$author['biography']}}
                    </p>

                    <ul class="list-group list-group-flush border-top">
                        <li class="list-group-item d-flex">
                            <span class="fw-semibold">First name:</span>
                            <div class="ms-auto">{{$author['first_name']}}</div>
                        </li>
                        <li class="list-group-item d-flex">
                            <span class="fw-semibold">Last name:</span>
                            <div class="ms-auto">{{$author['last_name']}}</div>
                        </li>
                        <li class="list-group-item d-flex">
                            <span class="fw-semibold">Birthday:</span>
                            <div class="ms-auto">{{ \Carbon\Carbon::parse($author['birthday'])->format('d.m.Y')  }}</div>
                        </li>
                        <li class="list-group-item d-flex">
                            <span class="fw-semibold">Gender:</span>
                            <div class="ms-auto">{{$author['gender']}}</div>
                        </li>
                        <li class="list-group-item d-flex">
                            <span class="fw-semibold">Place of Birth:</span>
                            <div class="ms-auto">{{$author['place_of_birth']}}</div>
                        </li>
                    </ul>

                    <div class="card-footer d-flex justify-content-between border-top">
                        @if(count($author['books']) != 0)
                            <span class="badge bg-warning bg-opacity-20 text-warning">
                               <i class="ph-warning"></i> This author cannot be deleted. First the books have to be removed
                            </span>
                        @else
                            <a href="{{route('deleteAtuhor',$author['id'])}}" class="text-danger fw-light"> <i class="ph-trash"></i> Delete Author</a>
                        @endif

                    </div>
                </div>
                <a href="{{route('authorEdit',$author['id'])}}" type="button" class="btn btn-success">
                    <i class="ph-pen me-2"></i>
                    Edit Author Profile
                </a>
            </div>
            <div class="col-md-7">
                <h6 class="mb-2"><i class="ph-book me-1"></i> Books</h6>
                @foreach($author['books'] as $book)
                    <div class="card">
                        <div class="card-body p-2 d-flex justify-content-between">
                           <div>
                               {{$book['title']}}
                           </div>
                            <div>
                                <span href="#" data-book="{{$book['id']}}" class="badge cursor-pointer deleteBook bg-danger bg-opacity-20 text-danger me-1">Delete Book</span>
                                <a href="#" class="badge bg-primary bg-opacity-20 text-primary">Goto Book</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        const swalInit = swal.mixin({
            buttonsStyling: false,
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-light',
                denyButton: 'btn btn-light',
                input: 'form-control'
            }
        });

        $('.deleteBook').click(function (){
            let bookID = $(this).data('book');
            swalInit.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                buttonsStyling: false,
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                }
            }).then(function(result) {
                if(result.value) {
                    swalInit.fire(
                        'Deleted!',
                        'The book is being deleted.',
                        'success'
                    );

                    axios.post('{{route('authorBookDelete')}}', {
                        bookID: bookID,
                    }).then(function (response) {
                        console.log(response);
                    }).catch(function (error) {
                        console.log(error);
                    });

                    $('.deleteBook[data-book="'+bookID+'"]').closest('.card').remove();
                }
                else if(result.dismiss === swal.DismissReason.cancel) {
                    swalInit.fire(
                        'Cancelled',
                        'The book is safe',
                        'error'
                    );
                }
            });
        });
    </script>


@endsection

