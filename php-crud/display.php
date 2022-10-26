<!doctype html>
<html lang="en">

<head>
    <?php
    include 'links.php'
    ?>
    <title>Display users</title>
</head>

<body>
    <div class="container my-5">
        <button class="btn btn-primary mb-5">
            <a href="add_user.php" style="text-decoration: none;" class="text-light">Add User</a>
        </button>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">S #</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Password</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>
            <?php
    include 'connection.php';

    $select_query = "select * from add_user";
    $result = mysqli_query($connection,$select_query);

    if($result){
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['id'];
            $name = $row['name'];
            $email = $row['email'];
            $phone = $row['phone'];
            $password = $row['password'];

            echo "
            <tr>
            <th scope='row'>$id</th>
            <td>$name</td>
            <td>$email</td>
            <td>$phone</td>
            <td>$password</td>
            <td>
                <button class='btn btn-primary btn-sm'>
                    <a 
                        class='text-light'
                        style='text-decoration: none;'
                        href='update.php?updateid=$id'>Update
                    </a>
                </button>
                <button class='btn btn-danger btn-sm'>
                    <a 
                        class='text-light' 
                        style='text-decoration: none;' 
                        href='delete.php?deleteid=$id'>Delete
                    </a>
                </button>
            </td>
        </tr>
            ";
        }
    }
?>
            </tbody>
        </table>
    </div>
</body>
</html>


<!-- $number = [1,2,3,4,5,5]

echo $number[0] -->