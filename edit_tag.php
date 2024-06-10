<?php
require_once "db/config.php";
check_login();

include('includes/allfunction.php');
$id = null; // Initialize $id

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($GLOBALS['conn'], $_GET['id']); // Sanitize the input
    $editdata = selectDataByColumn('tags', 'tag_id', $id);
}

if (isset($_POST['submit'])) {
    // Check if $id is set
    if ($id !== null) {
        $data = array(
            'user_id' => $_SESSION['user']['user_id'],
            'tag_title' => $_POST['tag_name'],
            'tag_url' => $_POST['url_Tag'],
            'tag_content' => $_POST['tag_content'],
        );

        update($data, 'tags', 'tag_id', $id);
        header('Location: tags.php');
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
                    <h1 class="m-0 text-dark">Edit Tags</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Tags</li>
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
                            <h3 class="card-title">Edit Tags</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" id="quickForm" method="post" action="">
                            <div class="card-body">
                                <div class="row">
                                    <!-- <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Parent Categories</label>
                                           <select class="form-control">
                                            <option value="">Select Categories</option>
                                            <option value="0">Nome</option>
                                           </select>
                                        </div>
                                    </div> -->
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Tag Name</label>
                                            <input type="text" name="tag_name" value="<?php echo isset($editdata['tag_title']) ? htmlspecialchars($editdata['tag_title']) : ''; ?>" class="form-control" id="exampleInputPassword1" placeholder="Enter Tag Name">
                                        </div>
                                    </div>

                               
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">URL</label>
                                            <input type="text" name="url_Tag" class="form-control"  value="<?php echo isset($editdata['tag_url']) ? htmlspecialchars($editdata['tag_url']) : ''; ?>" id="exampleInputEmail1" placeholder="Enter URL">
                                        </div>
                                    </div>
                            
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Content</label>
                                           <textarea class="form-control" name="tag_content"><?php echo isset($editdata['tag_content']) ? htmlspecialchars($editdata['tag_content']) : ''; ?></textarea>
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