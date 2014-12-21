<li>
	<a class="active" href="/"><i class="fa fa-dashboard fa-fw"></i>Inicio</a>
</li>
@foreach ($menus as $menu)
<li>    
    	@if (is_null($menu->parent_id))    	
    		<a title="tooltip" href="#"><i class="glyphicon glyphicon-asterisk"></i> {{ $menu->name }}<span class="fa arrow"></span></a>   	
		@endif
		 <ul class="nav nav-second-level">
			@foreach ($menus as $subMenu)
				@if ($subMenu->parent_id == $menu->id)
					<li><a href={{ URL::to('/'.$subMenu->url) }}>{{$subMenu->name}}</a></li>
				@endif
	    	@endforeach                     
        </ul>        
</li>   
@endforeach


                            