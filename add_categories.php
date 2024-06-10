<?php
require_once "db/config.php";
check_login();
include('includes/allfunction.php');

if (isset($_POST['submit'])) {
    $data = array(
        // 'parent_id' => $_POST['parent_name'],
        'user_id' => $_SESSION['user']['user_id'],
        'category_title' => $_POST['categories_name'],
        'category_url' => $_POST['categories_url'],
        'category_content' => $_POST['categories_content']
       
    );

    // Insert the new category data
    insert($data, 'category');

    // Redirect to categories page after submission
    header('Location: categories.php');
    exit();
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
                    <h1 class="m-0 text-dark">Add Categories</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Categories</li>
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
                            <h3 class="card-title">Add Categories</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" id="quickForm" method="post" action="">
                            <div class="card-body">
                                <div class="row">
                                    <!-- <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="parent_name">Parent Categories</label>
                                            <select class="form-control" name="parent_name" id="parent_name">
                                                <option value="">Select Categories</option>
                                                <option value="none"<?php if (isset($data['parent_id']) && $data['parent_id'] == 'none') echo 'selected'; ?>>none</option>
                                               
                                                <?php 
                                                $categorydata=selectAllData('category');

                                                while($data=mysqli_fetch_array($categorydata)){
                                                    ?>
                                                     <option value="<?php echo $data['category_title']; ?>"><?php echo $data['category_title']; ?></option>
                                                    <?php
                                                }
                                                ?>

                                                Add more parent categories as needed -->
                                          <!--  </select>
                                        </div>
                                    </div> -->
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="categories_name">Categories Name</label>
                                            <input type="text" name="categories_name" class="form-control" id="categories_name" placeholder="Enter Categories Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="categories_url">URL</label>
                                            <input type="text" name="categories_url" class="form-control" id="categories_url" placeholder="Enter URL">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="categories_content">Content</label>
                                            <textarea class="form-control" name="categories_content" id="categories_content" placeholder="Enter Content"></textarea>
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