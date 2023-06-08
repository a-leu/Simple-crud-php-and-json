<a href="index.php" class="btn btn-primary mb-3">Main page</a>
<div class="row d-flex justify-content-center">
    <div class="col-12 col-md-4">
        <div class="card">
            <div class="card-header">
                <?php
                if (isset($user)) {
                    echo "<h3>Update user: <b>{$user['name']}</b></h3>";
                } else {
                    echo "<h3>Creating new user</h3>";
                }
                ?>
            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" value="<?php echo $user['name'] ?? '' ?>" class="form-control" id="name" maxlength="50" required>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" value="<?php echo $user['username'] ?? '' ?>" class="form-control" id="username" minlength="4" maxlength="20" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" name="email" value="<?php echo $user['email'] ?? '' ?>" class="form-control" id="email" maxlength="50" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="tel" name="phone" value="<?php echo $user['phone'] ?? '' ?>" class="form-control" id="phone" maxlength="20" required>
                    </div>
                    <div class="mb-3">
                        <label for="website" class="form-label">Website</label>
                        <input type="text" name="website" value="<?php echo $user['website'] ?? '' ?>" class="form-control" id="website" maxlength="50">
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="form-label">Photo</label>
                        <input type="file" name="photo" class="form-control" id="photo" accept="image/jpeg, image/png, image/jpg, image/svg">
                    </div>
                    <button type="submit" class="btn btn-success">Okay</button>
                </form>
            </div>
        </div>
    </div>
</div>

