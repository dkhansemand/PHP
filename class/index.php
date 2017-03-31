<?php

require_once './cfg.php';

	echo '<p>Function from DB with Log implement: ' . _LOG_PATH_. '</p><br';

    $conn->close();
    unset($conn, $sql);