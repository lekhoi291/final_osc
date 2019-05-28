<?php 
include '../database/dbh.php';
include '../database/defind.php';
include 'php/upload.php';
$data = new database();

$con = mysqli_connect(server, user, password, dbname);
$sql = "SELECT * FROM menu";

$res = mysqli_query($con, $sql);
$output ="";

function show_menu(){
    $conn = mysqli_connect(server, user, password, dbname);
    $menus = '';
    $menus .= multi_level_menu($conn);
    return $menus;  
}

function multi_level_menu($conn, $parent_id = NULL, $char='- '){
    $menu ="";
    $sql ="";
    if(is_null($parent_id)){
        $sql = "SELECT * FROM CATAGORY WHERE parent_id IS NULL";
    }
    else{
        $sql = "SELECT * FROM CATAGORY WHERE parent_id=$parent_id";
    }
    $res = mysqli_query($conn, $sql); 
    while($row = mysqli_fetch_array($res)){
        $id = $row['id'];
        $sql1 = "SELECT * FROM CATAGORY WHERE parent_id=$id";
        $res1 = mysqli_query($conn, $sql1);

        $menu .= "<option value='".$row['catagory']."'>".$row['catagory']."</option>";
        while($row1 = mysqli_fetch_array($res1)){
        $menu .= "<option value='".$row1['catagory']."'>".$char.$row1['catagory']."</option>";
        }
        $menu .= "</ul></li>"; 
    }
    return $menu;   
}
?>

<html>
    <head>
        <title>[Submit]</title>
        <link rel="stylesheet" href="../css/header.css" type="text/css">
        <link rel="stylesheet" href="../css/mainbody.css" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2">
        <script src="../Js/jquery-3.3.1.min.js"></script>
        <script src="../Js/validate_ajax.js"></script>
        <script src="../Js/jquery-3.3.1.js"></script>
        <link rel="icon" href="../img/plankton.png">
        <link rel="stylesheet" href="css/submit_form.css">
        <link rel="stylesheet" href="../css/footer.css">
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
                <form id="suggest-container" autocomplete="off" method="POST" class="ui-search" action="../search/search.php">
                    <input type="hidden" name="s_mode" value="s_tag">
                    <div class="container">
                        <input type="text" id="suggest-input" name="word" valueplaceholder="Search result">
                    </div>
                    <input type="submit" class="submit search-icon" value>
                </form>
            </div>
        </header>

        <form class="form_submit" action="<?php $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
            <div class="upload_preview">
                <script src="js/upload.js"></script>
                <div class="upload_wrapper">
                    <div class="choose_file_button_wrapper">
                        <button type="button" class="choose_file_button">
                            <span>Select Files</span>
                        </button>
                        <input type="file" multiple accept="image/gif,image/jpeg,image/png" id="file-input" name="image_file" required>
                        <div class="upload_note">
                            JPEG PNG<br>
                            <!-- You can upload up to 200 files, up to 32MB each<br>
                            (The size can be up to 200MB) -->
                            You can only upload a file at once <br>
                            (The size can be up to 100MB ONLY FOR LINUX)
                            <?php echo @$file_error ?>
                        </div>
                    </div>
                </div>
                <div class="image_container fade-in">
                    <div class="preview_image">
                        <div class="remove_image">
                            <i class="icon_close"></i>
                        </div>  
                        <div class="image-name"></div>
                    </div> 
                </div>
            </div>
            <div class="pic_submit">
                <section class="unit">
                    <section class="items">
                        <div class="input-title item text">
                            <div class="fail-container"></div>
                            <?php echo @$name_error ?>
                            <script src="js/count.js"></script>
                            <input type="text" name="product_name" placeholder="Title" maxlength="32" class="input" onkeyup="title_count(this.value)"required>
                            <div class="count-container options">
                                <span class="charcount">0</span>
                                /32
                            </div>
                            <span id="name_message"></span>
                        </div>
                        <div class="input-comment item text">
                            <div class="fail-container"></div>
                            <?php echo @$description_error ?>
                            <span id="description_message"></span>
                            <textarea name="description" placeholder="Description" maxlength="3000"
                            class="input" style="margin-top: 0px; margin-bottom: 0px; height: 216px;" onkeyup="cmt_count(this.value)" required></textarea>
                        </div>
                        <div class="count-container options">
                            <span class="cmtcount">0</span>
                            /3000
                        </div>
                        <input type="hidden" name='product_status' value="1">
                    </section>
                    <section class="items">
                    <div class="input-title item text">
                            <div class="fail-container"></div>
                            <?php echo @$price_error ?>
                            <span id="price_message"></span>
                            <input type="text"name="product_price" placeholder="How much does this cost?" maxlength="11" class="input" onkeyup="price_count(this.value)" required>
                            <div class="count-container options">
                                <span class="price_count">0</span>
                                /11
                            </div>
                        </div>
                    </section>
                    <section class="items">
                    <?php echo @$color_error ?>
                        <div class="item">
                        <span id="color_message"></span>
                            <dl>
                                <dt>Product Color</dt>
                                <dd>
                                    <ul class="inline_list">
                                        <li>
                                            <select name="product_color" required>
                                                <option selected disabled hidden value="">Please Select Your Color</option>
                                                <option value="Red">Red</option>
                                                <option value="Green">Green</option>
                                                <option value="Black">Black</option>
                                                <option value="Yellow">Yellow</option>
                                                <option value="Blue">Blue</option>
                                            </select>
                                            
                                        </li>
                                        <script src="js/select_box.js"></script>
                                    </ul>
                                </dd>
                            </dl>
                        </div>
                    </section>
                    <section class="items">
                        <div class="item">
                        <?php echo @$catagory_error ?>
                        <span id="catagory_message"></span>
                            <dl>
                                <dt>Product Catagory</dt>
                                <dd>
                                    <ul class="inline_list">
                                        <li>
                                            <select name="product_catagory" required>
                                                <option selected disabled hidden value="">Please Select Your Catagory</option>
                                                <?php echo show_menu(); ?>
                                            </select>
                                        </li>
                                        <script src="js/select_box.js"></script>
                                    </ul>
                                </dd>
                            </dl>
                        </div>
                    </section>
                    <div class="warning-container">
                        <div class="warning-meassage">
                            Please note that submitting the following contents is against our guidelines:<br><br>
                            - Contents produced by others, reproductions of products that are on 
                            sale and any kind of work protected by a third-party copyright.<br><br>
                            These include images of book, newspaper,...<br><br>
                            - Contents that make use of materials belonging to 
                            the categories listed above and that you didn't make 100% yourself.<br>
                            - Photography, except those which microscopic.<br><br>
                            Posting contents that violate the Terms of Use will result in a 
                            suspension from posting or possibly a termination of your account.<br><br>
                            <a href="">Terms of Use</a>
                        </div>
                    </div>
                    <div class="last-warning">
                            Please only upload work that you've created or have permission to post. 
                            Work that violate our <a href="">Terms of Use</a> and <a href="">Guidelines</a> will be deleted.
                    </div>
                    <div class="submit-container">
                        <input type="submit" value="Submit"
                        class="action-submit" id="submit" name="submit">
                    </div>
                </section>
            </div>
        </form>
        
        <div class="homebody-wrapper">
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