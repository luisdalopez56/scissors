<?php

// Demand a GET parameter
if (!isset($_GET['name']) || strlen($_GET['name']) < 1) {
    die('Name parameter missing');
}

// If the user requested logout go back to index.php
if (isset($_POST['logout'])) {
    header('Location: index.php');
    return;
}

// Set up the values for the game...
// 0 is Rock, 1 is Paper, and 2 is Scissors
$names = array('Rock', 'Paper', 'Scissors');
$human = isset($_POST["human"]) ? $_POST['human'] + 0 : -1;

$computer = rand(0, 2);; // Hard code the computer to rock
// TODO: Make the computer be random
// $computer = rand(0,2);

// This function takes as its input the computer and human play
// and returns "Tie", "You Lose", "You Win" depending on play
// where "You" is the human being addressed by the computer
function check($computer, $human)
{
    switch ($computer) {
        case 0:
            # code...
            if ($human == '0') return 'Tie';
            if ($human == '1') return 'You Win';
            if ($human == '2') return 'You Lose';
            break;

            case 1:
                if ($human == '0') return 'You Lose';
                if ($human == '1') return 'Tie';
                if ($human == '2') return 'You Win';
            break;

            case 2:
                if ($human == '0') return 'You Win';
                if ($human == '1') return 'You Lose';
                if ($human == '2') return 'Tie';
            break;

        default:
            # code...
            break;
    }
    // For now this is a rock-savant checking function
    // TODO: Fix this
   
    return false;
}

// Check to see how the play happenned
$result = check($computer, $human);

?>
<!DOCTYPE html>
<html>

<head>
    <title>Dr. Luis David López Uceda's Rock, Paper, Scissors Game</title>
    <?php require_once "bootstrap.php"; ?>
</head>

<body>
    <div class="container">
        <h1>Rock Paper Scissors</h1>
        <?php
        if (isset($_REQUEST['name'])) {
            echo "<p>Welcome: ";
            echo htmlentities($_REQUEST['name']);
            echo "</p>\n";
        }
        ?>
        <form method="post">
            <select name="human">
                <option value="-1">Select</option>
                <option value="0">Rock</option>
                <option value="1">Paper</option>
                <option value="2">Scissors</option>
                <option value="3">Test</option>
            </select>
            <input type="submit" value="Play">
            <input type="submit" name="logout" value="Logout">
        </form>

        <pre>


        
<?php
if ($human == -1) {
    print "Please select a strategy and press Play.\n";
} else if ($human == 3) {
    for ($c = 0; $c < 3; $c++) {
        for ($h = 0; $h < 3; $h++) {
            $r = check($c, $h);
            echo '<table>
<tbody>
<tr>
<td><img src="../Scissors/images/' . $names[$h] . '.png" height=100px; width=100px;" style="    margin: 30px;"/></td>
<td><img src="../Scissors/images/' . $names[$c] . '.png" height=100px; width=100px;  style="    margin: 30px;"/></td>
</tr>
<tr style="text-align: center;">
<td><p>'; 
 echo 
 "Your Play=" . $names[$h]; 
 echo '</p></td>
<td><p>Computer Play=' . $names[$c] . '</p></td>
</tr>
<tr style="text-align: center;">
<td colspan="2"><p> Result=' . $r . '</p></td>
<td></td>
</tr>
</tbody>
</table>';
        }
    }
} else {

    echo '<table>
<tbody>
<tr>
<td><img src="../Scissors/images/' . $names[$human] . '.png" height=100px; width=100px;" style="    margin: 30px;"/></td>
<td><img src="../Scissors/images/' . $names[$computer] . '.png" height=100px; width=100px;  style="    margin: 30px;"/></td>
</tr>
<tr style="text-align: center;">
<td><p> Your Play =' . $names[$human] . '</p></td>
<td><p>Computer Play =' . $names[$computer] . '</p></td>
</tr>
<tr style="text-align: center;">
<td colspan="2"><p> Result=' . $result . '</p></td>
<td></td>
</tr>
</tbody>
</table>';
}
?>
</pre>
    </div>

</body>

</html>