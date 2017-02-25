<?php

$players = array("Superman", "Batman", "Iron man", "Spiderman");
shuffle($players);

$playersCards = array();
$totals = array();

$deck = array();
for ($i=1; $i<53; $i++)
{
    $deck[] = $i;
}
shuffle($deck);

function getHand(){
    global $playersCards;
    global $deck;
    global $totals;
    
    for($i=0; $i<4; $i++)
    {
        $stop = false;
        $total = 0;
        $cards = array();
        
        while($stop == false)
        {
            $card = array_pop($deck);
            $cards[] = $card;
            
            if ($card%13 == 0)
                $total += 13;
            else
                $total += $card%13;
                
            if ($total >= 35)
                $stop = true;
        }

        $playersCards[] = $cards;
        $totals[] = $total;
    }
}

function displayHand(){
    global $players;
    global $playersCards;
    global $totals;
    
    for($i=0; $i<4; $i++)
    {
        switch($players[$i])
        {
            case "Superman":
                echo "<img src='img/superheroes/superman.jpg'/>";
                break;
            case "Batman":
                echo "<img src='img/superheroes/batman.jpg'/>";
                break;
            case "Iron man":
                echo "<img src='img/superheroes/ironman.jpg'/>";
                break;
            case "Spiderman":
                echo "<img src='img/superheroes/spiderman.jpg'/>";
                break;
        }
        echo $players[$i];
    
        for ($j=0; $j<count($playersCards[$i]); $j++)
        {
            $suit = floor(($playersCards[$i][$j]-1)/13); // integer division
            if ($playersCards[$i][$j]%13 == 0)
                $cardNum = 13;
            else
                $cardNum = $playersCards[$i][$j]%13;
                
            switch($suit)
            {
                case 0:
                    echo "<img src='img/cards/hearts/" . $cardNum . ".png' />";
                    break;
                case 1:
                    echo "<img src='img/cards/diamonds/" . $cardNum . ".png' />";
                    break;
                case 2:
                    echo "<img src='img/cards/clubs/" . $cardNum . ".png' />";
                    break;
                case 3:
                    echo "<img src='img/cards/spades/" . $cardNum . ".png' />";
                    break;
            }
        }
        echo "Total: " . $totals[$i] . "<br />";
        
    }
}

function displayWinners(){ 

    global $players;
    global $totals;
    
    $winner = 0;
    $all_winners = [];
    for ($i=1; $i<4; $i++)
    {
        if ($totals[$i] <= 42)
        {
            if ($totals[$i] > $totals[$winner])
                $winner = $i;
        }
           
    }
    for ($i = 0; $i < 4; $i++)
    {
        if ($totals[$i] == $totals[$winner])
        {
            array_push($all_winners, $i);
        }
    }
    
    $totalWinPoints = 0;
    
    for ($i=0; $i<4; $i++)
    {
        $checker = false;
        for ($j = 0; $j < count($all_winners); $j++) // checks to see if a player is a winner
        {
            if ($i == $all_winners[$j])
                $checker = true;
        }
        if ($checker == false)
            $totalWinPoints += $totals[$i];
    }
    
    if (count($all_winners) == 1)
            echo "1 Winner: ". "<br />";
    else 
        echo count($all_winners) . " Winners: " . "<br />";
        
    
    for ($i = 0; $i < count($all_winners); $i++)
    {
        
        echo $players[$all_winners[$i]] . " wins " . $totalWinPoints . " points!!" . "<br />";
    }
}

?>
<html>
    <header>
    <title>Silver Jack</title>

    </header>
    
    <body>
        <div id ="container">
            
        
        <div id ="heading">
            <center>
                <h1>Silver Jacks</h1>
            </center>
        </div>
        
            <div id ="main">
            <?=getHand()?>
            <?=displayHand()?>
            <?=displayWinners()?>
            </div>
        
        <hr>
            <div id ="footer">
                Disclaimer: All material above is used for teaching purposes. Information might be inaccurate.
            </div>
        </div>
    </body>
</html>

