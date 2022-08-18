<?php
session_start();

//Should use (public)





//Don't use (pretend private)

function CreateHiddenInput($Id, $Name, $Value) {
    echo '<input type="hidden" id="' . $Id .'" name="' . $Name . '" value="' . $Value . '">';
}


?>