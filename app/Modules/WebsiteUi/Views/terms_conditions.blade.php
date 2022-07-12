@extends('website.layouts.master')

@section('content')


    <div class="page-container p-5 ">
        <div class="container card  p-5 ">

        <!-- Contact Us Area -->
        <section class="terms-area panel panel">
            {!! $terms->value !!}
        </section>
        <!-- End Contact Us Area -->

    </div>
</div>

@endsection
