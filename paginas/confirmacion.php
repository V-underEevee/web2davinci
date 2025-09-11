<?php
include_once("../componentes/header.php");
?>

<main>
    <div class="cherry-log5">
        <h1 class="confirmacion">Felicidades, en breve serás contactado!!</h1>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Capturamos datos
            $nombre   = $_POST['nombre']   ?? '';
            $apellido = $_POST['apellido'] ?? '';
            $mail     = $_POST['mail']     ?? '';
            $mensaje  = $_POST['mensaje']  ?? '';

            // Mostramos saludo con datos y mensaje
            echo "<p>Hola <strong>$nombre $apellido</strong>, tu email es <strong>$mail</strong>.</p>";
            echo "<p>Y enviaste este mensaje: <em>$mensaje</em></p>";

            // Subida de archivo
            if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] == 0) {
                $extensionesPermitidas = ['jpg','jpeg','png'];
                $extension = strtolower(pathinfo($_FILES['archivo']['name'], PATHINFO_EXTENSION));

                if (in_array($extension, $extensionesPermitidas)) {
                    $nombreArchivo = time() . "_" . $_FILES['archivo']['name'];
                    $temporal = $_FILES['archivo']['tmp_name'];

                    move_uploaded_file($temporal, "../archivos/$nombreArchivo");

                    echo "
                    <figure>
                        <img src='../archivos/$nombreArchivo' alt='$nombreArchivo' width='300'>
                    </figure>
                    ";
                } else {
                    echo "<p>El archivo debe ser JPG o PNG.</p>";
                }
            }
        } else {
            echo "<p>No se recibieron datos del formulario.</p>";
        }
        ?>
    </div>
</main>

<?php
include_once("../componentes/footer.php");
?>
