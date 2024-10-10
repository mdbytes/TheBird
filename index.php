<?php

use app\controllers\SiteNavigation;
use app\controllers\UserController;

require_once "vendor/autoload.php";
require_once "app/config/constants.php";
session_start();

if($_SESSION['email_one'] == null) {
    $_SESSION['email_one'] = "";
    session_regenerate_id(true);
}
?>
<!DOCTYPE html>
<html lang="en-us">

<?php require('app/views/layout/head_sec.inc'); ?>

<body>
<?php require('app/views/layout/nav.inc'); ?>
<?php
$page = new SiteNavigation();
$action = $_GET["action"] ?? "";
$page->navigate($action);

?>


<?php
require 'app/views/layout/footer.php';
?>

</body>

</html>