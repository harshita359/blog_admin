<?php
require_once "db/config.php";
check_login();

include('includes/allfunction.php');

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($GLOBALS['conn'], $_GET['id']); // Sanitize the input
    deletedata('category', 'category_id', $id);

    header('Location: categories.php');
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
                    <h1 class="m-0 text-dark">Categories Listing</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Categories Listing</li>
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
                                            <th>Categories Name</th>
                                            <!-- <th>URL</th> -->
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $categorydata = selectAllData('category');
                                        $i = 1;
                                        while ($data = mysqli_fetch_array($categorydata, MYSQLI_ASSOC)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo htmlspecialchars($data['category_title']); ?></td>
                                                <!-- <td><?php // echo htmlspecialchars($data['category_url']); 
                                                            ?></td> -->
                                                <td><a href="edit_category.php?id=<?php echo $data['category_id']; ?>">Edit</a></td>
                                                <td><a href="categories.php?id=<?php echo $data['category_id']; ?>" onclick="return confirm('Do you want to delet this data')"> Delete</a></td>
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
                                            <th>Categories Name</th>
                                            <!-- <th>URL</th> -->
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $query_category = "SELECT * FROM category  WHERE user_id='$user_id'";
                                        $query_run_category = mysqli_query($conn, $query_category);

                                        if (mysqli_num_rows($query_run_category) > 0) {
                                            $i = 1;
                                            foreach ($query_run_category as $data) {
                                                //   echo $row['party_name'];
                                        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo htmlspecialchars($data['category_title']); ?></td>
                                                <!-- <td><?php // echo htmlspecialchars($data['category_url']); 
                                                            ?></td> -->
                                                <td><a href="edit_category.php?id=<?php echo $data['category_id']; ?>">Edit</a></td>
                                                <td><a href="categories.php?id=<?php echo $data['category_id']; ?>" onclick="return confirm('Do you want to delet this data')"> Delete</a></td>
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