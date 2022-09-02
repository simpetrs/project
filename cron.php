<?php
$myfile = fopen("cron.log", "a") or die("Unable to open file!");
$txt = "Cron job at " . date("Y-m-d H:i:s") . "\n";
fwrite($myfile, $txt);
fclose($myfile);