<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="bootstrap.css">
    <title>James Tavernor</title>
</head>
    <?php
        include 'header.html';
    ?>
<body>
<div class="container">
    <h1 class="text-center">Welcome to my website</h1>
    <div class="row">
        <div class="col-md-4">
            <a href="about.php" class="thumbnail">
                <img src="images/PersonalPicture.png" class="img-responsive img-rounded">
                <div class="caption text-center">
                    <h4>About me</h4>
                    <p>Find out more about me</p>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="publicCV.pdf" class="thumbnail">
                <img src="images/Maths.png" class="img-responsive img-rounded">
                <div class="caption text-center">
                    <h4>My Qualifications</h4>
                    <p>Read my qualifications/CV</p>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="projects.php" class="thumbnail">
                <img src="images/Code.png" class="img-responsive img-rounded">
                <div class="caption text-center">
                    <h4>My Projects</h4>
                    <p>View my previous projects</p>
                </div>
            </a>
        </div>
    </div>
</div>
</body>
</html>