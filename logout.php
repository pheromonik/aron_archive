<?php
session_start();
session_destroy();

echo "<script type=\"text/javascript\">\n";
echo "window.setTimeout('open(\"http://www.aron.games/index.php\", \"_self\")', 3);\n";
echo "</script>\n";

?>