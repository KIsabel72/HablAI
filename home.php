<?php
$questions = [
    "1. Cuando aprendes algo nuevo en clase, te gusta más…" => [
        "A" => ["Ver dibujos, fotos o colores.", "VISUAL"],
        "B" => ["Escuchar a la maestra explicarlo.", "AUDITIVO"],
        "C" => ["Leerlo en un libro o escribirlo.", "LECTURA"],
        "D" => ["Usar tus manos o moverte mientras aprendes.", "KINESTESICO"]
    ],
    "2. Si alguien te explica cómo armar un juguete, ¿qué prefieres?" => [
        "A" => ["Ver el dibujo o los pasos con imágenes.", "VISUAL"],
        "B" => ["Que te lo digan paso a paso en voz alta.", "AUDITIVO"],
        "C" => ["Leer las instrucciones escritas.", "LECTURA"],
        "D" => ["Intentar armarlo tú solo mientras lo descubres.", "KINESTESICO"]
    ],
    "3. En la escuela, ¿cómo te gusta estudiar?" => [
        "A" => ["Con dibujos, mapas y colores.", "VISUAL"],
        "B" => ["Escuchando canciones o a la maestra.", "AUDITIVO"],
        "C" => ["Escribiendo muchas veces o leyendo.", "LECTURA"],
        "D" => ["Jugando o haciendo actividades físicas.", "KINESTESICO"]
    ],
    "4. Cuando ves una palabra nueva en inglés, ¿cómo aprendes mejor?" => [
        "A" => ["Viendo una imagen de lo que significa.", "VISUAL"],
        "B" => ["Escuchando cómo se dice muchas veces.", "AUDITIVO"],
        "C" => ["Escribiéndola o leyéndola.", "LECTURA"],
        "D" => ["Usándola en un juego o haciendo algo.", "KINESTESICO"]
    ],
    "5. ¿Qué tipo de juegos te gustan más?" => [
        "A" => ["Juegos con dibujos, colores o rompecabezas.", "VISUAL"],
        "B" => ["Juegos donde repites sonidos o cantas.", "AUDITIVO"],
        "C" => ["Juegos donde tienes que leer instrucciones.", "LECTURA"],
        "D" => ["Juegos donde te mueves o tocas cosas.", "KINESTESICO"]
    ]
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $scores = ["VISUAL" => 0, "AUDITIVO" => 0, "LECTURA" => 0, "KINESTESICO" => 0];

    foreach ($_POST as $answer) {
        if (array_key_exists($answer, $scores)) {
            $scores[$answer]++;
        }
    }

    $mayor = array_search(max($scores), $scores);

    switch ($mayor) {
        case "VISUAL":
            header("Location: visual.php");
            exit();
        case "AUDITIVO":
            header("Location: auditivo.php");
            exit();
        case "LECTURA":
            header("Location: lectura.php");
            exit();
        case "KINESTESICO":
            header("Location: kinestesico.php");
            exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>¿Cómo aprendes mejor?</title>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet" />
    <link href="css/custom.css" rel="stylesheet">
</head>
<body class="body-form">
    <h1 class="h1-form">¿Cómo aprendes mejor?</h1>

    <form method="POST">
        <?php
        $i = 1;
        foreach ($questions as $q => $answers) {
            echo "<div class='question'>";
            echo "<p>$q</p>";
            foreach ($answers as $key => [$text, $type]) {
                echo "<label class='option'><input type='radio' name='q$i' value='$type' required /> $key) $text</label><br>";
            }
            echo "</div>";
            $i++;
        }
        ?>
        <button type="submit" class="btn-submit">Ver resultado</button>
    </form>
</body>
</html>
