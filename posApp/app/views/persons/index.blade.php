<div class="row">

    <div class="col-lg-12"> 

    <div class="pull-right">
        <div class="btn-group">
            {{link_to("persons/create", 'Nuevo', $attributes = array('Class'=>'btn btn-default'), $secure = null);}}                                    
        </div>
    </div> 
    <br> 
    <br>            
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="glyphicon glyphicon-th-list"> <strong>Lista</strong></i>               
            </div>
                 
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-12"> 
                        <div class="table-responsive">
                            @if (Session::has('message'))
                                <div class="alert alert-info">{{ Session::get('message') }}</div>
                            @endif


                            
                    <!--div class="table-responsive"-->
                        <table class="table table-condensed table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Identificacion</th>
                                    <th>Nombre</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($persons as $person)
                                    <tr>                                         
                                        <td>{{ $person->nip }}</td>
                                        <td>{{ $person->last_name }} {{ $person->first_name }}</td>
                                        <td>
                                        {{link_to("persons/$person->id/show", '', $attributes = array('Class'=>'btn btn-default btn-xs glyphicon glyphicon-eye-open'), $secure = null);}}

                                        {{link_to("persons/$person->id/edit", '', $attributes = array('Class'=>'btn btn-default btn-xs glyphicon glyphicon-pencil'), $secure = null);}}

                                        {{link_to("persons/$person->id/delete", '', $attributes = array('Class'=>'btn btn-default btn-xs glyphicon glyphicon-trash'), $secure = null);}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    <!--/div-->
                

                                         
                             
                        {{ $persons->links() }}
                        </div>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                </div>             
            </div>                    
        </div>
    </div>
</div>

