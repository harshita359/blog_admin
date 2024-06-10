<?php
require_once "db/config.php";
check_login();

include('includes/allfunction.php');
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($GLOBALS['conn'], $_GET['id']); // Sanitize the input
    deletedata('tags', 'tag_id', $id);

    header('Location: tags.php');
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
                    <h1 class="m-0 text-dark">tags Listing</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">tags Listing</li>
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
                        <?php
                        if ($_SESSION['user_role'] == 'admin') {
                        ?>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr.No</th>
                                            <th>Tas Name</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $tagdata = selectAllData('tags');
                                        $i = 1;
                                        while ($data = mysqli_fetch_array($tagdata, MYSQLI_ASSOC)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo htmlspecialchars($data['tag_title']); ?></td>
                                                <td><a href="edit_tag.php?id=<?php echo $data['tag_id']; ?>">Edit</a></td>
                                                <td><a href="tags.php?id=<?php echo $data['tag_id']; ?>" onclick="return confirm('Do you want to delet this data')"> Delete</a></td>
                                            </tr>
                                        <?php
                                            $i++;
                                        }
                                        ?>
                                    </tbody>

                                </table>
                            </div>
                        <?php
                        } else if ($_SESSION['user_role'] == 'user') {
                            $user = $_SESSION['user'];
                            $user_id = $_SESSION['user']['user_id'];

                        ?>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr.No</th>
                                            <th>Tas Name</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query_post = "SELECT * FROM tags  WHERE user_id='$user_id'";
                                        $query_run_post = mysqli_query($conn, $query_post);

                                        if (mysqli_num_rows($query_run_post) > 0) {
                                            $i = 1;
                                            foreach ($query_run_post as $data) {
                                                //   echo $row['party_name'];
                                        ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo htmlspecialchars($data['tag_title']); ?></td>
                                                    <td><a href="edit_tag.php?id=<?php echo $data['tag_id']; ?>">Edit</a></td>
                                                    <td><a href="tags.php?id=<?php echo $data['tag_id']; ?>" onclick="return confirm('Do you want to delet this data')"> Delete</a></td>
                                                </tr>
                                        <?php
                                                $i++;
                                            }
                                        }
                                        ?>
                                    </tbody>

                                </table>
                            </div>
                        <?php
                        }
                        ?>
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