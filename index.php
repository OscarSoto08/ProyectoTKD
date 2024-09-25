<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="kopulso, club de taekwondo, LTA, Learning Taekwondo Application"> 
    <title>LTA - Kopulso</title>
    <link rel="shortcut icon" href="img/image.png">

    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@400;700&display=swap" rel="stylesheet">

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/script.js" ></script>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styleAG.css">
</head>
<body>
    <div id="datos">
        <div class="row mb-10 container mx-auto">
            <div class="col">
                <?php require_once 'includes/head/navbar.php'?>
                <!-- CONTENIDO DINAMICO -->
                <div class="card border-dark p-8" id="content">
                    <?php require_once('includes/info-general.php')?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
