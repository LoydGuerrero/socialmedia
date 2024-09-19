<?php
// Assuming you have a way to authenticate the user and retrieve their information
$user = Auth::user();

// Check for success message in the session
$successMessage = session('success');

// If there's a success message, redirect to dashboard
if ($successMessage) {
    header('Location: ' . route('dashboard'));
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        Profile
                        <a href="<?php echo route('dashboard'); ?>" class="btn btn-secondary btn-sm">Back to Dashboard</a>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <!-- Profile Picture and Bio -->
                            <div class="col-md-4 text-center mb-4">
                                <img src="<?php echo $user->avatar ? asset('avatars/' . $user->avatar) : asset('images/default-avatar.png'); ?>" alt="Profile Picture" class="rounded-circle mb-3" style="width: 150px; height: 150px;">
                                <h4><?php echo $user->name; ?></h4>
                                <p class="text-muted"><?php echo $user->email; ?></p>
                                <p><?php echo $user->bio ?? 'No bio available.'; ?></p>
                            </div>

                            <!-- User Information and Form -->
                            <div class="col-md-8">
                                <!-- Combined Profile Update and Avatar Form -->
                                <form action="<?php echo route('profile.update'); ?>" method="POST" enctype="multipart/form-data" class="mb-4">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PATCH'); ?>
                                    <div class="mb-3">
                                        <label for="avatar" class="form-label">Update Avatar</label>
                                        <input type="file" class="form-control" id="avatar" name="avatar">
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $user->name; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $user->email; ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="bio" class="form-label">Bio</label>
                                        <textarea class="form-control" id="bio" name="bio" rows="3"><?php echo $user->bio; ?></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Profile</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>