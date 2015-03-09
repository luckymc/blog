<?php
function limit_title($title, $n){
	if ( strlen ($title) > $n ){
		//echo substr(the_title($before = ”, $after = ”, FALSE), 0, $n) . ‘…’;
		echo substr(the_title($before = ”, $after = ”, FALSE), 0, $n) . …;
	}else{ 
		the_title();
	}
}
?>