<?php
function createPhoneNumber($numberArray)
{
    $numberArray = preg_replace('/[^0-9]/','',$numberArray);
    if($numberArray > 10) {
        $areaCode = substr($numberArray, -10, 3);
        $nextThree = substr($numberArray, -7, 3);
        $lastFour = substr($numberArray, -4, 4);

        $numberArray = ' ('.$areaCode.') '.$nextThree.' - '.$lastFour;
    }
    echo("$numberArray" . "<br>");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
<?php
createPhoneNumber("9876543210"); 
?>
</body>
</html>