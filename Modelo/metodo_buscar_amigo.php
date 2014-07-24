<script type="text/javascript">
	$(document).ready(function(){
    	var consult;
        $("#busqueda").focus();
        $("#busqueda").keyup(function(e){
        	consult = $("#busqueda").val();
            $.ajax({url:"../Modelo/buscar_amigo.php", cache:false,type:"POST",
				data:{consulta:consult},
				success:function(result){
      				$("#resultado").html(result);
	   			},
				error: function(){
                          alert("error petici�n");
                }
//                ,
//	  			contentType: 'application/x-www-form-urlencoded; charset=ISO-8859-1',
//  				beforeSend: function(jqXHR) {
//    				jqXHR.overrideMimeType('application/x-www-form-urlencoded; charset=ISO-8859-1');																			
//				}
           	});
     	});                                                            
	});
</script>