<?php 	require_once("includes/config.php");
		require_once("includes/verifica.php");
?>		
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
	<script type="text/javascript" src="multi_upload/multiUpload.js"></script>
	
	<script type="text/javascript">
		var uploader = new multiUpload('uploader', 'uploader_files', {
			swf:            'multi_upload/multiUpload.swf',
			script:         'multi_upload/fotos_upload.php?i=../../fotos/<?= $file; ?>/',
			expressInstall: 'multi_upload/expressInstall.swf',
			multi:          true,
			auto:           true
		});
		
		
		
	</script>

	<style type="text/css">
		@import 'multi_upload/style.css';
		@import "multi_upload/multiUpload.css";
	</style>


<div id="campo3"  class="control-group">
            <label class="control-label" for="fileInput">Adicionar fotos</label>
            <div class="controls">
            <div id="uploader"></div>
            </div>
          </div>
	

	<div id="uploader_files"></div>

