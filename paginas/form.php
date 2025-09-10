<?php
include_once("../componentes/header.php");


?>


    <main>
         <form action="confirmacion.php" <?php print $_SERVER['PHP_SELF']; ?> method="post" enctype="multipart/form-data">

        <fieldset class="fieldset">
            <legend class="legendlabel"><label class="label">Deseas ponerte en contacto con nosotros? Ingresa tus Datos Personales</label></legend>
            
            <label class="label">Nombre</label>
            <input type="text" name="nombre" placeholder="Nombre" required title="Campo Obligatorio" autofocus autocomplete="off" tabindex="1">
            <label class="label">Apellido</label>
            <input type="text" name="apellido" placeholder="Apellido" required title="Campo Obligatorio" autofocus autocomplete="off" tabindex="2">

 <label for="mail" class="label">
            Ingrese su correo electronico:
           
        </label>

         <input type="text" name="mail" placeholder="no olvides el @" value=""
         id="mail" required title="Campo Obligatorio" tabindex="3">



        

<!-- <label for="edad" class="label">
Ingrese su edad:
<input type="number" min="6" max="130" name="edad" id="edad" required title="Campo Obligatorio" tabindex="5">
</label> -->



<label class="label">Acepta los Terminos y Condiciones?
    <input type="checkbox" name="acepta" id="" required title="Campo Obligatorio" tabindex="6">
</label>








<textarea name="mensaje" id="" cols="30" rows="3" tabindex="7"> </textarea>

<label class="archivo" for="archivo">Adjuntar Archivo</label>
<input class="archivo" type="file" name="archivo" id="archivo">





<button type="reset" tabindex="9" class="label">Borrar</button>

<button type="submit" tabindex="10" class="label">Enviar datos</button>






        </fieldset>


       









    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        
        $nombre = time(). ".jpg";

        $temporal = $_FILES['archivo']['tmp_name'];

        move_uploaded_file($temporal, "../archivos/$nombre");

        print "
        <figure>
        <img src=../archivos/$nombre alt=$nombre>
        </figure>
        ";
    }
    ?>
    </main>

<?php
include_once("../componentes/footer.php");


?>