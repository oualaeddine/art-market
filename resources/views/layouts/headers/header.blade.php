<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather {{$header->icon}} bg-c-{{$header->color}}"></i>
                <div class="d-inline">
                    <h5>{{$header->name}}</h5>
                    <span>{{$header->text}}</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class=" breadcrumb breadcrumb-title breadcrumb-padding">
                    <li class="breadcrumb-item">
                        <a href="{{route('admin.home')}}"><i class="feather icon-home"></i></a>
                    </li>

                    @if (isset($breadcrumbs))

                        @foreach ($breadcrumbs as $item)
                        <li class="breadcrumb-item"><a href="{{$item['url']}}">{{$item['name']}}</a> </li>
                        @endforeach

                    @endif



                </ul>
            </div>
        </div>
    </div>
</div>
