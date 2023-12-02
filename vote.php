<?php 
session_start();
 ?>

<link href="votestyle.css" rel="stylesheet"> 

<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "studentVote";

echo "<h1>FST VOTE </h1>";
echo"<h2>Votez pour votre candidat.</h2>";
echo "<h2>Les candidats sont:<br></h2>";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id, name, slogan FROM candidate";
$result = $conn->query($sql);

?>
<form action='voteCaste.php' method='POST'>
    <table class="table">
<?php	
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><label>";
    	echo "<input type=\"radio\" name=\"chosen_candidate\" value=\"".$row['name']."\">";
        echo " ". $row["name"]. " ,". $row["slogan"] . "<br><hr>";
        echo "</label></tr>";
    }
} else {
    echo "0 results";
}

$conn->close();
?> 
</table>
<input type="submit" value="Vote Now" class="btn">
</form>
<style>
	body{
		backgroud-color:#345;
        font-family: "Secular One", serif;
        text-align: center;
        max-width: 750px;
        margin-right: auto;
        margin-left: auto;
	} 
    h1{
        color: aqua;
    }
    .btn{
        padding:5px 15px;
        background-color: #00ffd2;
    }
</style>

