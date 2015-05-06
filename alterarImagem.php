<?php
include_once("includes.inc.php");
include_once("permissao.inc.php");
?>
<div id="about">
	<?php
		include_once("painel.php");
	?>
</div>
<div id="mainForm">
<form action="sAlterarImagem.php" method="post" enctype="multipart/form-data">
<fieldset>
	<input type="hidden" name="MAX_FILE_SIZE" value="1000000" >
	<legend><h2>Alterar imagem de perfil</h2></legend>
	<label for="foto">Selecione a nova foto</label>
<input type="file" id="foto" name="foto" required />
<br />
<output id="list"></output>
<br />
	<button type="submit">Salvar alterações</button>
</fieldset>
</form>
</div>
<script>
  function handleFileSelect(evt) {
    var files = evt.target.files; // FileList object

    // Loop through the FileList and render image files as thumbnails.
    for (var i = 0, f; f = files[i]; i++) {

      // Only process image files.
      if (!f.type.match('image.*')) {
        continue;
      }

      var reader = new FileReader();

      // Closure to capture the file information.
      reader.onload = (function(theFile) {
        return function(e) {
          // Render thumbnail.
          var span = document.createElement('span');
          span.innerHTML = ['<img class="thumb" src="', e.target.result,
                            '" title="', escape(theFile.name), '"/>'].join('');
          document.getElementById('list').insertBefore(span, null);
        };
      })(f);

      // Read in the image file as a data URL.
      reader.readAsDataURL(f);
    }
  }

  document.getElementById('foto').addEventListener('change', handleFileSelect, false);
</script>
