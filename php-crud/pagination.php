<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'links.php';
    ?>
    <title>Document</title>
</head>

<body>
    <div class="container my-5">
        <table class="table">
            <thead class="bg-dark text-light">
                <tr>
                    <th scope="col">S #</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $select_query = "select * from add_user";
                $result = mysqli_query($conn, $select_query);
                $no_of_rows = mysqli_num_rows($result);
                $numberPages = 4;
                $total_pages = ceil($no_of_rows / $numberPages);
                // echo $total_pages;
                // Create pagination buttons

                for ($btn = 1; $btn <= $total_pages; $btn++) {
                    echo "<button class='btn btn-dark mx-1 my-3'>
                            <a href='pagination.php?page=$btn' class='text-light' style='text-decoration: none;'>$btn</a>
                        </button>
                        ";
                }

                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }

                $starting_limit = ($page - 1) * $numberPages;
                $select_query = "select * from add_user limit $starting_limit, $numberPages";
                $result = mysqli_query($conn, $select_query);

                while ($row = mysqli_fetch_assoc($result)) {
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
                        </tr>
                    ";
                }
                ?>

            </tbody>
        </table>
    </div>
</body>

</html>