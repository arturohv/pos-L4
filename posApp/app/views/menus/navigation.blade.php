<li>
  <a class="active" href="/"><i class="fa fa-dashboard fa-fw"></i>Inicio</a>
</li>
  <div class="row nav">
    <ul class="nav nav-pills">
      @foreach($menus as $item)        
        @if(isset($item->url))
          <li>
            <a href="{{ $item->url }}">{{ $item->name }}</a>
          </li>
        @elseif($item->num_children > 0)
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
              {{ $item->name }} <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              @foreach($menus as $subItem)
                @if($subItem->parent_id == $item->id)
                  @if(isset($subItem->url))
                    <li>
                      <a href="{{ $subItem->url }}">{{ $subItem->name }}</a>
                    </li>                
                  @endif
                @endif
              @endforeach
            </ul>
          </li>
        @endif
      @endforeach
    </ul>
  </div>
 
