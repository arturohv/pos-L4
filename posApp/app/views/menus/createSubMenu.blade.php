@foreach($subMenu as $sub)
@endforeach
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="glyphicon glyphicon-plus"></i> Agregar nuevo elemento hijo a: <strong>{{ $sub->name }}</strong> Orden({{ $sub->index }})               
            </div>
            {{ HTML::ul($errors->all()) }}
            {{ Form::open(array('url' => 'menus')) }}     
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3">              
                        
                        <div class="form-group">                                                    
                            {{ Form::hidden('parent_id', $sub->id) }}                         
                        </div>                       

                        <div class="form-group">
                            {{ Form::label('name', 'Nombre') }}                                
                            {{Form::text('name', Input::old('name'), array('class' => 'form-control input-xlarge', 'required' => 'true'))}}                         
                        </div>

                         <div class="form-group">
                            {{ Form::label('url', 'Ruta Simple') }}                                
                            {{Form::text('url', Input::old('url'), array('class' => 'form-control input-xlarge', 'required' => 'true'))}}                         
                        </div>

                        <div class="form-group">
                            {{ Form::label('description', 'Descripción') }}                         
                            {{Form::textarea('description', Input::old('description'), array('class' => 'form-control input-xlarge', 'required' => 'true','rows'=>'3'))}} 
                        </div>

                        <div class="form-group">                                              
                            {{Form::checkbox('is_visible', Input::old('is_visible'), array('class' => 'form-control input-xlarge', 'required' => 'true'))}} 
                            {{ Form::label('is_visible', 'Es Visible') }}                        
                        </div>         

                        <div class="form-group">
                            {{ Form::label('index', 'Orden') }}                         
                            {{Form::number('index', Input::old('index'), array('class' => 'form-control input-xlarge', 'required' => 'true'))}}              
                        </div>
                
                        {{Form::submit('Guardar', array('Class'=>'btn btn-default'))}} 
                        
                        {{link_to("menus/$sub->id/subIndex", 'Cancelar', $attributes = array('Class'=>'btn btn-default'), $secure = null);}}     
                    </div>
                 </div> 
            </div>
            </div>
            {{ Form::close() }}
        </div>             
    </div>                    
</div>
