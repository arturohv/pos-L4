<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="glyphicon glyphicon-th-list"></i> Editor de Sub-Menus 
               <div class="pull-right">
                    <div class="btn-group">
                    
                    {{link_to("menus/$parent/createSubMenu", 'Nuevo', $attributes = array('Class'=>'btn btn-default btn-xs'), $secure = null);}}                                    
                    
                    </div>
                </div>       
            </div>
                 
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-6 col-lg-offset-3"> 
                        <div class="table-responsive">
                            @if (Session::has('message'))
                                <div class="alert alert-info">{{ Session::get('message') }}</div>
                            @endif
                            <table class="table table-hover table-striped" id="lista">
                                <thead>
                                    <tr>
                                    	<th>Elemento</th>                                        
                                        <th>Ruta</th>
                                        <th>Orden</th>                                         
                                        <th></th>                                         
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($menus as $menu)
                                    <tr>
                                         
                                        <td>{{ $menu->name }}</td>
                                        <td>{{ $menu->url }}</td>
                                        <td>{{ $menu->index }}</td>
                                        <td>
                                        

                                        {{link_to("menus/$menu->id/show", '', $attributes = array('Class'=>'btn btn-default btn-xs glyphicon glyphicon-eye-open'), $secure = null);}}

                                        {{link_to("menus/$menu->id/edit", '', $attributes = array('Class'=>'btn btn-default btn-xs glyphicon glyphicon-pencil'), $secure = null);}}

                                        {{link_to("menus/$menu->id/delete", '', $attributes = array('Class'=>'btn btn-default btn-xs glyphicon glyphicon-trash'), $secure = null);}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{link_to("menus", 'Regresar', $attributes = array('Class'=>'btn btn-default'), $secure = null);}}   
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                </div>             
            </div>                    
        </div>
    </div>
</div>
