<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/personalPage.css">
    <title>Programming Tasks</title>
</head>
<?php
include '../header.html';
?>
<body>
<div class="container">
    <div class="row"><h1>Programming Tasks</h1></div>
    This is a collection of programming tasks I set myself just to tackle for fun
    <ul>
        <?php
        $filesInDirectory = array_diff(scandir('.'), array('..', '.'));
        foreach ($filesInDirectory as $currentFile) {
            if (is_dir($currentFile)) {
                //every directory inside this directory we scanned is a project so display it with a link to it
                echo '<li><a href="' . $currentFile . '">' . $currentFile . '</a></li>';
            }
        }
        ?>
    </ul>
</div>
</body>
</html>