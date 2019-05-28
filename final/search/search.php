<html>
    <head>
        <title>[Search Result]</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2">
        <link rel="stylesheet" href="../css/header.css"> 
        <link rel="stylesheet" href="../css/mainbody.css">
        <link rel="stylesheet" href="../css/homebody.css">
    </head>
    <body>
    <header class="global-header">
            <div class="layout-wrapper">
                <div class="title">
                    <a href="../index.php" class="icon header-logo"></a>
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
                                    <a href="../profile_change.html" class="item">User Settings</a>
                                </li>
                                <li>
                                    <a href="" class="item">Profile Settings</a>
                                </li>
                                <li>
                                    <a href="" class="item">Notification Settings</a>
                                </li>
                                <li>
                                    <a href="" class="item">Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <nav class="nav-list">
                    <ul class="menus">
                        <li class="home">
                            <a href="../index.php">
                                <span class="menu-icon icon-home"></span>Home
                            </a>
                        </li>
                        <li class="upload">
                            <a href="../submit/submit.php">
                                <span class="menu-icon icon-upload"></span>Submit
                            </a>
                            <a href="" class="header-mangae">
                                <span class="text"></span>Manage     
                            </a>
                        </li>
                        <li class="bookmark">
                            <a href="">
                                <span class="menu-icon icon-bookmark"></span>Bookmark
                            </a>
                        </li>
                        <li class="feed">
                            <a href="">
                                <span class="menu-icon icon-feed"></span>Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="nav-menu-right">
                    <div class="menu-group">
                        <a class="menu-item" href="../gallery/gallery.php?page=1">
                            <img class="gallery-icon" src="../img/gallery.png">
                            <span class="label">Gallery</span>
                        </a>
                    </div>
                    <div class="menu-group">
                        <a href="" class="menu-item">
                            <img class="discovery-icon" src="../img/research.png">
                            <span class="label">Catagory</span>
                        </a>
                        <a href="../gallery/filter" class="menu-item">
                            <img class="contact-icon" src="../img/contact.png">
                            <span class="label">Filter</span>
                        </a>
                    </div>
                </div>
                <form id="suggest-container" autocomplete="off" method="POST" class="ui-search" action="#">
                    <input type="hidden" name="s_mode" value="s_tag">
                    <div class="container">
                        <input type="text" id="suggest-input" name="world" valueplaceholder="Search result">
                    </div>
                    <input type="submit" class="submit search-icon" value>
                </form>
            </div>
        </header>
    </body>
    <div class="homebody-wrapper">
        <div id="item-container">
            <section class="item">
                <header>
                    <h1>Search Result of "<?php echo $_POST['world']?>"</h1>
                </header>
                <section class="content">
                    <ul class="_image-item">
                        <?php
                        $world = $_POST['world'];
                        $servername = "localhost";
                        $username ="root";
                        $password = "";
                        $dbname = "final_test";
                        
                        $db = mysqli_connect($servername, $username, $password, $dbname);
                        $world = preg_replace("#[^0-9a-z]#i","",$_POST['world']);
                        $sql = "SELECT * FROM PRODUCT WHERE product_name LIKE '%$world%' or description LIKE '%$world%' or price LIKE '%$world%'  ORDER BY id DESC ";
                        $result = mysqli_query($db, $sql);
                        $count = mysqli_num_rows($result);                                                    
                        if($count == 0){
                            echo "<p> Sorry, we don't find anything </p>";
                        }
                        else{
                            while($row = mysqli_fetch_array($result)){
                                echo "<li class='image-item'>";
                                echo "<a href='../view/view.php?id=".$row['id']."' class='work _work'>";
                                echo "<div class='_layout-thumbnail'>";
                                    echo "<img src='../submit/store/".$row['image_file']."' alt class='_thumbnail' style='opacity: 1;'>";
                                echo "</div>";
                                echo "</a>";
                                echo "<a href='' class='index'>";
                                    echo "<h1 class='title discovery-title' title='".$row['product_name']."'>".$row['product_name']."</h1>";
                                echo "</a>";
                                echo "<h1 class='title discovery-title' title='".$row['price']."'> Price: $".$row['price']."</h1>";
                                // echo "<p style ='text-align: left;'> Description: ".$row['image_description']."</p>";
                            }
                        }
                        ?>
                    </ul>
                </section>
            </section>
        </div>
    </div>
</html>