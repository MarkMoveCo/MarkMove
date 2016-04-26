<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="utf-8" />
        <title>HTML5 image crop tool | Script Tutorials</title>
        <link href="css/main.css" rel="stylesheet" type="text/css" />

        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script src="../scripts/crop-picture.js"></script>
    </head>
    <body>
        <header>
            <h2>HTML5 image crop tool</h2>
            <a href="https://www.script-tutorials.com/html5-image-crop-tool/" class="stuts">Back to original tutorial on <span>Script Tutorials</span></a>
        </header>

        <div class="container">
            <div class="contr">
                <button onclick="getResults()">Crop</button>
            </div>

            <canvas id="panel" width="779" height="519"></canvas>

            <div id="results">
                <h2>Please make selection for cropping and click 'Crop' button.</h2>
                <img id="crop_result" />
            </div>
        </div>
    </body>
</html>
