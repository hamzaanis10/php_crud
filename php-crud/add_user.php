<!doctype html>
<html lang="en">
  <head>
    <?php
        include 'links.php'
    ?>
    <title>Hamza</title>
  </head>
  <body>
  <div class="container my-5">
    <form method="POST">
        <!-- Name input -->
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <!-- Email input -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <!-- Name input -->
        <div class="mb-3">
            <label for="phone" class="form-label">Mobile Phone</label>
            <input type="text" class="form-control" id="phone" name="phone">
        </div>
        <!-- Password Input -->
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="text" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
</div>

  </body>
</html>

<?php
    include 'connection.php';

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];

        $insert_query = "insert into add_user(name, email, phone, password)
        values('$name', '$email', '$phone', '$password')";

        $result = mysqli_query($connection, $insert_query);

        if($result){
           header('location: display.php');
        }else {
            ?>
                <script>
                    alert('Data does not insert successfully')
                </script>
            <?php
        }
    }
?>