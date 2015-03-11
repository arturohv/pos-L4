<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fglyphicon glyphicon-plus"></i> 
            </div>
            {{ HTML::ul($errors->all()) }}
            {{ Form::open(array('url' => 'persons')) }}     
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3">              
                       
                        <div class="form-group">
                            {{ Form::label('identificacion', 'Identificación') }}                                
                            {{Form::text('nip', Input::old('nip'), array('class' => 'form-control input-xlarge', 'required' => 'true'))}}              
                        </div>

                        <div class="form-group">
                            {{ Form::label('firstName', 'Nombre') }}                                
                            {{Form::text('firstName', Input::old('firstName'), array('class' => 'form-control input-xlarge', 'required' => 'true'))}}                     
                        </div>

                        <div class="form-group">
                            {{ Form::label('lastName', 'Apellidos') }}              
                            {{Form::text('lastName', Input::old('lastName'), array('class' => 'form-control input-xlarge', 'required' => 'true'))}}                     
                        </div>

                                  
                
                        {{Form::submit('Guardar', array('Class'=>'btn btn-default'))}} 
                        {{link_to("persons", 'Cancelar', $attributes = array('Class'=>'btn btn-default'), $secure = null);}}   
                    </div>
                 </div> 
            </div>
            </div>
            {{ Form::close() }}
        </div>             
    </div>                    
</div>
