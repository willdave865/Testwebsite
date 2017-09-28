<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../CSS/personalPage.css">
    <title>Sudoku Solver</title>
</head>
<?php
include '../../header.html';
?>
<body>
<div class="container">
    <div class="row">
        <input type="number" id="sizeOfGrid"><button onclick="createGrid()" id="createGrid">Create Grid</button>
    </div>
    <div class="row">
        <table id="grid">
        </table>
    </div>
    <div class="row">
        <button id="solve" style="display: none">Solve!</button>
    </div>
</div>
</body>
</html>
<script>
    function createGrid() {
        var gridSize = document.getElementById("sizeOfGrid").value;
        var tableHtml = "";
        for (y = 0; y < gridSize; y++) {
            tableHtml += "<tr>";
            for (x = 0; x < gridSize; x++) {
                tableHtml += '<td><input style="text-align: center" id="gridx' + x + 'y' + y + '"></td>';
            }
            tableHtml += "<tr>";
        }
        var table = document.getElementById("grid");
        table.style.display = "table";
        table.innerHTML = tableHtml;
        document.getElementById("solve").style.display = "button";
    }
</script>