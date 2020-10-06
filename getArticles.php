<?php
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "blog";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SET CHARACTER SET UTF8";
    $result = $conn->query($sql);
    
    $sql = "SELECT * FROM articles WHERE id='$id'";
    echo $sql;
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nameArticle=$row["nameArticles"]; 
        $contentArticle=$row["contentArticles"]; 
        $author=$row["author"]; 
        $category=$row["category"]; 
        $datePublic=$row["datePublic"];
        $img=$row["img"];
      }
    else {
      echo "0 results";
    }
    $conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article - <?php echo $nameArticle ?></title>
</head>
<body>
    <div class="wrap">
        <h2><?php echo $nameArticle ?></h2>
        <p class="img"><img src="<?php echo $img ?>" alt="article image"></p>
        <p class="content"> <?php echo $contentArticle ?></p>
        <p class="author">Autor: <?php echo $author ?></p>
        <p class="category">Kategorie: <?php echo $category ?></p>
    </div>
</body>
</html>



