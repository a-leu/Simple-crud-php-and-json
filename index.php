<?php
require 'users.php';
$users = getUsers();

include 'partials/header.php'
?>

    <a href="create.php" class="btn btn-primary mb-3">Create new card</a>

    <div class="d-flex justify-content-between">
        <div class="row">
            <?php foreach ($users as $user): ?>
                <div class="col-12 col-md-6 col-lg-3 mb-4">
                    <div class="card">
                        <img src="img/<?php
                        if (!isset($user['extension'])) echo 'default.svg';
                        else echo $user['id'] . '.' . $user['extension'];
                        ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title fs-2 mb-3"><?php echo $user['name']; ?></h5>
                            <p class="card-text"><b>Username:</b> <?php echo $user['username']; ?></p>
                            <p class="card-text"><b>E-mail:</b> <?php echo $user['email']; ?></p>
                            <p class="card-text"><b>Phone:</b> <?php echo $user['phone']; ?></p>
                            <p class="card-text"><b>Website:</b>
                                <a target="_blank"
                                   href="<?php echo 'http://' . $user['website']; ?>"><?php echo $user['website']; ?></a>
                            </p>
                            <a href="view.php?id=<?php echo $user['id']; ?>" class="btn btn-primary m-1">Read</a>
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
            <?php endforeach; ?>
        </div>
    </div>

<?php include 'partials/footer.php' ?>