// Javascript

xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

// Is Http X set
// is it set to xmlHttpRequest

function is_ajax_request(){
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
   	$_SERVER['HTTP_X_REQUESTED_WITH'] == "XMLHttpRequest";
   }


// Json encode PHP
$assoc = array('a'=>1, 'b' => 2, 'c' => 3);
json_encode($assoc);
{"a":1,"b":2,"c":3}

// Regular array
$array = array('a', 'b', 'c');
json_encode($array);
['a', 'b', 'c'];

// Json_Encode Force
$array = array('a', 'b', 'c');
json_encode($array, JSON_FORCE_OBJECT);
{"0":"a","1":"b","2":"c"}

//Jsonify Classes
// * public items only
class User{

        public $first_name = "Joe";
        public $last_name = "Public";
        private $secret_name = "Sloppy Joe";

}

$user = new User();
json_encode($user);
{"first_name":"Joe","last_name":"Public"}



$content = array(
        "short" => "New Content",
        "regular" => "This is the regular content",
        "long" => "This is a very long item filled with content"
);

// Parsing with Javascript
var json = JSON.parse(xhr.responseText);
echo json.field
