	  function fechaDialog(a){
			
			document.getElementById(a).style.visibility = 'hidden';
			
					}
	  
	  
	   function validaSplash()	{	
				 
			if(document.getElementById("largura").value > 900 || document.getElementById("largura").value < 1 || document.getElementById("largura").value=="") {		
			
			document.getElementById("erro1").style.visibility = "visible";			
			setTimeout("fechaDialog('erro1')", 5000);
			document.getElementById("largura").focus();
			
			return(false);

			
			}else if(document.getElementById("altura").value > 600 || document.getElementById("altura").value < 1 || document.getElementById("altura").value=="") {
			
			document.getElementById("erro2").style.visibility = "visible";
			setTimeout("fechaDialog('erro2')", 5000);               
			document.getElementById("altura").focus();	
			
			return(false);				

			
			}else if(document.getElementById("arquivo").value==""   ) {	
			
			document.getElementById("erro3").style.visibility = "visible";
			setTimeout("fechaDialog('erro3')", 5000);               
			document.getElementById("arquivo").focus();	
			
			return(false);				

			
			}else { return(true); }  
			
		 }
	  
	    function validaEditSplash()	{	
				 
			if(document.getElementById("largura").value > 900 || document.getElementById("largura").value < 1 || document.getElementById("largura").value=="") {		
			
			document.getElementById("erro1").style.visibility = "visible";			
			setTimeout("fechaDialog('erro1')", 5000);
			document.getElementById("largura").focus();
			
			return(false);

			
			}else if(document.getElementById("altura").value > 600 || document.getElementById("altura").value < 1 || document.getElementById("altura").value=="") {
			
			document.getElementById("erro2").style.visibility = "visible";
			setTimeout("fechaDialog('erro2')", 5000);               
			document.getElementById("altura").focus();	
			
			return(false);				

			
			}else { return(true); }  
			
		 }
		 
		 
		 
	    function validaDestaque()	{	
				 
			if(document.getElementById("titulo").value==""   ) {		
			
			document.getElementById("erro1").style.visibility = "visible";			
			setTimeout("fechaDialog('erro1')", 5000);
			document.getElementById("titulo").focus();
			
			return(false);

			
			}else if(document.getElementById("imagem").value==""   ) {	
			
			document.getElementById("erro2").style.visibility = "visible";
			setTimeout("fechaDialog('erro2')", 5000);               
			document.getElementById("imagem").focus();	
			
			return(false);				
			
			}else if(tinyMCE.activeEditor.getContent({format : 'text'}) == "") {	
			
			document.getElementById("erro3").style.visibility = "visible";
			setTimeout("fechaDialog('erro3')", 5000);                 
			
			return(false);
			
			}else { return(true); }   
			
		 }
	  
	  function validaEditDestaque() {	
				 
			if(document.getElementById("titulo").value==""   ) {		
			
			document.getElementById("erro1").style.visibility = "visible";			
			setTimeout("fechaDialog('erro1')", 5000);
			document.getElementById("titulo").focus();
			
			return(false);			
			
			}else { return(true); }   
			
		 }
	  
	  
	   function validaVideo()	{	
				 
			if(document.getElementById("url").value==""   ) {		
			
			document.getElementById("erro1").style.visibility = "visible";			
			setTimeout("fechaDialog('erro1')", 5000);
			document.getElementById("url").focus();
			
			return(false);

			
			}else if(document.getElementById("titulo").value==""   ) {	
			
			document.getElementById("erro2").style.visibility = "visible";
			setTimeout("fechaDialog('erro2')", 5000);               
			document.getElementById("titulo").focus();	
			
			return(false);				

			
			}else { return(true); }  
			
		 }
	  
	  function validaEditVideo() {	
				 
			if(document.getElementById("url").value==""   ) {		
			
			document.getElementById("erro1").style.visibility = "visible";			
			setTimeout("fechaDialog('erro1')", 5000);
			document.getElementById("url").focus();
			
			return(false);

			
			}else if(document.getElementById("titulo").value==""   ) {	
			
			document.getElementById("erro2").style.visibility = "visible";
			setTimeout("fechaDialog('erro2')", 5000);               
			document.getElementById("titulo").focus();	
			
			return(false);				

			
			}else { return(true); }   
			
		 }
	  
	  
	  
	  
	  function validaNoticia()	{	
				 
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
			
			}else if(tinyMCE.activeEditor.getContent({format : 'text'}) == "") {	
			
			document.getElementById("erro4").style.visibility = "visible";
			setTimeout("fechaDialog('erro4')", 5000);                 
			
			return(false);	
			
			}else { return(true); }  
			
		 }
	  
	  function validaEditNoticia() {	
				 
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
			
			}else if(tinyMCE.activeEditor.getContent({format : 'text'}) == "") {	
			
			document.getElementById("erro3").style.visibility = "visible";
			setTimeout("fechaDialog('erro3')", 5000);                 
			
			return(false);	
			
			}else { return(true); }   
			
		 }



		

 
	  function validaAgenda()	{	
				 
			if(document.getElementById("titulo").value==""   ) {		
			
			document.getElementById("erro1").style.visibility = "visible";			
			setTimeout("fechaDialog('erro1')", 5000);
			document.getElementById("titulo").focus();
			
			return(false);
							 
			}else if(document.getElementById("local").value==""   ) {	
			
			document.getElementById("erro2").style.visibility = "visible";
			setTimeout("fechaDialog('erro2')", 5000);                
			document.getElementById("local").focus();
					
			return(false);	
			
			}else if(document.getElementById("imagem").value==""   ) {	
			
			document.getElementById("erro3").style.visibility = "visible";
			setTimeout("fechaDialog('erro3')", 5000);               
			document.getElementById("imagem").focus();	
			
			return(false);	
			
			}else if(tinyMCE.activeEditor.getContent({format : 'text'}) == "") {	
			
			document.getElementById("erro4").style.visibility = "visible";
			setTimeout("fechaDialog('erro4')", 5000);                 
			
			return(false);	
			
			}else { porra(); return(true); }  
			
		 }
	  
	  function validaEditAgenda() {	
				 
			if(document.getElementById("titulo").value==""   ) {		
			
			document.getElementById("erro1").style.visibility = "visible";			
			setTimeout("fechaDialog('erro1')", 5000);
			document.getElementById("titulo").focus();
			
			return(false);
							 
			}else if(document.getElementById("local").value==""   ) {	
			
			document.getElementById("erro2").style.visibility = "visible";
			setTimeout("fechaDialog('erro2')", 5000);                
			document.getElementById("local").focus();
					
			return(false);	
			
			}else if(tinyMCE.activeEditor.getContent({format : 'text'}) == "") {	
			
			document.getElementById("erro3").style.visibility = "visible";
			setTimeout("fechaDialog('erro3')", 5000);                 
			
			return(false);	
			
			}else { return(true); }  
			
		 }



	  function validaDownload()	{	
				 
			if(document.getElementById("datepicker2").value==""   ) {		
			
			document.getElementById("erro1").style.visibility = "visible";			
			setTimeout("fechaDialog('erro1')", 5000);
			document.getElementById("datepicker2").focus();
			
			return(false);
							 
			}else if(document.getElementById("titulo").value==""   ) {	
			
			document.getElementById("erro2").style.visibility = "visible";
			setTimeout("fechaDialog('erro2')", 5000);                
			document.getElementById("titulo").focus();
					
			return(false);	
			
			}else if(document.getElementById("local").value==""   ) {	
			
			document.getElementById("erro3").style.visibility = "visible";
			setTimeout("fechaDialog('erro3')", 5000);               
			document.getElementById("local").focus();	
			
			return(false);	
			
			}else if(document.getElementById("imagem").value==""   ) {	
			
			document.getElementById("erro4").style.visibility = "visible";
			setTimeout("fechaDialog('erro4')", 5000); 
			document.getElementById("imagem").focus();
			
			return(false);	
			
			}else if(document.getElementById("url").value==""   ) {	
			
			document.getElementById("erro5").style.visibility = "visible";
			setTimeout("fechaDialog('erro5')", 5000);  
			document.getElementById("url").focus();
			
			return(false);				
			
			}else { return(true); }  
			
		 }
	  
	  function validaEditDownload() {	
				 
			if(document.getElementById("datepicker2").value==""   ) {		
			
			document.getElementById("erro1").style.visibility = "visible";			
			setTimeout("fechaDialog('erro1')", 5000);
			document.getElementById("datepicker2").focus();
			
			return(false);
							 
			}else if(document.getElementById("titulo").value==""   ) {	
			
			document.getElementById("erro2").style.visibility = "visible";
			setTimeout("fechaDialog('erro2')", 5000);                
			document.getElementById("titulo").focus();
					
			return(false);	
			
			}else if(document.getElementById("local").value==""   ) {	
			
			document.getElementById("erro3").style.visibility = "visible";
			setTimeout("fechaDialog('erro3')", 5000);               
			document.getElementById("local").focus();	
			
			return(false);	
			
			}else if(document.getElementById("url").value==""   ) {	
			
			document.getElementById("erro4").style.visibility = "visible";
			setTimeout("fechaDialog('erro4')", 5000);  
			document.getElementById("url").focus();
			
			return(false);				
			

			}else { return(true); }   
			
		 }



	  function validaEquipe()	{	
				 
			if(document.getElementById("nome").value==""   ) {		
			
			document.getElementById("erro1").style.visibility = "visible";			
			setTimeout("fechaDialog('erro1')", 5000);
			document.getElementById("nome").focus();
			
			return(false);
							 
			}else if(document.getElementById("funcao").value==""   ) {	
			
			document.getElementById("erro2").style.visibility = "visible";
			setTimeout("fechaDialog('erro2')", 5000);                
			document.getElementById("funcao").focus();
					
			return(false);	
			
			}else if(document.getElementById("imagem").value==""   ) {	
			
			document.getElementById("erro3").style.visibility = "visible";
			setTimeout("fechaDialog('erro3')", 5000); 
			document.getElementById("imagem").focus();
			
			return(false);	
			
			}else { return(true); }  
			
		 }
	  
	  function validaEditEquipe() {	
				 
			if(document.getElementById("nome").value==""   ) {		
			
			document.getElementById("erro1").style.visibility = "visible";			
			setTimeout("fechaDialog('erro1')", 5000);
			document.getElementById("nome").focus();
			
			return(false);
							 
			}else if(document.getElementById("funcao").value==""   ) {	
			
			document.getElementById("erro2").style.visibility = "visible";
			setTimeout("fechaDialog('erro2')", 5000);                
			document.getElementById("funcao").focus();
					
			return(false);	
			
			}else { return(true); }   
			
		 }


		   function validaParceiro()	{	
				 
			if(document.getElementById("imagem").value==""   ) {	
			
			document.getElementById("erro3").style.visibility = "visible";
			setTimeout("fechaDialog('erro3')", 5000); 
			document.getElementById("imagem").focus();
			
			return(false);	
			
			}else { return(true); }  
			
		 }






		function validaEnquete()
    {	
			 
         if (document.getElementById("pergunta").value==""   ) {
            
		document.getElementById("campo1").className = "control-group error";
		document.getElementById("erro1").innerHTML = "Insira uma pergunta";
					
				 return(false);
				 
		 }else if (document.getElementById("opcao[]").value==""   ) {
            
		document.getElementById("campo1").className = "control-group";
		document.getElementById("erro1").innerHTML = "";

		
		document.getElementById("origem").className = "control-group error";
		document.getElementById("erro2").innerHTML = "Insira as opções";			
		
					 
       				 return(false);
		 }else{

		document.getElementById("campo1").className = "control-group";
		document.getElementById("erro1").innerHTML = "";	
		
		document.getElementById("origem").className = "control-group";
		document.getElementById("erro2").innerHTML = "";	
			 		
         
		   		 return(true);
        } 
	 }		
		
		/*Fim Pagina de enquete*/
		
		
	  function validaPost()	{	
				 
			if(document.getElementById("titulo").value==""   ) {		
			
			document.getElementById("erro1").style.visibility = "visible";			
			setTimeout("fechaDialog('erro1')", 5000);
			document.getElementById("titulo").focus();
			
			return(false);
							 
						
			}else if(document.getElementById("imagem").value==""   ) {	
			
			document.getElementById("erro3").style.visibility = "visible";
			setTimeout("fechaDialog('erro3')", 5000);               
			document.getElementById("imagem").focus();	
			
			return(false);	
			
			}else if(tinyMCE.activeEditor.getContent({format : 'text'}) == "") {	
			
			document.getElementById("erro4").style.visibility = "visible";
			setTimeout("fechaDialog('erro4')", 5000);                 
			
			return(false);	
			
			}else { return(true); }  
			
		 }
	  
	  function validaEditPost() {	
				 
			if(document.getElementById("titulo").value==""   ) {		
			
			document.getElementById("erro1").style.visibility = "visible";			
			setTimeout("fechaDialog('erro1')", 5000);
			document.getElementById("titulo").focus();
			
			return(false);
							 
			}else if(tinyMCE.activeEditor.getContent({format : 'text'}) == "") {	
			
			document.getElementById("erro3").style.visibility = "visible";
			setTimeout("fechaDialog('erro3')", 5000);                 
			
			return(false);	
			
			}else { return(true); }   
			
		 }
	
	
	
		  function validaProgramacao()	{	
				 
			if(document.getElementById("programa").value==""   ) {		
			
			document.getElementById("erro1").style.visibility = "visible";			
			setTimeout("fechaDialog('erro1')", 5000);
			document.getElementById("programa").focus();
			
			return(false);

			
			}else if(document.getElementById("locutor").value==""   ) {		
			
			document.getElementById("erro2").style.visibility = "visible";			
			setTimeout("fechaDialog('erro2')", 5000);
			document.getElementById("locutor").focus();
			
			return(false);

			
			}else if(document.getElementById("imagem").value==""   ) {	
			
			document.getElementById("erro3").style.visibility = "visible";
			setTimeout("fechaDialog('erro3')", 5000);               
			document.getElementById("imagem").focus();	
			
			return(false);				

			
			}else if(document.getElementById("inicial").value==""   ) {	
			
			document.getElementById("erro4").style.visibility = "visible";
			setTimeout("fechaDialog('erro4')", 5000);               
			document.getElementById("inicial").focus();	
			
			return(false);				

			
			}else if(document.getElementById("final").value==""   ) {	
			
			document.getElementById("erro5").style.visibility = "visible";
			setTimeout("fechaDialog('erro5')", 5000);               
			document.getElementById("final").focus();	
			
			return(false);				

			
			}else { return(true); }  
			
		 }
	  
	  
	  
	  	function validaEditProgramacao()	{	
				 
			if(document.getElementById("programa").value==""   ) {		
			
			document.getElementById("erro1").style.visibility = "visible";			
			setTimeout("fechaDialog('erro1')", 5000);
			document.getElementById("programa").focus();
			
			return(false);

			
			}else if(document.getElementById("locutor").value==""   ) {		
			
			document.getElementById("erro2").style.visibility = "visible";			
			setTimeout("fechaDialog('erro2')", 5000);
			document.getElementById("locutor").focus();
			
			return(false);

			
			}else if(document.getElementById("inicial").value==""   ) {	
			
			document.getElementById("erro4").style.visibility = "visible";
			setTimeout("fechaDialog('erro4')", 5000);               
			document.getElementById("inicial").focus();	
			
			return(false);				

			
			}else if(document.getElementById("final").value==""   ) {	
			
			document.getElementById("erro5").style.visibility = "visible";
			setTimeout("fechaDialog('erro5')", 5000);               
			document.getElementById("final").focus();	
			
			return(false);				

			
			}else { return(true); }  
			
		 }
	  	
	  
	  	function validaEditTop10()	{	
				 
			if(document.getElementById("cantor").value==""   ) {		
			
			document.getElementById("erro1").style.visibility = "visible";			
			setTimeout("fechaDialog('erro1')", 5000);
			document.getElementById("cantor").focus();
			
			return(false);

			
			}else if(document.getElementById("musica").value==""   ) {		
			
			document.getElementById("erro2").style.visibility = "visible";			
			setTimeout("fechaDialog('erro2')", 5000);
			document.getElementById("musica").focus();
			
			return(false);

			
			}else { return(true); }  
			
		 }
		 
		 function validaEditRadio()	{	
				 
			if(tinyMCE.activeEditor.getContent({format : 'text'}) == "") {		
			
			document.getElementById("erro1").style.visibility = "visible";			
			setTimeout("fechaDialog('erro1')", 5000);
			document.getElementById("texto").focus();
			
			return(false);
			
			}else { return(true); }  
			
		 }
	  
	
	