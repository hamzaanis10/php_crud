<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'links.php';
    ?>
    <title>Update</title>
</head>

<?php
include 'connection.php';


$id = $_GET['updateid'];

$select_query = "select * from add_user where id = $id";
$result_of_select = mysqli_query($connection, $select_query);
$row = mysqli_fetch_assoc($result_of_select);
$name = $row['name'];
$email = $row['email'];
$phone = $row['phone'];
$password = $row['password'];


if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['phone'];
    $password = $_POST['password'];

    $update_query = "update add_user set
        name = '$name', email = '$email', phone = '$mobile', password = '$password'
        where id = $id";

    $result = mysqli_query($connection, $update_query);

    if ($result) {
        header('location: display.php');
    } else {
?>
        <script>
            alert('Please try again..')
        </script>
<?php
    }
}
?>

<body>
    <div class="container my-5">
        <form method="POST">
            <!-- Name input -->
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value=<?php echo $name ?> ><br>
            </div>
            <!-- Email input -->
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value=<?php echo $email ?>><br>
            </div>
            <!-- Name input -->
            <div class="mb-3">
                <label class="form-label">Mobile Phone</label>
                <input type="text" class="form-control" name="phone" value=<?php echo $phone ?>><br>
            </div>
            <!-- Password Input -->
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="text" class="form-control" name="password" value=<?php echo $password ?>><br>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>
</body>

</html>
