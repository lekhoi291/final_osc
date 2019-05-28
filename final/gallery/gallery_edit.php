<html>
    <head>
        <title>[Gallery]</title>
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
                    </ul>
                </nav>
                <div class="nav-menu-right">
                    <div class="menu-group">
                        <a class="menu-item" href="gallery/gallery.html">
                            <img class="gallery-icon" src="../img/gallery.png">
                            <span class="label">Gallery</span>
                        </a>
                    </div>
                    <div class="menu-group">
                        <a href="" class="menu-item">
                            <img class="discovery-icon" src="../img/research.png">
                            <span class="label">Research</span>
                        </a>
                        <a href="" class="menu-item">
                            <img class="contact-icon" src="../img/contact.png">
                            <span class="label">Contact</span>
                        </a>
                    </div>
                </div>
                <form id="suggest-container" autocomplete="off" method="POST" class="ui-search" action="../search/search.php">
                    <input type="hidden" name="s_mode" value="s_tag">
                    <div class="container">
                        <input type="text" id="suggest-input" name="word" valueplaceholder="Search result">
                    </div>
                    <input type="submit" class="submit search-icon" value>
                </form>
            </div>
        </header>
    <div class="homebody-wrapper">
        <div id="item-container">
            <form action="../delete/multi_delete.php" method="POST">
            <section class="item">
                <header>
                    <h1>List
                    <div class="edit-delete">
                            <ul class="footer">
                                <li>
                                    <a href="gallery.php?page=1"><input type="button" id="mode" value="Back" class="action-submit"></a>
                                    <input type="submit" name="delete" value="Delete" class="action-submit">
                                </li>
                            </ul>
                        </div>
                    </h1>
                </header>
                <section class="content">
                    <ul class="_image-item">
                        <?php 
                            $servername = "localhost";
                            $username ="root";
                            $password = "";
                            $dbname = "final_test";

                            $db = mysqli_connect($servername, $username, $password, $dbname);
                            $sql = "SELECT * FROM PRODUCT ORDER BY id DESC";
                            
                            $result = mysqli_query($db, $sql);                                                    
                            while($row = mysqli_fetch_array($result)){
                                $id = $row['id'];
                                ?> <li class='image-item'>
                                    <a href='../view/view.php?id=<?php echo $id; ?>' class='work _work'>
                                        <div class='_layout-thumbnail'>
                                            <img src='<?php 
                                                if(empty($row['image_file'])){
                                                    echo "../img/no_profile.png";
                                                }
                                                else{
                                                    echo "../submit/store/".$row['image_file']."";
                                                }
                                            ?>' alt class='_thumbnail' style='opacity: 1;'>
                                        <?php echo "</div>";
                                    echo "</a>";
                                    echo "<h1 class='title discovery-title' title='".$row['product_name']." '>".$row['product_name']."</h1>";
                                    echo "<div class='index'>";
                                        echo "<input type='checkbox' name='checkbox[]' value='".$row['id']."'>";
                                    echo "</div>";
                                echo "</li>";
                            }
                        ?>
                    </ul>
                    <ul class='pagination'>        
                    
                    </ul>
                </section>
            </section>
            </form>
        </div>
    </div>
    </body>
</html>