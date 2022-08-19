<?php


class Cocktail
{
    //Fields
    private $id;
    private $name;
    private $ingredients;
    private $instructions;
    private $imgLink;
    private $userKey;

    //Methods
    //Constructor does not set userkey, must be obtained and set after
    function __construct($newName, $newIngredients, $newInstructions, $newImgLink, $newUserKey) {
        $this->name = $newName;
        $this->ingredients = $newIngredients;
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

        $this->ingredients =
            $jsonObj->strIngredient1 . " " . $jsonObj->strMeasure1 . "<br />" .
            $jsonObj->strIngredient2 . " " . $jsonObj->strMeasure2 . "<br />" .
            $jsonObj->strIngredient3 . " " . $jsonObj->strMeasure3 . "<br />" .
            $jsonObj->strIngredient4 . " " . $jsonObj->strMeasure4 . "<br />" .
            $jsonObj->strIngredient5 . " " . $jsonObj->strMeasure5;
    }

    function get_id() { return $this->id; }
    function set_id($newID) { $this->id = $newID; }
    function get_name() { return $this->name; }
    function get_ingredients() { return $this->ingredients; }
    function get_instructions() { return $this->instructions; }
    function get_imgLink() { return  $this->imgLink; }
    function get_userKey() { return $this->userKey; }
    function set_userKey($newKey) { $this->userKey = $newKey; }

    function create_list_entry() {

        $form = "<form method='post' action='SaveCocktail.php'>" .
            $this->create_hidden_input("UserID", "UserID", $this->get_userKey()) .
            $this->create_hidden_input("Name", "Name", $this->get_name()) .
            $this->create_hidden_input("Ingredients", "Ingredients", $this->get_ingredients()) .
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
            <td> " . $this->get_ingredients() . " </td>
            <td> " . $this->get_instructions() . "</td>
            </tr>
            </tbody>
            </table>
            </form>";

        echo $form;

    }

    function create_delete_list_entry() {

        $form = "<form method='post' action='DeleteCocktail.php'>" .
            $this->create_hidden_input("CocktailID", "CocktailID", $this->get_id()) .
            "<table class='cocktailEntryTable'>
            <tbody>
            <tr>
            <td>" . $this->get_name() . "</td>
            <td> Ingredients </td>
            <td> Instructions </td>
            </tr>
            <tr>
            <td> <img src='" . $this->get_imgLink() . "' class='imgThumbnail' /> <input id='Delete' name='Delete' type='submit' value='Delete' /> </td>
            <td> " . $this->get_ingredients() . " </td>
            <td> " . $this->get_instructions() . "</td>
            </tr>
            </tbody>
            </table>
            </form>";

        echo $form;

    }

    private function create_hidden_input($Id, $Name, $Value) {
        return '<input type="hidden" id="' . $Id .'" name="' . $Name . '" value="' . $Value . '">';
    }

}