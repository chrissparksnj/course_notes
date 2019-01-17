ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$assoc = array('a' => 1, 'b' => 2, 'c' => 3);
$array = array('a', 'b', 'c');
echo json_encode($assoc);
echo "<br />";
echo json_encode($array);
echo "<br />";
echo json_encode($array, JSON_FORCE_OBJECT);
class User{
    public $first_name = "Joe";
    public $last_name = "Public";
    private $secret_name = "Whole life built on Fake Id";
}

$user = new User();
echo json_encode($user);
