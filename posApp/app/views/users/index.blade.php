<div class="row">

    <div class="col-lg-12"> 

    <div class="pull-right">
        <div class="btn-group">
            {{link_to("users/create", 'Nuevo', $attributes = array('Class'=>'btn btn-default'), $secure = null);}}                                    
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
                                        <th>Usuario</th>
                                        <th>Nombre</th>
                                        <th>Active</th>
                                        <th>Administrador</th>
                                                                      
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>                                         
                                        <td>{{ $user->user_name }}</td>
                                        <td>{{ $user->person->last_name }}
                                            {{ $user->person->first_name }}
                                        </td>
                                        <td>
                                            {{ Form::checkbox('is_active',1,$user->is_active,array('disabled' => 'disabled')) }}
                                        </td>
                                        <td>
                                            {{ Form::checkbox('is_admin',2,$user->is_admin,array('disabled' => 'disabled')) }}
                                        </td>
                                        <td>
                                        {{link_to("users/$user->id/show", '', $attributes = array('Class'=>'btn btn-default btn-xs glyphicon glyphicon-eye-open'), $secure = null);}}

                                        {{link_to("users/$user->id/edit", '', $attributes = array('Class'=>'btn btn-default btn-xs glyphicon glyphicon-pencil'), $secure = null);}}

                                        {{link_to("users/$user->id/delete", '', $attributes = array('Class'=>'btn btn-default btn-xs glyphicon glyphicon-trash'), $secure = null);}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $users->links() }}
                        </div>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                </div>             
            </div>                    
        </div>
    </div>
</div>
