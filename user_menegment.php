<?php
require_once "db/config.php";
check_login();

include('includes/allfunction.php');

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($GLOBALS['conn'], $_GET['id']); // Sanitize the input
    deletedata('users', 'user_id', $id);
    
    header('Location: user_menegment.php');
    exit(); // Ensure the script stops executing after redirection
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
                    <h1 class="m-0 text-dark">User Listing</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User Listing</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                  

                    <div class="card">
                   
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Full Name</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Profile</th>
                                        <th>Role</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $usersdata = selectAllData('users');
                                    $i = 1;
                                    while ($data = mysqli_fetch_array($usersdata, MYSQLI_ASSOC)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo htmlspecialchars($data['first_name'])." ".htmlspecialchars($data['middle_name'])." ".htmlspecialchars($data['last_name']); ?></td>
                                            <td><?php echo htmlspecialchars($data['mobile']); ?></td>
                                            <td><?php echo htmlspecialchars($data['email']); ?></td>
                                            <td><?php echo htmlspecialchars($data['profile']); ?></td>
                                            <td><?php echo htmlspecialchars($data['user_role']); ?></td>
                                            <td><a href="edit_user.php?id=<?php echo $data['user_id']; ?>">Edit</a></td>
                                            <td><a href="user_menegment.php?id=<?php echo $data['user_id']; ?>" onclick="return confirm('Do you want to delet this data')"> Delete</a></td>
                                        </tr>
                                    <?php
                                        $i++;
                                    }
                                    ?>
                                   
                                </tbody>
                                
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php
include('includes/footer.php');
include('includes/script.php');
?>