<?php
/**
 * f = function (load, save, flush); t = table (flintstone load);
 * d = data (empty or json array); i = index (empty or record id in table)
 */
$f=$t=$d=$i='';
if(isset($_POST['t']))$t=$_POST['t'];
if(isset($_POST['f']))$f=$_POST['f'];
if(isset($_POST['i']))$i=$_POST['i'];
if(isset($_POST['d']))$d=json_decode($_POST['d'],true);

require_once('flintstone.class.php');

try {
	// Set options
	$options = array('dir' => 'db/', 'gzip' => true);
	// Load table
	$read = Flintstone::load($t, $options);
	// Load index record
	$index=$read->get('index');
	if($f=='load'){
		if($i==''){
			// Load table keys
			$out = $read->getKeys();
			echo json_encode($out);			
		}else{
			// Load the recors
			$out = $read->get($i);
			echo json_encode($out);
		}
	}
	if($f=='save'){
		// Save new element [unixtime]=d
		$now=time();
		$read->set( $now , $d);
		// Append element in index
		$index[]=$now;
		$read->set( "index" , $index);
		echo'added';
	}
	if($f=='display'){
		// display ordered list (sorted)
		foreach ($index as $key => $value) {
			$post[]=$read->get($value);
		}
		echo json_encode($post);
	}
	if($f=='flush'){
		// Flush the database
		$read->flush();
	}
}
catch (FlintstoneException $e) {
	echo 'An error occured: ' . $e->getMessage() . "-$t";
}
?>