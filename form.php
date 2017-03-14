<html>
<head>
<meta charset="utf-8">
<title>Εξεύρεση Πράξης ΕΣΠΑ/ΠΔΕ Που Ανήκουν Οι Εκπαιδευτικοί</title>
</head>


<body>

<?php

function died($error) {
        echo $error."<br /><br />";
        die();
    }
     
    // validation expected data exists
    
     

$surname=$_POST['surname'];
$name=$_POST['name'];
if(strlen($surname)==0 && strlen($name)==0){
        died('Πρέπει να εισάγετε το Επώνυμο και το Όνομά σας!');       
    }
# include parseCSV class.
require_once('parsecsv.lib.php');
# create new parseCSV object.
$csv = new parseCSV();
# Parse '_books.csv' using automatic delimiter detection...
$csv->encoding('iso8859-7','UTF-8');
$csv->conditions = 'surname is '.$surname.' AND name is '.$name;
$csv->auto('PRAKSEIS_ESPA.csv');
$parsed = $csv->data;
//print($csv->data);
# ...or if you know the delimiter, set the delimiter character
# if its not the default comma...
// $csv->delimiter = "\t";   # tab delimited
# ...and then use the parse() function.
// $csv->parse('_books.csv');
# Output result.
//print_r($csv->data);
?>

<h1>Αναζήτηση πράξεων-έργων που ανήκουν οι Αναπληρωτές Εκπαιδευτικοί</h1>
<h2>Η Πράξη Που Ανήκει Η/Ο Εκπαιδευτικός <?php echo $surname; ?> <?php echo $name; ?> Είναι	:</h2>
</br>
</pre>
<style type="text/css" media="screen">
	table { background-color: #BBB; }
	th { background-color: #EEE; }
	td { background-color: #FFF; }
</style>
<table border="0" cellspacing="1" cellpadding="3">
	
	<?php foreach ($csv->data as $key => $row): ?>
	<tr>
		<?php foreach ($row as $value): ?>
		<td><?php echo $value; ?></td>
		<?php endforeach; ?>
	</tr>
	<?php endforeach; ?>
</table>


</body>
</html>
