<?php
    include 'defind.php';

class database{
    public $conn;
    
    public function __construct()
    {
        $this->conn = mysqli_connect(server, user, password);

        $create_database = "CREATE DATABASE final_test"; 
        mysqli_query($this->conn, $create_database);

        $this->conn = mysqli_connect(server, user, password, dbname);
            
        $table1 = "CREATE TABLE `PRODUCT` (
            `id` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
            `image_file` varchar(5000) NOT NULL,
            `product_name` varchar(255) NOT NULL,
            `catagory` varchar(255) NOT NULL,
            `color` varchar(255) NOT NULL,
            `price` varchar(255) NOT NULL,
            `description` varchar(255) NOT NULL,
            `product_status` enum('0','1') NOT NULL
            )";
        
        $table2 = "CREATE TABLE CATAGORY (
            id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            catagory VARCHAR(100) NOT NULL,
            parent_id INT(11) NULL
            )";


        $tables = [$table1, $table2];


        foreach($tables as $k => $sql){
            $query = @$this->conn->query($sql);

        }

        $insert_sample0 = "INSERT INTO `CATAGORY` (`id`, `catagory`, `parent_id`) VALUES
        (1, 't-shirst', NULL),
        (2, 't-shirt but cool', 1),
        (3, 'skirt but not cool', 4),
        (4, 'skirt', NULL),
        (6, 'Summer Shirt', 1);"; 
        mysqli_query($this->conn, $insert_sample0);
        

        $insert_sample = "INSERT INTO `PRODUCT` (`id`, `image_file`, `product_name`, `catagory`, `color`, `price`, `description`, `product_status`) VALUES
        (2, '57605248_1195425037298503_2816229988930420736_n.png', '231231', 't-shirst', 'Black', '312', '241212', '1'),
        (52, '73959570_p0.jpg', '123124', 'skirt', 'Red', '18746', '123124124', '1'),
        (53, 'anime_landscape_blue_sky_stars_night_reflection-27810.png', 'country side', 't-shirt but cool', 'Red', '123124', 'chicken', '1'),
        (54, '5a4fb164146669.5ac87209d1051.jpg', 'warship', 'skirt but not cool', 'Blue', '9877', 'warship', '1'),
        (55, '73858612_p0.png', 'fsda', 't-shirst', 'Green', '123124', 'reewfds', '1');"; 
        mysqli_query($this->conn, $insert_sample);
    }

    public function select($table, $extra){
        $array = array();
        $query = 'SELECT * FROM '.$table.' '.$extra.'';
        $result = mysqli_query($this->conn, $query);
        while($row = mysqli_fetch_array($result)){
            $array[] = $row;
        }
        return $array;
    }
}
?>