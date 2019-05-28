<html>
    <head>
        <title>[View]</title>
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
                <form id="suggest-container" autocomplete="off" method="get" class="ui-search" action="search.php">
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
            <section class="item">
                <?php 
                    include '../database/dbh.php';
                    $data = new database();
                    $id = $_GET['id'];
                    $table = "PRODUCT";
                    $extra = "WHERE id=$id";
                    $past_data = $data->select($table, $extra);
                    foreach($past_data as $row){ 
                ?>
                <header>
                <input type="hidden" name='image_id' value="<?php echo $row['id'] ?>">
                    <h1><?php echo $row['product_name']; ?>
                        <div class="edit-delete">
                            <ul class="footer">
                                <li>
                                    <a href="../edit/edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                                </li>
                                <li>
                                <a href="../delete/delete.php?id=<?php echo $row['id'] ?>" onclick="javascript: return confirm('Are you SURE you wish to do this?');">Delete</a>
                                </li>
                            </ul>
                        </div>
                    </h1>
                </header>
                <section class="content">
                    <img src="../submit/store/<?php echo $row['image_file']; ?>"> 
                </section>
                <header><h1>Description</h1></header>
                    <p><?php echo $row['description'];?>
                    </p>
                <?php } ?>    
            </section>
        </div>
    </div>
    </body>
</html>