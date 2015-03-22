<div class="row">

    <div class="col-lg-12"> 
             
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
                                            {{link_to("users/$person->id/select", '', $attributes = array('Class'=>'btn btn-default btn-xs glyphicon glyphicon-chevron-right'), $secure = null);}}
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
