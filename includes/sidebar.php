<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="assent/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Blog Dashboard</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="assent/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview menu-open">
          <a href="deshbord.php" class="nav-link <?= $page == 'deshbord.php' ? 'active' : ''  ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard

            </p>
          </a>
        </li>
        <?php
        if ($_SESSION['user_role'] == 'admin') {
        ?>
          <li class="nav-item has-treeview">
            <a href="user_menegment.php" class="nav-link <?= $page == 'user_menegment.php' ? 'active' : ''  ?>">
              <i class="fa-solid fa-users"></i>
              <p>
                User Menegment
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_user.php" class="nav-link <?= $page == 'add_user.php' ? 'active' : ''  ?>">
                  <i class="fa-solid fa-list"></i>
                  <p> Add User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="user_menegment.php" class="nav-link <?= $page == 'user_menegment.php' ? 'active' : ''  ?>">

                  <i class="fa-solid fa-table-list"></i>
                  <p> Users Listing</p>
                </a>
              </li>
            </ul>
          </li>
        <?php
        }
        ?>
        <li class="nav-item">
          <a href="" class="nav-link <?= $page == 'categories.php' ? 'active' : ''  ?>">
            <i class="fa-solid fa-layer-group"></i>
            <p>
              Categories
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="add_categories.php" class="nav-link <?= $page == 'add_categories.php' ? 'active' : ''  ?>">
                <i class="fa-solid fa-list"></i>
                <p> Add Categories</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="categories.php" class="nav-link <?= $page == 'categories.php' ? 'active' : ''  ?>">

                <i class="fa-solid fa-users"></i>
                <p> Categories Listing</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item ">
          <a href="" class="nav-link <?= $page == 'tags.php' ? 'active' : ''  ?>">
            <i class="fa-solid fa-user-tag"></i>
            <p>
              Tags
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="add_tags.php" class="nav-link <?= $page == 'add_tags.php' ? 'active' : ''  ?>">
                <i class="fa-solid fa-list"></i>
                <p> Add Tags</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="tags.php" class="nav-link <?= $page == 'tags.php' ? 'active' : ''  ?>">

                <i class="fa-solid fa-table-list"></i>
                <p> Tags Listing</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item ">
          <a href="posts.php" class="nav-link <?= $page == 'posts.php' ? 'active' : ''  ?>">
            <i class="fa-solid fa-copy"></i>
            <p>
              Posts
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="add_post.php" class="nav-link <?= $page == 'add_post.php' ? 'active' : ''  ?>">
                <i class="fa-solid fa-list"></i>
                <p> Add Post</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="posts.php" class="nav-link <?= $page == 'posts.php' ? 'active' : ''  ?>">

                <i class="fa-solid fa-table-list"></i>
                <p> Post Listing</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</aside>