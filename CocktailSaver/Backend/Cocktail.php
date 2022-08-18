<?php

/**
 * Cocktail short summary.
 *
 * Cocktail description.
 *
 * @version 1.0
 * @author littl
 */
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
    function __construct($jsonString) {
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
        
    }

}