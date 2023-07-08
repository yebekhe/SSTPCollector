<?php

include "modules/get_data.php";

file_put_contents("json/configs.json", json_encode(vpngate(), JSON_PRETTY_PRINT));

?>
