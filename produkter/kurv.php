<?php

if($_GET){
    if(isset($_GET["clearCart"])){
       $_SESSION["cart"] = array();
    }
}

?>
<a href="?side=kurv&clearCart">Tøm kruv</a>
<pre>
<?php
    print_r($_SESSION["cart"]);
?>
</pre>