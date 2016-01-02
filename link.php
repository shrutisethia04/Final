
<?php
// 1 day measured in seconds = 60 seconds * 60 minutes * 24 hours
$delta = 86400;
 
// Check to see if link has expired
if ($_SERVER["REQUEST_TIME"] - $tstamp > $delta) 
{
    throw new Exception("Token has expired.");
}
// do one-time action here, like activating a user account

//Working within the real