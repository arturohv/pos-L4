<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="glyphicon glyphicon-pencil"> <strong>Editar</strong></i>               
            </div>
             {{ Form::open(array('url' => "persons/$person->id/update")) }}               
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3">

                        <div class="form-group">
                            {{ Form::label('personType', 'Tipo de Identificacion') }}
                            {{ Form::select('personType', $personTypes, $person->person_type_id, array('class' => 'form-control')) }}            
                                             
                        </div>               
                       
                        <div class="form-group">
                            {{ Form::label('nip', 'Identificación') }}                       
                            {{Form::text('nip', $person->nip, array('class' => 'form-control', 'required' => 'true'))}}              
                        </div>

                        <div class="form-group">
                            {{ Form::label('firstName', 'Nombre') }}                       
                            {{Form::text('firstName', $person->first_name, array('class' => 'form-control', 'required' => 'true'))}}         
                        </div>

                        <div class="form-group">
                            {{ Form::label('lastName', 'Apellidos') }}                       
                            {{Form::text('lastName', $person->last_name, array('class' => 'form-control'))}}         
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