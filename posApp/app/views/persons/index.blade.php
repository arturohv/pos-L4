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


                            <div class="col-md-9">
                    <button id="append" type="button" class="btn btn-default">Append</button>
                    <button id="clear" type="button" class="btn btn-default">Clear</button>
                    <button id="removeSelected" type="button" class="btn btn-default">Remove Selected</button>
                    <button id="destroy" type="button" class="btn btn-default">Destroy</button>
                    <button id="init" type="button" class="btn btn-default">Init</button>
                    <!--div class="table-responsive"-->
                        <table id="grid" class="table table-condensed table-hover table-striped" data-selection="true" data-multi-select="true" data-row-select="true" data-keep-selection="true">
                            <thead>
                                <tr>
                                    <th data-column-id="id" data-identifier="true" data-type="numeric" data-align="right">ID</th>
                                    <th data-column-id="sender" data-order="asc" data-align="center" data-header-align="center">Sender</th>
                                    <th data-column-id="received" data-css-class="cell" data-header-css-class="column" data-filterable="true">Received</th>
                                    <th data-column-id="link" data-formatter="link" data-sortable="false">Link</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>me@rafaelstaib.com</td>
                                    <td>11.12.2014</td>
                                    <td>Link</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>me@rafaelstaib.com</td>
                                    <td>12.12.2014</td>
                                    <td>Link</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>me@rafaelstaib.com</td>
                                    <td>10.12.2014</td>
                                    <td>Link</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>mo@rafaelstaib.com</td>
                                    <td>12.08.2014</td>
                                    <td>Link</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>ma@rafaelstaib.com</td>
                                    <td>12.06.2014</td>
                                    <td>Link</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>me@rafaelstaib.com</td>
                                    <td>12.12.2014</td>
                                    <td>Link</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>ma@rafaelstaib.com</td>
                                    <td>12.11.2014</td>
                                    <td>Link</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>mo@rafaelstaib.com</td>
                                    <td>15.12.2014</td>
                                    <td>Link</td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>me@rafaelstaib.com</td>
                                    <td>24.12.2014</td>
                                    <td>Link</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>ma@rafaelstaib.com</td>
                                    <td>14.12.2014</td>
                                    <td>Link</td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td>mo@rafaelstaib.com</td>
                                    <td>12.12.2014</td>
                                    <td>Link</td>
                                </tr>
                            </tbody>
                        </table>
                    <!--/div-->
                </div>

                                         
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

<!-- Custom Theme BootGrid -->
    {{HTML::script('bootstrap/js/jquery.bootgrid.js')}}