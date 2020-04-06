<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đọc số thành chữ</title>
</head>
<body>
<form action="" method="get">
    <div>
        <h2>Enter number to convert</h2>
        <input type="text" name="number" placeholder="Enter Number">
        <input type="submit" value="Convert">
    </div>

</form>
</body>
</html>

<?php
function readOneNumber($number)
{
    switch ($number) {
        case 0:
            return " zero";
        case 1:
            return " one";
        case 2:
            return " two";
        case 3:
            return " three";
        case 4:
            return " four";
        case 5:
            return " five";
        case 6:
            return " six";
        case 7:
            return " seven";
        case 8:
            return " eight";
        case 9:
            return " nine";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $number = $_GET["number"];
    $hundreds= floor($number/100);
    $tens=floor($number/10)%10;
    $ones= $number%10;
    $lengthOfNumber= strlen($number);
    $str="";
    switch ($lengthOfNumber){
        case 3:
            if ($hundreds>0){
                $str .= readOneNumber($hundreds)." hundred and ";
            }


        case 2:
            switch ($tens){
                case 2:
                    $str .="twenty";
                    break;
                case 3:
                    $str .="thirty";
                    break;
                case 4:
                    $str .="forty";
                    break;
                case 5:
                    $str .="fifty";
                    break;

                case 1:
                    switch ($ones){
                        case 0:
                            $str .="ten";
                            break;
                        case 1:
                            $str .="eleven";
                            break;
                        case 2:
                            $str .="twelve";
                            break;
                        case 3:
                            $str .="thirteen";
                            break;
                        case 5:
                            $str .="fifteen";
                            break;
                        default:
                            $str .= readOneNumber($ones) . "teen";
                    }
                    echo $str;
                    die();
                    break;
                default:
                    $str .= readOneNumber($tens)."ty";
            }
        case 1:
            if ($ones>0){
                $str .= readOneNumber(($ones));
            }
            break;
        default :
            $str = "out of ability";
    }

    echo $str;
}
?>