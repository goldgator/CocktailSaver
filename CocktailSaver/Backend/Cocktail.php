<?php


class Cocktail
{
    //Fields
    private $name;
    private $ingredients;
    private $measures;
    private $instructions;
    private $imgLink;
    private $userKey;

    //Methods
    //Constructor does not set userkey, must be obtained and set after
    function __construct($newName, $newIngredients, $newMeasures, $newInstructions, $newImgLink, $newUserKey) {
        $this->name = $newName;
        $this->ingredients = $newIngredients;
        $this->measures = $newMeasures;
        $this->instructions = $newInstructions;
        $this->imgLink = $newImgLink;
        $this->userKey = $newUserKey;
    }

    function scrape_json($jsonString) {
        //decode json
        $jsonObj = json_decode($jsonString);

        $this->name = $jsonObj->strDrink;
        $this->instructions = $jsonObj->strInstructions;
        $this->imgLink = $jsonObj->strDrinkThumb;

        $this->ingredients = array(
            $jsonObj->strIngredient1,
            $jsonObj->strIngredient2,
            $jsonObj->strIngredient3,
            $jsonObj->strIngredient4,
            $jsonObj->strIngredient5);

        $this->measures = array(
            $jsonObj->strMeasure1,
            $jsonObj->strMeasure2,
            $jsonObj->strMeasure3,
            $jsonObj->strMeasure4,
            $jsonObj->strMeasure5);

    }

    function get_name() { return $this->name; }
    function get_ingredients() { return $this->ingredients; }
    function get_measures() { return $this->measures; }
    function get_instructions() { return $this->instructions; }
    function get_imgLink() { return  $this->imgLink; }
    function get_userKey() { return $this->userKey; }
    function set_userKey($newKey) { $this->userKey = $newKey; }

    function create_list_entry() {
        $ingredientStr = $this->make_ingredient_list();

        $form = "<form method='post' action='../Backend/SaveCocktail.php'>" .
            $this->create_hidden_input("UserID", "UserID", $this->get_userKey()) .
            $this->create_hidden_input("Name", "Name", $this->get_name()) .
            $this->create_hidden_input("Ingredients", "Ingredients", $ingredientStr) .
            $this->create_hidden_input("Instructions", "Instructions", $this->get_instructions()) .
            $this->create_hidden_input("ImageLink", "ImageLink", $this->get_imgLink()) .
            "<table class='cocktailEntryTable'>
            <tbody>
            <tr>
            <td>" . $this->get_name() . "</td>
            <td> Ingredients </td>
            <td> Instructions </td>
            </tr>
            <tr>
            <td> <img src='" . $this->get_imgLink() . "' class='imgThumbnail' /> <input id='Save' name='Save' type='submit' value='Save' /> </td>
            <td> " . $ingredientStr . " </td>
            <td> " . $this->get_instructions() . "</td>
            </tr>
            </tbody>
            </table>
            </form>";

        echo $form;

    }

    private function make_ingredient_list() {
        $list = "";

        for ($x = 0; $x < 5; $x++) {
            $list .= $this->ingredients[$x] . " " . $this->measures[$x] . " <br />";
        }

        return $list;
    }

    private function create_hidden_input($Id, $Name, $Value) {
        return '<input type="hidden" id="' . $Id .'" name="' . $Name . '" value="' . $Value . '">';
    }

}