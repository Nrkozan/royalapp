@extends('layout')

@section('content')



    <div class="content container pt-4">
       <div class="row d-flex justify-content-center">
           <div class="col-md-5">
               <h2 class="">Profile</h2>
               <div class="card">
                   <table class="table table-sm">
                       <tr>
                           <td style="width: 33%;">First Name</td>
                           <td>{{$user['first_name']}}</td>
                       </tr>
                       <tr>
                           <td>Last Name</td>
                           <td>{{$user['last_name']}}</td>
                       </tr>
                       <tr>
                           <td>Email</td>
                           <td>{{$user['email']}}</td>
                       </tr>
                       <tr>
                           <td>Gender</td>
                           <td>{{$user['gender']}}</td>
                       </tr>
                       <tr>
                           <td>Email Confirmed</td>
                           <td>
                               @if($user['email_confirmed'])
                                   <span class="badge bg-success">Yes</span>
                               @else
                                   <span class="badge bg-danger">No</span>
                               @endif
                           </td>
                       </tr>
                   </table>
               </div>
           </div>
       </div>
    </div>




@endsection

