<?php
    error_reporting(E_ALL);
    ini_set('display_errors','On');
    $url_or_ip_regex = '/^(\w*\.)+(\w+\z)/';
    $number_regex = '/^\d+\z/';

    if (!isset($_POST['submit'])) $_POST['submit'] = "NOK";
    if ($_POST['submit'] == "OK"){
        if (( preg_match($url_or_ip_regex, $_POST['ip']) == 1 ) 
            and ( preg_match($number_regex, $_POST['attempt'] ) == 1 )) {

            echo '<hr />Pinging: '. $_POST['ip'] . '
            <pre>';
            $command = 'ping ' . $_POST['ip'] . ' -c ' . $_POST['attempt'];
            $last_line = system($command, $retval);
            echo '
            </pre>
            <hr />Exit code: ' . $retval .'
            <hr /> Do you want to do another test ?';
        } else { 
            echo '<h2>INCORECT SYNTAX</h2>';
        }
    }
    else
            echo '<hr /> <h2>Do you want to do a ping ?</h2>';
?>

<form action="index.php" method="post">
 <p>Ip address or domain name : <input type="text" name="ip" /></p>
 <p>Number of attempt : <input type="text" name="attempt" /></p>
 <p><input type="submit" name="submit" value="OK"></p>
</form>

