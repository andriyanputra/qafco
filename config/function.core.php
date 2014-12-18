<?php
function filter($word)
{
	//$char = array ('-','/','\\',',','.','#',':',';','\'','"',"'",'[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');
	//$word = str_replace($char, '', trim($word));
    $word = stripslashes(trim($word));
    $word = mysql_real_escape_string($word);
    $word = htmlentities($word);
    $word = nl2br($word);
    return $word;
}
?>