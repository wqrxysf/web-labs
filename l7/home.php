<?php

const HOST = 'localhost';
const USERNAME = 'root';
const PASSWORD = '';
const DATABASE = 'blog';

function createDBConnection(): mysqli {
    $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
    return $conn;
  }
  
function closeDBConnection(mysqli $conn): void {
    $conn->close();
  }
  
$conn = createDBConnection();
  $sql = "SELECT * FROM post";
  $result = $conn->query($sql);
  $featured_post = $result->fetch_all(MYSQLI_ASSOC);
  //var_dump($featured_post);
  closeDBConnection($conn);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="http://localhost:8001/static/css/style-main-page.css">
    <link href="https://fonts.cdnfonts.com/css/lora" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<body class="backcolor">
    <div class="backimage">
        <header class="container">
            <div class="container__header">
                <div>
                    <p class="container__logo">Escape.</p>
                </div>
                <div class="content" id="navigation">
                    <div>
                        <input class="side-menu" type="checkbox" id="side-menu"/>
                        <label class="hamb" for="side-menu"><span class="hamb-line"></span></label>
                        <nav class="nav">
                            <ul class="nav__menu">

                                <li>
                                    <a href="#">HOME</a>
                                </li>
                                <li>
                                    <a href="#">CATEGORIES</a>
                                </li>
                                <li>
                                    <a href="#">ABOUT</a>
                                </li>
                                <li>
                                    <a href="#">CONTACT</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <div class="info">
            <h1 class="info__title">Let's do it together.</h1>
            <p class="info__subtitle">We travel the world in search of stories. Come along for the ride.</p>
            <button class="info__button" type="button">View Latest Posts</button>
        </div>
    </div>
    
    <main class="main">
        <div class="menu">
            <nav class="menu-novigation">
                <ul class="menu-novigation__list">
                    <li>
                        <a href="#">Nature</a>
                    </li>
                    <li>
                        <a href="#">Photography</a>
                    </li>
                    <li>
                        <a href="#">Relaxation</a>
                    </li>
                    <li>
                        <a href="#">Vacation</a>
                    </li>
                    <li>
                        <a href="#">Travel</a>
                    </li>
                    <li>
                        <a href="#">Adventure</a>
                    </li>
                </ul>
            </nav>

        </div>
        <div class="posts_container">
            <div>
                <button class="chapter">Featured Posts</button>
                <div class="posts">
                    <?php 
                    foreach ($featured_post as $preview) {
                        if ($preview['featured'] == 1) {
                            include 'post_preview.php';
                        }
                    }
                    ?>
                </div>      
                <button class="chapter">Most Recent</button>
                <div class="recents">
                <?php 
                    foreach ($featured_post as $preview) {
                        if ($preview['featured'] == 0) {
                            include 'post_recent.php';
                        }
                    }
                ?>
                </div>
            </div>
        </div>
    </main>
    <footer class="footer">
        <div  class="container footer-text">
            <p class="container__logo">Escape.</p>
            <nav class="container__navigation">
                <ul class="nav_footer">
                    <li>
                        <a href="#">HOME</a>
                    </li>
                    <li>
                        <a href="#">CATEGORIES</a>
                    </li>
                    <li>
                        <a href="#">ABOUT</a>
                    </li>
                    <li>
                        <a href="#">CONTACT</a>
                    </li>
                </ul>
            </nav>
        </div>
    </footer>
</body>
</html>