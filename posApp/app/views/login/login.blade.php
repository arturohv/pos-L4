<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="">
		<title>Iniciar Sesión</title>
		 <!-- Bootstrap Core CSS -->    
	    {{HTML::style('bootstrap/css/bootstrap.min.css')}}
	</head>
	<body>
		<div class="container">    
		    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
		        <div class="panel panel-info" >
		            <div class="panel-heading">
		            	<div class="panel-title">Introduzca sus Credenciales</div>                        
		            </div>     

		            <div style="padding-top:30px" class="panel-body" >

		            	<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>                     
		                {{ Form::open(array('url'=>'users/signin', 'class'=>'form-signin')) }}         
		                    <div style="margin-bottom: 25px" class="input-group">
		                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>                                       
		                        {{ Form::text('username', null, array('class'=>'form-control', 'placeholder'=>'Nombre de Usuario')) }}                                        
		                    </div>
		                                
		                   	<div style="margin-bottom: 25px" class="input-group">
		                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
		                        {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Contraseña')) }}
		                    </div>

		                    <div style="margin-top:10px" class="form-group">
		                    <!-- Button -->
		                         <div class="col-sm-12 controls">                                      
		                         {{ Form::submit('Ingresar', array('class'=>'btn btn-success'))}}                                      
		                         </div>
		                    </div>


		                                
		                {{ Form::close() }}   



		             </div>                     
		        </div>  
		     </div>	        
		</div>
	</body>
</html>





