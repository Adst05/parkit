<?php 
//  class Database{
//      private $server = "localhost";
//      private $username = "root";

//      private $password = "";
//      private $database = "perpustakan";

//      protected $db;
//      public function __construct()
//      {

//         $this->db = mysqli_connect($this->server, $this->username, $this->password, $this->database);
//      }
//  }

?>

<?php 

class Database{
    private $server = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "perpustakaan_b";

    protected $db;

    public function __construct()
    {
        $this->db = mysqli_connect($this->server, $this->username, $this->password, $this->database);
    }
}

?>