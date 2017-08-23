<h3> Your data: </h3>
<?
require "../m/db.php"; //Подключаем БД
$view = "";
$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$region = htmlspecialchars($_POST['region']);
$district = htmlspecialchars($_POST['district']);
$city = htmlspecialchars($_POST['city']);
$query = "SELECT * FROM users where email='$email'";

$result = mysql_query($query) or die(mysql_error());
$territory = $region . " " . $district . " " . $city;
?>
name —  <?php echo $name; ?><br>
email — <?php echo $email; ?> <br>
territory — <?php echo $territory; ?><br>
<?

$num_ans = mysql_fetch_row($result);
if ($num_ans) {

    echo '<h4>User with this email is exist!!!</h4>';
    $query = "SELECT * FROM users where email='$email'";
    $result = mysql_query($query) or die(mysql_error());


    while ($row = mysql_fetch_array($result)) {
        $view .= 'name —'.$row['name'].'<br>'.
                 'email —'.$row['email'].'<br>'.
                 'territory —'.$row['territory'].'<br><hr>';

    }


    return;
} else {
    echo "<h4>You are successfully registered!!! </h4>
           <h4>List of register users:</h4> ";
    $query = "INSERT INTO users (
`id` ,
`name` ,
`email` ,
`territory`
)
VALUES (
    NULL , '$name', '$email', '$territory'
);";
    $result = mysql_query($query) or die(mysql_error());
}
$query = "SELECT * FROM users ";
$result = mysql_query($query) or die(mysql_error());

while ($row = mysql_fetch_array($result)) {

    $view .= 'name —'.$row['name'].'<br>'.
        'email —'.$row['email'].'<br>'.
        'territory —'.$row['territory'].'<br><hr>';




}
?>











