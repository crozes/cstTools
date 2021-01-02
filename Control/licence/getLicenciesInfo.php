<?php
include "/var/www/html/cstTools/Control/licence/functionLicencie.php";
// Takes raw data from the request
echo json_encode(getLicencies());
