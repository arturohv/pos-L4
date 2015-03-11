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
                <i class="glyphicon glyphicon-th-list"></i>               
            </div>
                 
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-12"> 
                        <div class="table-responsive">
                            @if (Session::has('message'))
                                <div class="alert alert-info">{{ Session::get('message') }}</div>
                            @endif
                            <table class="table table-hover table-striped table-condensed">
                                <thead>
                                    <tr>                                        
                                        <th>Nip</th>
                                        <th>Apellidos</th>
                                        <th>Nombre</th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($persons as $person)
                                    <tr>                                         
                                        <td>{{ $person->nip }}</td>
                                        <td>{{ $person->last_name }}</td>
                                        <td>{{ $person->first_name }}</td>
                                        <td>
                                        {{link_to("persons/$person->id/show", '', $attributes = array('Class'=>'btn btn-default btn-xs glyphicon glyphicon-eye-open'), $secure = null);}}

                                        {{link_to("persons/$person->id/edit", '', $attributes = array('Class'=>'btn btn-default btn-xs glyphicon glyphicon-pencil'), $secure = null);}}

                                        {{link_to("persons/$person->id/delete", '', $attributes = array('Class'=>'btn btn-default btn-xs glyphicon glyphicon-trash'), $secure = null);}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
