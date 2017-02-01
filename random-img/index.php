<?php
## Variables
$imgNumRnd = rand(1,100);

## define image directory
$directory = 'images/';

## create array of images in folder and remove . .. from the listing
$imagesListedArr = array_diff(scandir($directory, 1), array('.','..'));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP | random-img</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <h2>Billeder:</h2>
    <section>
<?php
/*echo 'Random nr.: ' . $imgNum . '<br />';
switch($imgNum){
    case $imgNum < 70:
    echo '<img src="'. $directory . $imagesListed[0] . '" alt="1" title="test" >';
    break;
    case $imgNum >=70 && $imgNum < 90:
    echo '<img src="'. $directory . $imagesListed[1] . '" alt="1" title="" >';
    break;
    case $imgNum >= 90:
    echo '<img src="'. $directory . $imagesListed[2] . '" alt="1" title="" >';
    break;
    default:
    echo 'Intet billede!';
    break;
}*/

    /*$imgCount = count($imagesListedArr);
    $imgNum = 0;

    while($imgNum < $imgCount){
        echo '<img src="'. $directory . $imagesListedArr[$imgNum] . '" alt="1" title="" ><br />';
        $imgNum++;
    }*/
    
    foreach($imagesListedArr as $value){
    ?>
    <figure>
         <img src=<?=$directory . $value;?> alt="<?=$value;?>" height="350" width="350" >
    </figure>
<?php
    }
?>
</section>
</body>
</html>