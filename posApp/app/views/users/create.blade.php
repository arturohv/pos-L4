<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fglyphicon glyphicon-plus"></i> 
            </div>
            {{ HTML::ul($errors->all()) }}
            {{ Form::open(array('url' => 'users')) }}     
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3">              
                       

                        {{Form::hidden('id',$person->id)}}

                        <div class="form-group">
                            {{ Form::label('nip', 'Identificacion') }}                                
                            {{Form::text('nip', $person->nip, array('class' => 'form-control input-xlarge', 'required' => 'true', 'disabled' => 'disabled'))}}              
                        </div>

                        <div class="form-group">
                            {{ Form::label('fullname', 'Nombre Completo') }}                                
                            {{Form::text('fullname', $person->first_name . ' '. $person->last_name, array('class' => 'form-control input-xlarge', 'required' => 'true', 'disabled' => 'disabled'))}}              
                        </div>    

                        <div class="form-group">
                            {{ Form::label('user_name', 'Nombre de Usuario') }}                                
                            {{Form::text('user_name', Input::old('user_name'), array('class' => 'form-control input-xlarge', 'required' => 'true'))}}              
                        </div>

                        <div class="form-group">
                            {{ Form::label('email', 'Correo Electronico') }}                                
                            {{Form::email('email', Input::old('email'), array('class' => 'form-control input-xlarge', 'required' => 'true'))}}                     
                        </div>

                        <div class="form-group">
                            {{ Form::label('password', 'Contrasena') }}              
                            {{ Form::password('password', array('class'=>'form-control', 'required' => 'true')) }}                     
                        </div>

                        <div class="form-group">
                            {{ Form::checkbox('is_active') }}
                            {{ Form::label('is_active', 'Activo') }}              
                            
                        </div>

                        <div class="form-group">
                            {{ Form::checkbox('is_admin') }}
                            {{ Form::label('is_admin', 'Administrador') }}              
                            
                      
                        </div>
                                  
                
                        {{Form::submit('Guardar', array('Class'=>'btn btn-default'))}} 
                        {{link_to("users", 'Cancelar', $attributes = array('Class'=>'btn btn-default'), $secure = null);}}   
                    </div>
                 </div> 
            </div>
            </div>
            {{ Form::close() }}
        </div>             
    </div>                    
</div>
