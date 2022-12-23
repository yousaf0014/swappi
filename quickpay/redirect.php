<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['submit'])){
		var_dump(serialize($_POST));
	}	
}