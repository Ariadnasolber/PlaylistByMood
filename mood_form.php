<?php
$moodRecommendation = "";
$moodSelected = "";
$backgroundColor = "#18d860"; 

function recommendMood($mood)
{
    $moodMenu = [
        "happy" => '<iframe style="border-radius:12px" src="https://open.spotify.com/embed/playlist/37i9dQZF1EIgG2NEOhqsD7?utm_source=generator&theme=0" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>',
        "sad" => '<iframe style="border-radius:12px" src="https://open.spotify.com/embed/playlist/37i9dQZF1EIdChYeHNDfK5?utm_source=generator&theme=0" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>',
        "energy" => '<iframe style="border-radius:12px" src="https://open.spotify.com/embed/playlist/37i9dQZF1DWYp5sAHdz27Y?utm_source=generator&theme=0" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>',
        "relax" => '<iframe style="border-radius:12px" src="https://open.spotify.com/embed/playlist/37i9dQZF1DXcjpPPxCzYRE?utm_source=generator&theme=0" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>',
        "motivation" => '<iframe style="border-radius:12px" src="https://open.spotify.com/embed/playlist/37i9dQZF1DWZeKCadgRdKQ?utm_source=generator&theme=0" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>',
        "stress" => '<iframe style="border-radius:12px" src="https://open.spotify.com/embed/playlist/37i9dQZF1DWXe9gFZP0gtP?utm_source=generator&theme=0" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>',
    ];

    return $moodMenu[$mood] ?? ""; 
}


function getBackgroundColor($mood)
{
    $colors = [
        "happy" => "#f9d71c",
        "sad" => "#1e2337",
        "energy" => "#ff5733",
        "relax" => "#00a8cc",
        "motivation" => "#ff8c00",
        "stress" => "#9b59b6",
    ];

    return $colors[$mood] ?? "#18d860";
}

// Procesar el formulario al ser enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['mood']) && !empty($_POST['mood'])) {
        $mood = htmlspecialchars($_POST['mood']); // Limpiamos la entrada
        $moodSelected = $mood; // Guardamos el valor seleccionado
        $moodRecommendation = recommendMood($mood); // Obtenemos la recomendación
        $backgroundColor = getBackgroundColor($mood); // Obtenemos el color de fondo correspondiente
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>RECOMENDACION MUSICAL</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="background" style="background: radial-gradient(circle, <?php echo $backgroundColor; ?>, #131313);">  </div>
    <div class="container">
            <form id="moodForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <img src="Spotify_log.png" alt="" width="50px">
                <br>
                <h1>LISTEN TO YOUR MOOD</h1>
                <h2>Select your vibes</h2>
                <select name="mood" id="mood" onchange="this.form.submit()">
                    <option value="" <?php echo $moodSelected == '' ? 'selected' : ''; ?>>...</option>
                    <option value="happy" <?php echo $moodSelected == 'happy' ? 'selected' : ''; ?>>HAPPY</option>
                    <option value="sad" <?php echo $moodSelected == 'sad' ? 'selected' : ''; ?>>SAD</option>
                    <option value="energy" <?php echo $moodSelected == 'energy' ? 'selected' : ''; ?>>FULL OF ENERGY</option>
                    <option value="relax" <?php echo $moodSelected == 'relax' ? 'selected' : ''; ?>>RELAXING</option>
                    <option value="motivation" <?php echo $moodSelected == 'motivation' ? 'selected' : ''; ?>>MOTIVATIONAL</option>
                    <option value="stress" <?php echo $moodSelected == 'stress' ? 'selected' : ''; ?>>STRESS RELIEVER</option>
                </select>
                <p><?php echo $moodRecommendation; ?></p>
            </form>
        </div>
</body>

</html>
