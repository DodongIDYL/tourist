<?php
    include '../php/connect.php';
    // $admin = $_SESSION['id'];
    $id = $_GET['id'];

    $post = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM upload WHERE id = '$id'"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/info.css">
    <title>Name</title>
</head>
<body>
    <div class="container">
        <div class="navbar">
            <a href="user.php">Back</a>
        </div>
        <div class="main">
            <div class="image">
                <div class="image-wrapper">
                    <img src="../uploads/<?= $post['image'];?>" width="500px">
                </div>
                
            </div>
            <div class="info">
                <div class="info-name">
                    <h1><?= $post['title'];?></h1>
                    <div class="time">
                        <label><?= $post['date'];?></label>
                    </div>
                </div>
                <div class="description">
                    <p><?= $post['description'];?></p>
                </div>
                <form action="../php/comment.php" method="post">
                    <div class="input-box">
                        <input type="hidden" name="postId" value="<?=$post['id'];?>">
                        <input type="hidden" name="userId" value="<?= $id;?>">
                        <!-- <input type="hidden" name="userId" value=""> -->
                        <input type="text" name="comment" placeholder="Add your feedback">
                        <button type="submit" name="send">Send</button>
                    </div>
                </form>
                <div class="comment-container">
                    <?php while($row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM comment where post_id = '$id'"))) {?>
                    <div class="comment-box">
                        <div class="comment-name">
                            <Strong><?= $row['name'];?></Strong>
                            <time><?= $row['date']?></time>
                        </div>
                        <div class="comment-contents">
                            <p><?= $row['content']?></p>
                        </div>
                        <?php if(isset($_GET['id'])) {?>
                            <form action="" method="post">
                                <input type="hidden" value="<?= $row['id'];?>">
                                <div class="delete">
                                    <button type="submit" name="delete">Delete</button>
                                </div>
                            </form>
                        <?php } ?>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>