<li>
	<a class="active" href="/"><i class="fa fa-dashboard fa-fw"></i>Inicio</a>
</li>
@foreach ($menus as $menu)
<li>    
    	@if (is_null($menu->parent_id))    	
    		<a href="#"><i class="glyphicon glyphicon-asterisk"></i> {{ $menu->name }}<span class="fa arrow"></span></a>   	
			<ul class="nav nav-second-level">
			@foreach ($menus as $sbm)
				@if ($sbm->parent_id == $menu->id)
				<ul class="nav nav-second-level">
					@if ($sbm->num_children > 0)					
						<li><a href="#"><i class="glyphicon glyphicon-asterisk"></i> {{ $sbm->name }}<span class="fa arrow"></span></a></li> 
						<ul class="nav nav-second-level">
						@foreach ($menus as $sbc)
							@if ($sbc->parent_id == $sbm->id)
								<li><a href={{ URL::to('/'.$sbc->url) }}>{{$sbc->name}}</a></li>
							@endif
						@endforeach
					</ul>
					@else
						<li><a href={{ URL::to('/'.$sbm->url) }}>{{$sbm->name}}</a></li>
					</ul>		
					@endif
				 @endif

			@endforeach
			</ul>
		@else
		
						
				          
	    	
        @endif
       

</li>   
@endforeach





                            