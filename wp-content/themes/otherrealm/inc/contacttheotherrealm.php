<?php
$preventspam = htmlspecialchars($_GET["simplewaytopreventspam"]);
if ($preventspam == '1dft334rfgb54t43wb645e4trf4g5654e5rf34v567ju5e64yega5b65eu6i8jrhya34WT5Y67J~``~') {
	include 'email.php';
	print($email);
} else {
	var_dump($preventspam);
}
