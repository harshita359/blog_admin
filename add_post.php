<?php
require_once "db/config.php";
check_login();
include('includes/allfunction.php');
//echo $_SESSION['user']['user_id'];

if (isset($_POST['submit'])) {

    $filename = $_FILES['post_img']['name'];
    $tempname = $_FILES['post_img']['tmp_name'];
    move_uploaded_file($tempname, 'upload/' . $filename);

    $data = array(
        'user_id' => $_SESSION['user']['user_id'],
        'post_title' => $_POST['post_title'],
        'post_url' => $_POST['post_url'],
        'post_cat' => $_POST['post_categories'],
        'post_tag' => $_POST['post_tag'],
        'post_status' => $_POST['post_status'],
        'post_summary' => $_POST['post_summary'],
        'post_content' => $_POST['post_content'],
        'post_homepage' => $_POST['post_homepage'],
        'post_img' => $filename 
    );

    // Insert the new category data
    $postid = insert($data, 'post');

    $data1 = array(
        'post_id' => $postid,
        'category_id' => $_POST['post_categories']
    );

    // Insert the new category data
    insert($data1, 'post_category');

    // $data2 = array(
    //     'post_id' => $postid,
    //     'post_meta_key' => 'post_homepage',
    //     'post_meta_val' => $_POST['post_homepage']
    // );

    // // Insert the new category data
    // insert($data2, 'post_meta');

    // $filename = $_FILES['post_img']['name'];
    // $tempname = $_FILES['post_img']['tmp_name'];
    // move_uploaded_file($tempname, 'upload/' . $filename);

    // $data3 = array(
    //     'post_id' => $postid,
    //     'post_meta_key' => 'post_img',

    // );

    // Insert the new category data
    // insert($data3, 'post_meta');

    // Redirect to categories page after submission
    header('Location: posts.php');
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
                    <h1 class="m-0 text-dark">Add Post</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Post</li>
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
                            <h3 class="card-title">Add Post</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" id="quickForm" method="post" action="" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Categories</label>
                                            <select class="form-control" name="post_categories">
                                                <option value="">Select Categories</option>
                                                <?php
                                                $categorydata = selectAllData('category');

                                                while ($data = mysqli_fetch_array($categorydata)) {
                                                ?>
                                                    <option value="<?php echo $data['category_title']; ?>"><?php echo $data['category_title']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Title</label>
                                            <input type="text" name="post_title" class="form-control" id="exampleInputPassword1" placeholder="Enter Title">
                                        </div>
                                    </div>


                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">URL</label>
                                            <input type="text" name="post_url" class="form-control" id="exampleInputEmail1" placeholder="Enter URL">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Status</label>
                                            <select class="form-control" name="post_status" id="status">
                                                <option value="">Select User Status</option>
                                                <option value="active">active</option>
                                                <option value="inactive">inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Upload Image</label>
                                            <input type="file" name="post_img" class="form-control" id="exampleInputEmail1">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Show On Homepage</label>
                                            <select class="form-control" name="post_homepage" id="post_homepage">
                                                <option value="">Select Show On Homepage</option>
                                                <option value="no">no</option>
                                                <option value="yes">yes</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tag</label>
                                            <select class="form-control" name="post_tag">
                                                <option value="">Select Tag</option>
                                                <?php
                                                $tagdata = selectAllData('tags');

                                                while ($data = mysqli_fetch_array($tagdata)) {
                                                ?>
                                                    <option value="<?php echo $data['tag_title']; ?>"><?php echo $data['tag_title']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">summary</label>
                                            <textarea class="form-control" name="post_summary"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Content</label>
                                            <textarea class="form-control" name="post_content"></textarea>
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