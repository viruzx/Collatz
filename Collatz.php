<?
//This is the Collatz Conjecture.
//Written when bored.
//Takes a number at messes around with it until it becomes one.
//Throws away non-integers. I probably don't check for it the right way but it works.
/*
	THE COLLATZ CONJECTURE STATES THAT IF YOU PICK A NUMBER, AND IF IT'S EVEN
	DIVIDE IT BY TWO AND IF IT'S ODD MULTIPLY IT BY THREE AND ADD ONE, AND IF
	YOU REPEAT THE PROCEDURE LONG ENOUGH, EVENTUALLY YOUR FRIENDS WILL STOP
	CALLING TO SEE IF YOU WANT TO HANG OUT.
	And it will also return 1.
*/
//Invented by Lothar Collatz in 1937 and code written by Slava Knyazev (@ViruZX5)
//"Mise en Garde"
//Buffer overflowing $number will treat the number as 9223372036854775807
$time_start = microtime(true); 
header('Content-Type: text/plain');
if (isset($_GET['i'])){
$number = (int) $_GET['i'];	
} else {
	die ('Error: Argument not specified.');
}
$cycles = 0;
if ($number == 0){
	die ('Error: Unexpected argument.');
}
function isEven ($i){
	//When given decimal numbers, function will
	//chop off numbers after the dot for some mystical reason...
	$mod = $i % 2;
	if ($mod==0){
		//Number is even, return true
		return true;
	}
	//Number is not even, return false
	return false;
}
function even ($i){
	//Do this.
	return $i/2;
}
function odd ($i){
	//Do that.
	return $i*3+1;
}
while ($number != 1){
	//Cycle through until one.
	$cycles = $cycles + 1;
	echo $number . "\n";
	if (isEven($number)){
		//Number is even
		$number = even($number);
	} else {
		//Number is odd
		$number = odd($number);
	}
}
echo 1 . "\n";
//Bam! Finished.
$time_end = microtime(true);
$total = ($time_end - $time_start)/60;
echo "Operation completed in $cycles cycles and it took $total seconds."
?>