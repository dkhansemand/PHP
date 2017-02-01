<?php
## Variables
$imgNumRnd = rand(1,100);

## define image directory
$directory = 'images/';

## create array of images in folder and remove . .. from the listing
$imagesListedArr = array_diff(scandir($directory, 1), array('.','..'));

?>
<h1>Galleri</h1>
<section>
    <?php
        foreach($imagesListedArr as $value){
    ?>
    <figure>
         <img src=<?=$directory . $value;?> alt="<?=$value;?>" height="350" width="350" >
    </figure>
    <?php
        }
    ?>
</section>