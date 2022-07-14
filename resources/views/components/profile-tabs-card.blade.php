<div class="col-md-3">

    <div class="user">
        <div class="user__header d-flex align-items-center mb-8">
            <div class="user__avatar"><img src="{{asset($client->avatar??"/website/images/content/avatar-big.jpg")}}" alt="Avatar"></div>
            <div class="user__name">{{$client->last_name.' '.$client->first_name}} <span class="badge badge-pill badge-success white-text">{{__("verifeid account")}}</span></div>
        </div>

        <div class="user__links">
            <a class="active" href="#"><span class="user__links__texts"><i class="fal fa-cog"></i> {{__("Account settings")}}</span></a>
            <a href="#"><span class="user__links__texts"><i class="fal fa-list-alt"></i> {{__("Your orders")}}</span> <span class="badge badge-pill badge-primary">{{$client->orders_count}}</span></a>
            <a class="signout" href="javascript:void(0)" onclick="document.getElementById('logout-form').submit();"><span>{{__("Sign Out")}}</span></a>

        </div>


    </div>

    <form action="{{route('client.logout.action')}}" method="POST" id="logout-form">
        @csrf
    </form>
</div>
