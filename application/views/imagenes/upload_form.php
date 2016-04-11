<html>
<head>
<title>Upload Form</title>
</head>
<body>

<?php echo $error;?>

<?php echo form_open_multipart('upload/do_upload');?>
<?php 

$nombre = array(
  'name'        => 'titulo',
  'id'          => 'nombre',
  'value'       => '',
  'maxlength'   => '150',
  'size'        => '50',
  'class'       => 'form-control',
  'placeholder' => ' Ejemplo: Logotipo de REMO'
  );

?>
<?= form_input($nombre);?>
<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="upload" />

</form>

</body>
</html>