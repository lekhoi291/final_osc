<?php

include 'database/dbh.php';
$data = new database();

?>


<html>
    <head>
        <title>[Homepage]</title>
        <link rel="stylesheet" href="css/header.css" type="text/css">
        <link rel="stylesheet" href="css/mainbody.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2">
        <script src="Js/jquery-3.3.1.min.js"></script>
        <script src="Js/jquery-3.3.1.js"></script>
        <link rel="stylesheet" href="css/homebody.css">
        <link rel="stylesheet" href="css/trash.css">
        <link rel="stylesheet" href="css/footer.css">
    </head>
    <body class="bodyhome">
        <header class="global-header">
            <div class="layout-wrapper">
                <div class="title">
                    <a href="index.php" class="icon header-logo"></a>
                </div>
                <nav class="link-list">
                    <ul>
                        <li class="link-item">
                            <a href="">Tags</a>
                        </li>
                        <li class="link-item">
                            <a href="">Wiki</a>
                        </li>
                        <li class="link-item">
                            <a href="">Help</a>
                        </li>
                        <li class="link-item settings-menu">
                            <a href="" class="label">Settings<span style='font-size:10px;'>&#9660;</span></a>
                            <ul class="items">
                                <li>
                                    <a href="userregistration/Profile/profile.html" class="item">User Profile</a>
                                </li>
                                <li>
                                    <a href="userregistration/Profile/profile_change.html" class="item">Profile Settings</a>
                                </li>
                                <li>
                                    <a href="userregistration/login.php" class="item">Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <nav class="nav-list">
                    <ul class="menus">
                        <li class="home">
                            <a href="index.php" class="current">
                                <span class="menu-icon icon-home"></span>Home
                            </a>
                        </li>
                        <li class="upload">
                            <a href="submit/submit.php">
                                <span class="menu-icon icon-upload"></span>Submit
                            </a>
                            <a href="" class="header-mangae">
                                <span class="text"></span>Manage     
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="nav-menu-right">
                    <div class="menu-group">
                        <a class="menu-item" href="gallery/gallery.php?page=1">
                            <img class="gallery-icon" src="img/gallery.png">
                            <span class="label">Gallery</span>
                        </a>
                    </div>
                    <div class="menu-group">
                        <a href="" class="menu-item">
                            <img class="discovery-icon" src="img/research.png">
                            <span class="label">Catagory</span>
                        </a>
                        <a href="gallery/filter/" class="menu-item">
                            <img class="contact-icon" src="img/contact.png">
                            <span class="label">Filter</span>
                        </a>
                    </div>
                </div>
                <form id="suggest-container" autocomplete="off" method="POST" class="ui-search" action="search/search.php">
                    <input type="hidden" name="s_mode" value="s_tag">
                    <div class="container">
                        <input type="text" id="suggest-input" name="world" valueplaceholder="Search result">
                    </div>
                    <input type="submit" class="submit search-icon" value>
                </form>
            </div>
        </header>

        <div class="homebody-wrapper">
            <div class="my-page">
                <div class="layout-west">
                    <div class="menu-unit"> 
                        <ul class="profile">
                            <li><a class="badge-campaign badge" href="">Campaign Plan</a></li>
                        </ul>
                        <ul class="menu-item">
                            <li><a href=""><span>Follow</span></a></li>
                            <li><a href=""><span>Follower</span></a></li>
                        </ul>
                        <ul class="menu-item">
                            <li><a href=""><span>Borrowing History</span></a></li>
                            <li><a href=""><span>Comment</span></a></li>
                        </ul>
                        <ul class="menu-item">
                            <li><a href=""><span>Group</span></a></li>
                            <li><a href=""><span>Event</span></a></li>
                        </ul>
                        <ul class="menu-item">
                            <li><a href=""><span>Projects</span></a></li>
                            <li><a href=""><span>About</span></a></li>
                            <li><a href=""><span>Guidelines</span></a></li>
                            <li><a href=""><span>Term Of Use</span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="layout-east">
                    <div class="content-east">
                        <div class="content-main">
                            <div class="rounded">
                                <div class="NewsTop">
                                    <h1>
                                        <a href="" title="Info">Info</a>
                                    </h1>
                                    <ul class="top-info-content">
                                        <?php 
                                        $db = mysqli_connect("localhost", "root", "", dbname);
                                        $sql = "SELECT * FROM PRODUCT ORDER BY id DESC LIMIT 3";
                                        $result = mysqli_query($db, $sql);
                                        while($row = mysqli_fetch_array($result)){
                                            $id = $row['id'];
                                            echo "<li style='width: 527px;' class='info'>";
                                                echo "<a class='category' style='font-size: 10px;'>New Product</a>";
                                                echo "<a href='view/view.php?id=$id' class='new-info'>".$row['product_name']."</a>";
                                            echo "</li>";
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <div id="item-container">
                                <section class="item">
                                    <header>
                                        <h1> About Plankton </h1>
                                    </header>
                                    <section class="content">
                                        <img src="img/logo.png">
                                        <p>Provide any product for you to wear.
                                        </p>
                                        <ul class="more">
                                            <li><a href="">&#8811; View More</a></li>
                                        </ul>
                                    </section>
                                </section>
                                <section class="item">
                                    <header>
                                        <h1><a href="">Discovery</a></h1>
                                    </header>
                                    <section class="content">
                                        <ul class="_image-item">
                                            <?php 
                                                $table = "PRODUCT";
                                                $extra = "ORDER BY RAND() LIMIT 4";
                                                $past_data = $data->select($table, $extra);
                                                foreach($past_data as $row){ 
                                                    $id = $row['id'];
                                                    ?>
                                                    <li class='image-item'>
                                                        <a href='view/view.php?id=<?php echo $id; ?>' class='work _work'>
                                                            <?php echo "<div class='_layout-thumbnail'>";
                                                                echo "<img src='submit/store/".$row['image_file']."' alt class='_thumbnail' style='opacity: 1;'>";
                                                            echo "</div>";
                                                        echo "</a>";
                                                        echo "<h1 class='title discovery-title' title='".$row['product_name']."'>".$row['product_name']."</h1>";
                                                        echo "<div class='index'>";
                                                            echo "<h1 class='title discovery-title' title='".$row['price']."'> Price: $".$row['price']."</h1>";
                                                                // echo "<p style ='text-align: left;'> Description: ".$row['image_description']."</p>";
                                                        echo "</div>";
                                                    echo "</li>";           
                                                }
                                            ?>
                                        </ul>
                                        <ul class="more">
                                            <li><a href="gallery/gallery.php?page=1">&#8811; View More</a></li>
                                        </ul>
                                    </section>
                                </section>
                            </div>
                        </div>
                        <div id="column-misc" class="content-right">
                            <section class="item daily-update">
                                <h1>
                                    <a href="">Daily Update</a>
                                </h1>
                                <ul class="categories">
                                    <li class="">
                                        <a href="" class="current">Overall</a>
                                    </li>
                                    <li>
                                        <a href="">T-Shirt</a>
                                    </li>
                                    <li>
                                        <a href="">Skirt</a>
                                    </li>
                                    <li>
                                        <a href="">More</a>
                                    </li>
                                </ul>
                                <ol class="updating">
                                    <?php
                                    $db = mysqli_connect("localhost", "root", "", dbname);
                                    $sql = "SELECT * FROM PRODUCT ORDER BY id DESC LIMIT 3";
                                    $result = mysqli_query($db, $sql);  
                                    
                                    while($row = mysqli_fetch_array($result)){
                                        $id = $row['id'];
                                        echo "<li class='update-detail'>";
                                            echo "<div class='update-image-container'>";
                                                echo "<a href='view/view.php?id=".$id."' class='work'>";
                                                    echo "<div class='layout-thumbnail'>";
                                                    echo "<img class='thumbnail' src='submit/store/".$row['image_file']."' alt style='opacity: 1;'>";
                                                    echo "</div>";
                                                echo "</a>";
                                            echo "</div>";
                                            echo "<h2>";
                                                echo "<a>";
                                                    echo "".$row['product_name']."";
                                                echo "</a><br>";
                                                    echo "Price: $".$row['price']."";
                                            echo "</h2>";
                                        echo "</li>";
                                    }
                                    ?>
                                </ol>
                                <div class="more">
                                    <a href="">View more</a>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container">
                    <dl class="links">
                        <dt>About Plankton</dt>
                        <dd>
                            <ul>
                                <li>
                                    <a href="">Info</a>
                                </li>
                                <li>
                                    <a href="">Help</a>
                                </li>
                                <li>
                                    <a href="">Term of Use</a>
                                </li>
                                <li>
                                    <a href="">Guidelines</a>
                                </li>
                                <li>
                                    <a href="">Privacy Policy</a>
                                </li>
                            </ul>
                        </dd>
                    </dl>
                    <dl class="links">
                        <dt>Contact</dt>
                        <dd>
                            <ul>
                                <li>
                                    <a href="">Twitter</a>
                                </li>
                                <li>
                                    <a href="">Facebook</a>
                                </li>
                                <li>
                                    <a href="">Google+</a>
                                </li>
                                <li>
                                    <a href="">Advertising and Corporate Services</a>
                                </li>
                            </ul>
                        </dd>
                    </dl>
                    <dl class="links"></dl>
                    <dl class="links">
                        <div class="footer-title">
                            <div class="footer-logo"></div>
                        </div>
                    </dl>
                    <div class="copyright">&copy; Le Nguyen Khoi</div>
                </div>
            </footer>
        </div>
    </body>
</html>