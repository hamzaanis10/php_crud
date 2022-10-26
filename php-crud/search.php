<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include 'links.php';
    ?>
    <title>Document</title>
</head>
<body>
    <div class='container my-5'>
        <form method="post">
            <input type='text' name="search" placeholder="search..">
            <button type="submit" class="btn btn-dark btn-sm" name="submit">Search</button>
        </form>
    </div>

    <div class="container my-5">
        <table class="table">
            <?php
            include 'connection.php';
                if(isset($_POST['submit'])){
                    $search_value = $_POST['search'];

                    $select_query = "SELECT * from add_user where name REGEXP '$search_value' or email REGEXP '$search_value' or phone REGEXP '$search_value';";
                   $result = mysqli_query($connection, $select_query);

                    if($result){
                        if(mysqli_num_rows($result) > 0){
                            echo "
                            <thead>
                                <tr>
                                    <th>S #</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                </tr>
                            </thead>
                            ";

                            while($row = mysqli_fetch_assoc($result)){
                                $id = $row['id'];
                                $name = $row['name'];
                                $email = $row['email'];
                                $phone = $row['phone'];

                                echo "
                                    <tr>
                                        <th scope='row'>$id</th>
                                        <td>$name</td>
                                        <td>$email</td>
                                        <td>$phone</td>
                                    </tr>";
                            
                            }        
                        }
                    }
                }
            ?>
        </table>
    </div>
</body>
</html>