<?php
function getHand(){
    
}
function displayHand(){
    
}
function displayWinners(){
    
}
function displaySuperHeroes(){
    $dirname = "img/superheroes/";
    $images = glob($dirname."*.jpg");
        foreach($images as $image) {
            echo '<br />';
            echo '<img src="'.$image.'" /><br />';
        }
}
?>
<html>
    <header>
    <title>Silver Jack</title>
        <center>
            <h1>Super Hero Silver Jack</h1>
        </center>
    </header>
    
    <body>
        
        <?php
        displaySuperHeroes();
        ?>

        <hr>
        <footer>
            <center>
                Disclaimer: All material above is used for teaching purposes. Information might be inaccurate.
            </center>
        </footer>
    </body>
</html>

