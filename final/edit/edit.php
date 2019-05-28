<?php
include 'php/edit_function.php';

$servername = "localhost";
$username ="root";
$password = "";
$dbname = "final_test";
$id = $_GET['id'];
$db = mysqli_connect($servername, $username, $password, $dbname);
$sql = "SELECT * FROM PRODUCT WHERE id=$id";

$result = mysqli_query($db, $sql);
while($row = mysqli_fetch_array($result)){ 
?>

<html>
    <head>
        <title>[Edit]</title>
        <link rel="stylesheet" href="../css/header.css" type="text/css">
        <link rel="stylesheet" href="../css/mainbody.css" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2">
        <script src="../Js/jquery-3.3.1.min.js"></script>
        <script src="../Js/jquery-3.3.1.js"></script>
        <link rel="stylesheet" href="css/submit_form.css">
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
                            <a href="../submit/submit.php" class="current">
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
                <form id="suggest-container" autocomplete="off" method="get" class="ui-search" action="search.php">
                    <input type="hidden" name="s_mode" value="s_tag">
                    <div class="container">
                        <input type="text" id="suggest-input" name="word" valueplaceholder="Search result">
                    </div>
                    <input type="submit" class="submit search-icon" value>
                </form>
            </div>
        </header>

        <form class="form_submit" action="<?php $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data" name="edit">
            <div class="pic_submit">
                <section class="unit">
                    <section class="items">
                        <div class="input-title item text">
                            <div class="fail-container"></div>
                            <script src="js/count.js"></script>
                            <input type="text" name="product_name" placeholder="Title" value="<?php echo $row['product_name']; ?>" maxlength="50" class="input" onkeyup="title_count(this.value)" >
                            <div class="count-container options">
                                <span class="charcount">0</span>
                                /50
                            </div>
                            <?php echo @$title_error; ?>
                        </div>
                        <div class="input-title item text">
                        <div class="fail-container"></div>
                        <?php echo @$description_error; ?>
                            <textarea name="description" placeholder="Description" maxlength="3000"
                            class="input" style="margin-top: 0px; margin-bottom: 0px; height: 216px;" onkeyup="cmt_count(this.value)"><?php echo $row['description']; ?></textarea>
                            <div class="count-container options">
                                <span class="cmtcount">0</span>
                                /3000
                            </div>
                        </div>
                        <input type="hidden" name='id' value="<?php echo $row['id'] ?>"> 
                    </section>
                    <div class="submit-container">
                        <a href="../view/view.php?id=<?php echo $row['id'] ?>" onclick="javascript: return confirm('Are you SURE you do not want to change anything?');">
                        <input type="button" class="action-submit" value="Back" id="submit">
                        </a> 
                        <input type="submit" value="Change"
                        class="action-submit" id="submit" name="submit">
                        <a href="../delete/delete.php?id=<?php echo $row['id'] ?>" onclick="javascript: return confirm('Are you SURE you wish to do this?');">
                        <input type="button" class="action-submit" value="Delete" id="submit">
                        </a> 
                    </div>
                </section>
                <?php
                }
                ?>
            </div>
        </form>
    </body>
</html>