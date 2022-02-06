<?php 
// include 'config/App.php';

// use App\DotEnv;
// (new DotEnv(__DIR__ . '/.env'))->load();

class Database {

    private $dbhost = "192.168.0.2";
    private $dbusername = "iboydev";
    private $dbpassword = "P@554mysql";
    private $dbname = "db_tes"; 
    // private $dbhost = null;
    // private $dbusername = null;
    // private $dbpassword = null;
    // private $dbname = null;

    // protected $connection = null;

    // function __construct() {
    //     $this->dbhost = getenv('DB_HOST');
    //     $this->dbusername = getenv('DB_USER');
    //     $this->dbpassword = getenv('DB_PASSWORD');
    //     $this->dbname = getenv('DB_NAME');
    // }

    //create connection 
    public function connect() {
        $conn = new mysqli($this->dbhost, $this->dbusername, $this->dbpassword, $this->dbname) or die("Database connection error." . $conn->connect_error);
        return $conn;           
    }
    
    // close connection
    public function close($conn) {        
        $conn->close();    
    }
}
