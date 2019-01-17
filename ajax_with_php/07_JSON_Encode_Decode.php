<?php

$assoc = array('a' => 1, 'b' => 2,'c' => 3);
json_encode($assoc);
//{a:1, b:2, c:3}

$array = array('a', 'b', 'c');
json_encode($array);

// ['a', 'b', 'c']

json_encode($array, JSON_FORCE_OBJECT);
// {0:a, 1:b, 2:c}



class User {
	public $first_name = "Joe";
	public $last_name = "Public";
	private $secret_name = "Sloppy_Joe";

}

$user = new User();
json_encode($user);

// {"first_name":"joe", "last_name": "Public"}
// Only public properties are serialized


json_decode();
?>
