<?php
include 'partials/header.php';
require __DIR__ . '/users.php';
$user = checkGetUserID($_GET['id']);
?>

    <div class="row">
        <div class="col">
            <img src="img/<?php
            if (!isset($user['extension'])) echo 'default.svg';
            else echo $user['id'] . '.' . $user['extension'];
            ?>" class="img-thumbnail me-2" alt="img"
                 style="min-width: 200px; max-width: 400px">
        </div>
        <div class="col">
            <!--Table-->
            <table class="table">
                <tbody>
                <tr>
                    <th scope="row">Name:</th>
                    <td><?php echo $user['name']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Username:</th>
                    <td><?php echo $user['username']; ?></td>
                </tr>
                <tr>
                    <th scope="row">E-mail:</th>
                    <td><?php echo $user['email']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Phone:</th>
                    <td><?php echo $user['phone']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Website</th>
                    <td><a target="_blank"
                           href="<?php echo 'http://' . $user['website']; ?>"><?php echo $user['website']; ?></a></td>
                </tr>
                </tbody>
            </table>

            <!--Buttons-->
            <div>
                <a href="index.php" class="btn btn-primary m-1">Back</a>
                <a href="update.php?id=<?php echo $user['id']; ?>" class="btn btn-secondary m-1">Update</a>
                <div style="display: inline-block">
                    <form action="delete.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include 'partials/footer.php' ?>