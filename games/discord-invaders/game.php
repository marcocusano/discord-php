<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Discord PHP Lib - Discord Invaders</title>
        <!-- Style -->
        <link href='http://fonts.googleapis.com/css?family=VT323' rel='stylesheet' />
        <link href='css/style.css' rel='stylesheet' />
        <!-- Scripts -->
        <script src="js/jquery.js"></script>
        <script src="js/game_logic.js"></script>
        <script src="js/menu_logic.js"></script>
    </head>

    <body>
        <h1>Welcome to Discord Invaders</h1>
        <!--<center><img src="imgs/nitro.gif" /></center>-->
        <canvas id="canvas" width="600" height="600"></canvas>
        <div class="container">
            <div class="size">
         		<ul class="list">
         			<li id="resume">Resume</li>
         			<li id="restart">Restart</li>
              		<li onclick="window.location.href='https://www.discordapp.com';">Exit</li>
              	</ul>
            </div>
        </div>
        <img class="background-image" src="imgs/background.png" />
    </body>
</html>
