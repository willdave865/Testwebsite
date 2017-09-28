<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/personalPage.css">
    <title>James Tavernor</title>
</head>
<body>
<?php
include 'header.html';
?>
<div class="container indexPage">
    <div class="rowTilesConstantHeight">
        <div class="col-2">
            <div class="captionedImage text-centre">
                <a href="about.php">
                    <img src="images/PersonalPicture.png" class="imageResize imageRounded">
                    <h3>About Me</h3>
                    <p>Find out more about me</p>
                </a>
            </div>
        </div>
        <div class="col-2">
            <div class="captionedImage text-centre">
                <a href="publicCV.pdf">
                    <img src="images/Maths.png" class="imageResize imageRounded">
                    <h3>My Qualifications</h3>
                    <p>Read my qualifications/CV</p>
                </a>
            </div>
        </div>
        <div class="col-2">
            <div class="captionedImage text-centre">
                <a href="projects.php" class="thumbnail">
                    <img src="images/Code.png" class="imageResize imageRounded">
                    <h3>My Projects</h3>
                    <p>View my previous projects</p>
                </a>
            </div>
        </div>

    </div>
</div>
</body>
</html>