<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="glyphicon glyphicon-eye-open"> <strong>Detalle</strong></i>               
            </div>
                 
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-12">  
                            <div class="table-responsive">
                                <table class="table table-condesed table-bordered">
                                    <tr>
                                    <td><strong>Identificación:</strong></td>
                                    <td>{{$person->nip}}</td>
                                    </tr>

                                    <tr>
                                    <td><strong>Tipo de Identificación:</strong></td>
                                    <td>{{$person->personType->person_type_name}}</td>
                                    </tr>

                                    <tr>
                                    <td><strong>Nombre Completo:</strong></td>
                                    <td>{{$person->first_name}} {{$person->last_name}}</td>
                                    </tr>                                                    
                                </table>

                            </div>
                            {{link_to("persons/$person->id/edit", 'Editar', $attributes = array('Class'=>'btn btn-default'), $secure = null);}}

                            {{link_to("persons", 'Cancelar', $attributes = array('Class'=>'btn btn-default'), $secure = null);}}   
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                </div>             
            </div>                    
        </div>
    </div>
</div>