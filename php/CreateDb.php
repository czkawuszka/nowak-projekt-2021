<?php


class CreateDb
{
        public $servername;
        public $username;
        public $password;
        public $dbname;
        public $tablename;
        public $con;


        // konstruktor
    public function __construct(
        $dbname = "Newdb",
        $tablename = "Items",
        $servername = "localhost",
        $username = "root",
        $password = ""
    )
    {
      $this->dbname = $dbname;
      $this->tablename = $tablename;
      $this->servername = $servername;
      $this->username = $username;
      $this->password = $password;

      // connect
        $this->con = mysqli_connect($servername, $username, $password);

        // sprawdz czy dziala polaczenie
        if (!$this->con){
            die("Connection failed : " . mysqli_connect_error());
        }

        // robisz tu databaze
        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

        if(mysqli_query($this->con, $sql)){

            $this->con = mysqli_connect($servername, $username, $password, $dbname);

            // robisz tu tabele
            $sql = " CREATE TABLE IF NOT EXISTS $tablename
                            (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                             name VARCHAR (256) NOT NULL,
                             id_categories VARCHAR (32) NOT NULL,
                             price FLOAT,
                             image_path VARCHAR (1024)
                            );";

            if (!mysqli_query($this->con, $sql)){
                echo "Error creating table : " . mysqli_error($this->con);
            }

        }else{
            return false;
        }
    }

    // wez rzecz z databazy
    public function getData(){
        $sql = "SELECT * FROM $this->tablename";

        $result = mysqli_query($this->con, $sql);

        if(mysqli_num_rows($result) > 0){
            return $result;
        }
    }

    public function getNewData(){
        $sql = "SELECT * FROM $this->tablename order by date_added DESC";

        $result = mysqli_query($this->con, $sql);

        if(mysqli_num_rows($result) > 0){
            return $result;
        }
    }
}
