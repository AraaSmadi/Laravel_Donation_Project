@extends('layout.main')
@section('title')
    Home
@endsection
@section('content')
   <!-- Page Header Start -->
   <div class="container-fluid page-header py-6 my-6 mt-0 wow fadeIn" data-wow-delay="0.1s" />
    <div class="container text-center">
        <h1 class="display-4 text-white animated slideInDown mb-4"></h1>
        <nav aria-label="breadcrumb animated slideInDown">

        </nav>
    </div>
</div>
</div>
<div class="container">
<!-- Page Header End -->
<div class="container-xxl py-6">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-6 mb-4">Donors information</h1>
        </div>
        <h6 class="mt-2">Donors Number :  {{$c}}</h6>

</div>
<table class="table">
    <thead class="bg-light">
      <tr>
        <th scope="col">Name</th>
        <th scope="col">City</th>
        <th scope="col">Phone</th>
        <th scope="col">Email</th>
      </tr>
    </thead>
    <tbody>
        {{-- A+ --}}
        @foreach ($A[0] as $value)
      <tr>
        <td scope="row">
         {{$value->b_d_name}}
        </td>
        <td scope="row">
            {{$value->b_d_address}}
        </td>
        <td scope="row">
            {{$value->b_d_phone}}
        </td>
        <td scope="row">
             {{$value->b_d_email}}
        </td>

      </tr>
      @endforeach
      {{-- A- --}}
      @foreach ($A[1] as $value)
      <tr>
        <td scope="row">
         {{$value->b_d_name}}
        </td>
        <td scope="row">
            {{$value->b_d_address}}
        </td>
        <td scope="row">
            {{$value->b_d_phone}}
        </td>
        <td scope="row">
             {{$value->b_d_email}}
        </td>

      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>
@endsection