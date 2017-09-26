<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/personalPage.css">
    <title>James Tavernor</title>
</head>
<?php
include 'header.html';
?>
<body>
<div class="container">
    <h1 class="text-centre">Welcome to my website</h1>
    <div class="rowTilesConstantHeight">
        <div class="col tiles">
            <div class="captionedImage text-centre">
                <a href="about.php">
                    <img src="images/PersonalPicture.png" class="image-resize image-round">
                    <h4>About me</h4>
                    <p>Find out more about me</p>
                </a>
            </div>
        </div>
        <div class="col tiles">
            <div class="captionedImage text-centre">
                <a href="publicCV.pdf">
                    <img src="images/Maths.png" class="image-resize image-round">
                    <h4>My Qualifications</h4>
                    <p>Read my qualifications/CV</p>
                </a>
            </div>
        </div>
        <div class="col tiles">
            <div class="captionedImage text-centre">
                <a href="projects.php" class="thumbnail">
                    <img src="images/Code.png" class="image-resize image-round">
                    <h4>My Projects</h4>
                    <p>View my previous projects</p>
                </a>
            </div>
        </div>

    </div>
</div>
</body>
</html>