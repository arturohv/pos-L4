<div class="row">

    <div class="col-lg-12">
        <div class="pull-right">
            <div class="btn-group">
               {{link_to("users", 'Cancelar', $attributes = array('Class'=>'btn btn-default'), $secure = null);}}                                 
            </div>
        </div>  
        </br>
        </br>       
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

                            <!--div class="table-responsive"-->
                            <table id="myTable" class="table table-condensed table-hover table-striped display">
                                <thead>
                                    <tr>
                                        <th>Identificacion</th>                                   
                                        <th>Nombre Completo</th>                                    
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($persons as $person)
                                        <tr>                                         
                                            <td>{{ $person->nip }}</td>
                                            <td>{{ $person->last_name }} {{ $person->first_name }}</td>
                                            
                                            <td>
                                             {{link_to("users/$person->id/select", '', $attributes = array('Class'=>'btn btn-default btn-xs glyphicon glyphicon-chevron-right'), $secure = null);}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>                                
                        </div>
                        
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                </div>             
            </div>                    
        </div>
    </div>
</div>
