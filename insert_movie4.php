<html>
<head>
<title>Insert Movies Results</title>
<body>

<?



// get the data from the form and assign the data to variables

$title = $_POST['title'];
$directorfn = $_POST['directorfn'];
$directorln = $_POST['directorln'];
$year = $_POST['year'];
$genre = $_POST['genre'];
$runtime = $_POST['runtime'];
$plot = $_POST['plot'];
$comments = $_POST['comments'];



// check to see if all the data is there

if (!$title
 || !$directorfn
 || !$directorln
 || !$year
 || !$genre
 || !$runtime
 || !$plot
 || !$comments)
{
	echo "You have not entered all the required details.<br>"
		."Please go back and try again.";
	exit;
}



// add slashes and prepare the data for inserting into the db

$title = addslashes($title);
$directorfn = addslashes($directorfn);
$directorln = addslashes($directorln);
$year = intval($year);
$genre = addslashes($genre);
$runtime = intval($runtime);
$plot = addslashes($plot);
$comments = addslashes($comments);

// connect to the db

@ $db = new mysqli("fdb34.awardspace.net", "4040510_movies", "caleb007", "4040510_movies", 3306);

if (!$db)
{
	echo "ERROR: Could not connect to database.  Please try again later.";
	exit;
}


// select the db
mysqli_select_db($db, "4040510_movies");


// prepare the query

$query = "insert into director values
	('".NULL."','".$directorfn."','".$directorln."')";



// run the query

$result = mysqli_query($db, $query);

if($result)
	echo mysqli_affected_rows($db)." director added to Database.<br>";


$query = "insert into movie values
	('".NULL."','".$title."','".'"last_insert_id()"'.
"','".$year.
"','".$genre.
"','".$runtime.
"','".$plot.
"','".$comments."')";

$result = mysqli_query($db, $query);

if($result)
	echo mysqli_affected_rows($db)." movie added to Database.<br>";


?>

</body>
</html>


