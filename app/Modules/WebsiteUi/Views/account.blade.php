@extends('website.app')

@section('content')

    <style>
        .select .list{
            max-height: 15rem;
            overflow-y: scroll
        }

    </style>
    <div class="outer__inner">

        <div class="profile pt-10 pb-25">
            <div class="container">
                <div class="row justify-content-start">

                    <x-profile-tabs-card :client="$client" :tab="$tab"/>

                    @if($tab =='account')
                        <x-edit-profile-card :client="$client" :wilayas="$wilayas"/>

                    @else
                        <x-order-history-card :client="$client" />
                    @endif

                </div>
            </div>
        </div>

    </div>
    @vite(['resources/js/wilaya.js'])
@endsection
