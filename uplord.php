<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uplord Section</title>
    
    <link rel="stylesheet" href="uplord.css">
</head>
<body>
    
    <div class="container">

        <div class="video-background">
            <video autoplay muted loop>
                <source src="assets/1.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="overlay"></div>
        </div>
        <div class="header-section">
            <h1>Upload Files</h1>
            <p> upload your  video or picture you have ever taken</p>
            <p>The most beautiful picture or video will be updated on this web page every week.</p>
        </div>
        <div class="drop-section">
            <div class="col">
                <div class="cloud-icon">
                    <img src="icons/cloud.png" alt="cloud">
                </div>
                <span>Drag & Drop your files here</span>
                <span>OR</span><br>
                <button class="file-selector">Browse Files</button>
                <input type="file" class="file-selector-input" multiple>
            </div>
            <div class="col">
                <div class="drop-here">Drop Here</div>
            </div>
        </div>
        <div class="list-section">
            <div class="list-title">Uploaded Files</div>
            <div class="list"></div>
        </div>
    </div>
<script src="uplord.js"></script>
</body>
</html>
