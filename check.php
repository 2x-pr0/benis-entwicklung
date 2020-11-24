<?php
/**
 * showScore
 * 
 * Zeigt nur den Benis eines Users an.
 * 
 * @author    RundesBalli <webspam@rundesballi.com>
 * @copyright 2019 RundesBalli
 * @version   2.0
 * @license   MIT-License
 * @see       https://github.com/RundesBalli/pr0gramm-apiCall
 * @see       https://github.com/RundesBalli/pr0gramm-showScore
 */

/**
 * Username dessen Benis angezeigt werden soll.
 * 
 * Beispielwert: RundesBalli
 * 
 * @var string
 */
$username = "2x";

/**
 * Einbinden des apiCalls
 * https://github.com/RundesBalli/pr0gramm-apiCall
 * 
 * Beispielwert: /pfad/zum/apiCall.php
 * 
 * @param string
 */
require_once("/var/www/html/pr0/apiCall.php");

/**
 * Holen des Scores und Ausgeben ebendieses.
 */
$response = apiCall("https://pr0gramm.com/api/profile/info/?name=".$username);
header("Content-Type: text/plain");
$file = "/var/www/html/pr0/benis_alt.txt";
$aktueller_benis = $response['user']['score'];
$alter_benis = file_get_contents("/var/www/html/pr0/benis_alt.txt");

if ($aktueller_benis > $alter_benis) {
print("GRUEN");
shell_exec("cd /var/www/html/pr0/ && /usr/bin/python /var/www/html/pr0/green.py");
}

else if($aktueller_benis < $alter_benis) {
print("ROT");
shell_exec("cd /var/www/html/pr0/ && /usr/bin/python /var/www/html/pr0/red.py");
}

else if($aktueller_benis == $alter_benis) {
print("WHITE");
shell_exec("cd /var/www/html/pr0/ && /usr/bin/python /var/www/html/pr0/white.py");
}

file_put_contents($file, $response['user']['score']);

?>
