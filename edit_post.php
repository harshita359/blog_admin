<?php
require_once "db/config.php";
check_login();

include('includes/allfunction.php');

$id = null; // Initialize $id

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($GLOBALS['conn'], $_GET['id']); // Sanitize the input
    $editdata = selectDataByColumn('post', 'post_id', $id);
}

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
    $postid = update($data, 'post', 'post_id', $id);

    $data1 = array(
        'post_id' => $postid,
        'category_id' => $_POST['post_categories']
    );

    // Insert the new category data
    update($data1, 'post_category', 'post_id', $id);


    // $data2 = array(
    //     'post_id' => $postid,
    //     'post_meta_key' => 'post_homepage',
    //     'post_meta_val' => $_POST['post_homepage']
    // );

    // // Insert the new category data
    // update($data2, 'post_meta', 'post_id', $id);


    // $filename = $_FILES['post_img']['name'];
    // $tempname = $_FILES['post_img']['tmp_name'];
    // move_uploaded_file($tempname, 'upload/' . $filename);

    // $data3 = array(
    //     'post_id' => $postid,
    //     'post_meta_key' => 'post_img',
    //     'post_meta_val' => $filename
    // );

    // // Insert the new category data
    // update($data3, 'post_meta', 'post_id', $id);


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
                    <h1 class="m-0 text-dark">Edit Post</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Post</li>
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
                            <h3 class="card-title">Edit Post</h3>
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

                                                while ($catdata = mysqli_fetch_array($categorydata)) {
                                                    $selected = '';

                                                    if (isset($editdata['post_cat']) && $editdata['post_cat'] == $catdata['category_title']) {
                                                        $selected = 'selected';
                                                    }
                                                ?>
                                                    <option value="<?php echo $catdata['category_title']; ?>" <?php echo $selected; ?>><?php echo $catdata['category_title']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Title</label>
                                            <input type="text" name="post_title" value="<?php echo isset($editdata['post_title']) ? htmlspecialchars($editdata['post_title']) : ''; ?>" class="form-control" id="exampleInputPassword1" placeholder="Enter Title">
                                        </div>
                                    </div>


                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">URL</label>
                                            <input type="text" name="post_url" value="<?php echo isset($editdata['post_url']) ? htmlspecialchars($editdata['post_url']) : ''; ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter URL">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Status</label>
                                            <select class="form-control" name="post_status" id="status">
                                                <option value="">Select User Status</option>
                                                <option value="active" <?php if ($editdata['post_status'] == 'active') {
                                                                            echo "selected";
                                                                        } ?>>active</option>
                                                <option value="inactive" <?php if ($editdata['post_status'] == 'inactive') {
                                                                                echo "selected";
                                                                            } ?>>inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <?php if (isset($editdata['post_img']) && !empty($editdata['post_img'])) : ?>
                                                <input type="hidden" name="oldimg" value="<?php echo htmlspecialchars($editdata['post_img']); ?>">
                                                <img src="upload/<?php echo htmlspecialchars($editdata['post_img']); ?>" style="height: 50px;" alt="Current Image">
                                            <?php endif; ?>
                                            <label for="exampleInputEmail1">Upload Image</label>
                                            <input type="file" name="post_img" class="form-control" id="exampleInputEmail1">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Show On Homepage</label>
                                            <select class="form-control" name="post_homepage" id="post_homepage">
                                                <option value="">Select Show On Homepage</option>
                                                <option value="no" <?php if ($editdata['post_homepage'] == 'no') {
                                                                        echo "selected";
                                                                    } ?>>no</option>
                                                <option value="yes" <?php if ($editdata['post_homepage'] == 'yes') {
                                                                        echo "selected";
                                                                    } ?>>yes</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tag</label>
                                            <select class="form-control" name="post_tag">
                                                <option value="">Select Tag</option>

                                                <?php
                                                $categorydata = selectAllData('tags');

                                                while ($catdata = mysqli_fetch_array($categorydata)) {
                                                    $selected = '';

                                                    if (isset($editdata['post_tag']) && $editdata['post_tag'] == $catdata['tag_title']) {
                                                        $selected = 'selected';
                                                    }
                                                ?>
                                                    <option value="<?php echo $catdata['tag_title']; ?>" <?php echo $selected; ?>><?php echo $catdata['tag_title']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">summary</label>
                                            <textarea class="form-control" value="" name="post_summary"><?php echo isset($editdata['post_summary']) ? htmlspecialchars($editdata['post_summary']) : ''; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Content</label>
                                            <textarea class="form-control" value="" name="post_content"><?php echo isset($editdata['post_content']) ? htmlspecialchars($editdata['post_content']) : ''; ?></textarea>
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