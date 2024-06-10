<?php
require_once "db/config.php";
check_login();

include('includes/allfunction.php');

$id = null; // Initialize $id

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($GLOBALS['conn'], $_GET['id']); // Sanitize the input
    $editdata = selectDataByColumn('users', 'user_id', $id);
}

if (isset($_POST['submit'])) {
    // Check if $id is set
    if ($id !== null) {
        $data = array(
            'first_name' => $_POST['first_name'],
            'middle_name' => $_POST['middle_name'],
            'last_name' => $_POST['last_name'],
            'mobile' => $_POST['mobile'],
            'password' => $_POST['password'],
            'email' => $_POST['email'],
            'profile' => $_POST['profile'],
            'user_role' => $_POST['user_role'],
            'intro' => $_POST['intro']
        );

        update($data, 'users', 'user_id', $id);
        header('Location: user_menegment.php');
        exit();
    }
}

include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit User</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit User</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" id="quickForm" method="post" action="">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">First Name</label>
                                            <input type="text" name="first_name"  value="<?php echo isset($editdata['first_name']) ? htmlspecialchars($editdata['first_name']) : ''; ?>" class="form-control" id="exampleInputPassword1" placeholder="Enter First Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Middle Name</label>
                                            <input type="text" name="middle_name"  value="<?php echo isset($editdata['middle_name']) ? htmlspecialchars($editdata['middle_name']) : ''; ?>" class="form-control" id="exampleInputPassword1" placeholder="Enter Middle Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Last Name</label>
                                            <input type="text" name="last_name"  value="<?php echo isset($editdata['last_name']) ? htmlspecialchars($editdata['last_name']) : ''; ?>" class="form-control" id="exampleInputPassword1" placeholder="Enter Last Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Mobile</label>
                                            <input type="text" name="mobile"  value="<?php echo isset($editdata['mobile']) ? htmlspecialchars($editdata['mobile']) : ''; ?>" class="form-control" id="exampleInputPassword1" placeholder="Enter Mobile No.">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Email</label>
                                            <input type="email" name="email"  value="<?php echo isset($editdata['email']) ? htmlspecialchars($editdata['email']) : ''; ?>" class="form-control" id="exampleInputPassword1" placeholder="Enter Email">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password" name="password"  value="<?php echo isset($editdata['password']) ? htmlspecialchars($editdata['password']) : ''; ?>" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
                                        </div>
                                    </div>
                                  

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Profile</label>
                                            <input type="text" name="profile" class="form-control"  value="<?php echo isset($editdata['profile']) ? htmlspecialchars($editdata['profile']) : ''; ?>" id="exampleInputPassword1" placeholder="Enter Profile">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Role</label>
                                            <select class="form-control" name="user_role" id="user_role">
                                            <option value="">Select User Role</option>
                                            <option value="user" <?php if($editdata['user_role'] == 'user'){ echo "selected"; } ?>>user</option>
                                            <option value="admin" <?php if($editdata['user_role'] == 'admin'){ echo "selected"; } ?>>admin</option>
                                        </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Intro</label>
                                            <textarea class="form-control" name="intro" ><?php echo isset($editdata['intro']) ? htmlspecialchars($editdata['intro']) : ''; ?></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">

                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include('includes/footer.php');
include('includes/script.php');
?>