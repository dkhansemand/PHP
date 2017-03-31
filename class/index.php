<?php

require_once './cfg.php';

	echo '<p>Function from DB with Log implement: ' . $conn->getLogPath() . '</p><br';

    unset($conn, $sql);