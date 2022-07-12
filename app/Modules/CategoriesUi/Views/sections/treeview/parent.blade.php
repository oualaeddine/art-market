<li id="{{$item->id}}" data-node_depth="{{$i}}" >{{$item->name_fr}}
    <ul>
        @foreach ($item->sub_categories as $item)
            @php
                $i++;
                $is_sub=true;
            @endphp
            @include('CategoriesUi::sections.treeview.parent', $item)
        @endforeach
    </ul>
</li>

