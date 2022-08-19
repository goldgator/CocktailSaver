<?php

include_once "MyHeader.php";

require "../Backend/SessionHandler.php";
//require "../Backend/dbConnector.php";
require "../Backend/Cocktail.php";
?>

<body class="masterBody">
    <div class="mainContent">

        <div>
            <form method="post" action="CocktailSearch.php">
                <input type="text" class="searchTxt" id="SearchText" name="SearchText" />
                <input type="submit" value="Search" id="Search" name="Search" />
            </form>
        </div>

        <div class="entryList">
            <?php
    if (array_key_exists("Search", $_POST)) {
        $url = 'https://www.thecocktaildb.com/api/json/v1/1/search.php?s=' . $_POST["SearchText"];
        $data = file_get_contents($url);
        $decodedData = json_decode($data);
        $CocktailArray = array();
        for ($x = 0; $x < count($decodedData->drinks); $x++) {
            $newCocktail = new Cocktail("","","","","");
            $newCocktail->scrape_json(json_encode($decodedData->drinks[$x]));
            array_push($CocktailArray, $newCocktail);

            $newCocktail->create_list_entry();
        }

    } else {
        echo "<h2> Please search for a cocktail by name</h2>";
    }
            ?>
        </div>

    </div>

</body>


<?php
include_once "MyFooter.php";


?>



