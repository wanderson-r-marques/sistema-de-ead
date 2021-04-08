/* Funcoes nativas da administracao do site	*/  
	 
		//funcao paara campo select dinamico
		function cat(){
			
		document.getElementById("categoria").value = categ.value;
		}
		
		
		//funcao paara campo select dinamico
		function loc(valor){		
			
		 if (valor == "destaques"   ) {		 
		 	document.getElementById("tipo").style.display = "block";
		 }else{ document.getElementById("tipo").style.display = "none"; } 
		}
		
		//funcao paara campo select dinamico
		function tipo(valor){		
			
		 if (valor == "telefones"   ) {		 
		 	document.getElementById("campo1").style.display = "none";
			
		 }else{ 
		 document.getElementById("campo1").style.display = "block";
			document.getElementById("campo2").style.display = "block";
		 } 
		}



	 //Redimensionando Imagens	 e validação das fotos
	 
	$(document).ready(function(){
		$('#redimensiona').click(function(){
			
		if(document.getElementById("titulo").value==""   ) {		
			
			document.getElementById("erro1").style.visibility = "visible";			
			setTimeout("fechaDialog('erro1')", 5000);
			document.getElementById("titulo").focus();
			
			return(false);
							 
			}else if(document.getElementById("descricao").value==""   ) {	
			
			document.getElementById("erro2").style.visibility = "visible";
			setTimeout("fechaDialog('erro2')", 5000);                
			document.getElementById("descricao").focus();
					
			return(false);	
			
			}else if(document.getElementById("imagem").value==""   ) {	
			
			document.getElementById("erro3").style.visibility = "visible";
			setTimeout("fechaDialog('erro3')", 5000);               
			document.getElementById("imagem").focus();	
			
			return(false);	
			
			}else {
										  
			$('#content').load('multi_upload/tratamento.php');
			$('#redimensiona').hide();
			$('#redimensionando').show();
			return false;
			}
		});
		
		$('#edit-redimensiona').click(function(){
			
			if(document.getElementById("titulo").value==""   ) {		
			
			document.getElementById("erro1").style.visibility = "visible";			
			setTimeout("fechaDialog('erro1')", 5000);
			document.getElementById("titulo").focus();
			
			return(false);
							 
			}else if(document.getElementById("descricao").value==""   ) {	
			
			document.getElementById("erro2").style.visibility = "visible";
			setTimeout("fechaDialog('erro2')", 5000);                
			document.getElementById("descricao").focus();
					
			return(false);	
			
			}else {										   
											   
			$('#content').load('multi_upload/edit_tratamento.php');
			$('#edit-redimensiona').hide();
			$('#edit-redimensionando').show();
			return false;
			}
		});
	
		var loading = $(
			'<span>Redimensionando imagens... </span><img src="images/load_fotos.gif" title="Redimensionando imagens" style="margin:0 10px;" />'
			).appendTo('#content').hide()		
		
			loading.ajaxStart(function(){
				$(this).show();
			});
			loading.ajaxStop(function(){
				$(this).hide();
			});
	});
		//fim redimensionamento
		
		
		
		

	 
	 /*Pagina de menus*/
		
		//add campos dinamicamente
		

	function move(MenuOrigem, MenuDestino){
    	
	
	var arrMenuOrigem = new Array();
    var arrMenuDestino = new Array();
    var arrLookup = new Array();
    var i;
    for (i = 0; i < MenuDestino.options.length; i++){
        arrLookup[MenuDestino.options[i].text] = MenuDestino.options[i].value;
        arrMenuDestino[i] = MenuDestino.options[i].text;
    }
    var fLength = 0;
    var tLength = arrMenuDestino.length;
    for(i = 0; i < MenuOrigem.options.length; i++){
        arrLookup[MenuOrigem.options[i].text] = MenuOrigem.options[i].value;
        if (MenuOrigem.options[i].selected && MenuOrigem.options[i].value != ""){
            arrMenuDestino[tLength] = MenuOrigem.options[i].text;
            tLength++;
        }
        else{
            arrMenuOrigem[fLength] = MenuOrigem.options[i].text;
            fLength++;
        }
    }
    arrMenuOrigem.sort();
    arrMenuDestino.sort();
    MenuOrigem.length = 0;
    MenuDestino.length = 0;
    var c;
    for(c = 0; c < arrMenuOrigem.length; c++){
        var no = new Option();
        no.value = arrLookup[arrMenuOrigem[c]];
        no.text = arrMenuOrigem[c];
        MenuOrigem[c] = no;
    }
    for(c = 0; c < arrMenuDestino.length; c++){
        var no = new Option();
        no.value = arrLookup[arrMenuDestino[c]];
        no.text = arrMenuDestino[c];
        MenuDestino[c] = no;
	 }
  }

		function selectTudo(selecionados){		
		
			for(i=0; i<=selecionados.length-1; i++){
			selecionados.options[i].selected = true;
			}
		  }		
		

		
		 
   $(document).on('mouseenter','[rel=tooltip]', function(){
    $(this).tooltip('show');
		});
   
