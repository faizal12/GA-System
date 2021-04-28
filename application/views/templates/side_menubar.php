<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?php echo site_url('dashboard') ?>" class="brand-link  navbar-primary">
    <!-- <img src="<?= base_url('assets/dist/img/logo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-1"> -->
    <span class="brand-text ">
      <h3><?=config_title_web?></h3>
    </span>
  </a>

  <!-- Sidebar -->
  <section class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-1 pb-1 mb-1 d-flex">
      <!-- <div class="image">
          <h1>Jam</h1>
          
        </div> -->
      <div class="info text-white" style="text-align: center;font-family: consolas">
        <h1 id="jam" class="label-control" style="text-align: center;">Jam</h1>
        <h7 id="" style=""><?= strftime("%A, %d %B %Y"); ?></h7>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-legacy nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li id="dashboardMainMenu" class="nav-item">
          <a href="<?php echo site_url('dashboard') ?>" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>



        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-cube"></i>
            <p>
              Master
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <?php if (in_array('createBrand', $user_permission) || in_array('updateBrand', $user_permission) || in_array('viewBrand', $user_permission) || in_array('deleteBrand', $user_permission)) : ?>
              <li class="nav-item">
                <a href="<?php echo base_url('Controller_Items/') ?>" class="nav-link">
                  <i class="nav-icon fa fa-cart-arrow-down"></i>
                  <p>Items</p>
                </a>
              </li>
            <?php endif; ?>

            <?php if (in_array('createCategory', $user_permission) || in_array('updateCategory', $user_permission) || in_array('viewCategory', $user_permission) || in_array('deleteCategory', $user_permission)) : ?>
              <li class="nav-item">
                <a href="<?php echo base_url('Controller_Category/') ?>" class="nav-link">
                  <i class="nav-icon fa fa-cubes"></i>
                  <p>Category</p>
                </a>
              </li>
            <?php endif; ?>

            <?php if (in_array('createStore', $user_permission) || in_array('updateStore', $user_permission) || in_array('viewStore', $user_permission) || in_array('deleteStore', $user_permission)) : ?>
              <li class="nav-item">
                <a href="<?php echo base_url('Controller_Warehouse/') ?>" class="nav-link">
                  <i class="nav-icon fa fa-warehouse"></i>
                  <p>Warehouse</p>
                </a>
              </li>
            <?php endif; ?>

            <?php if (in_array('createAttribute', $user_permission) || in_array('updateAttribute', $user_permission) || in_array('viewAttribute', $user_permission) || in_array('deleteAttribute', $user_permission)) : ?>
              <li class="nav-item">
                <a href="<?php echo base_url('Controller_Element/') ?>" class="nav-link">
                  <i class="nav-icon fa fa-file"></i>
                  <p>Elements</p>
                </a>
              </li>
            <?php endif; ?>

            <?php if (in_array('createSection', $user_permission) || in_array('updateSection', $user_permission) || in_array('viewSection', $user_permission) || in_array('deleteSection', $user_permission)) : ?>
              <li class="nav-item">
                <a href="<?php echo base_url('Controller_Section') ?>" class="nav-link">
                  <i class="nav-icon fa fa-users"></i>
                  <p>Section</p>
                </a>
              </li>
            <?php endif; ?>

            <?php if ($user_permission) : ?>
              <?php if (in_array('createUser', $user_permission) || in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission)) : ?>
                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-user"></i>
                    <p>
                      Members
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <?php if (in_array('createUser', $user_permission)) : ?>
                      <li class="nav-item">
                        <a href="<?php echo base_url('Controller_Members/create') ?>" class="nav-link">
                          <i class="nav-icon far fa-dot-circle"></i>
                          <p> Add Members</p>
                        </a>
                      </li>
                    <?php endif; ?>

                    <?php if (in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission)) : ?>
                      <li class="nav-item">
                        <a href="<?php echo base_url('Controller_Members') ?>" class="nav-link">
                          <i class="nav-icon far fa-dot-circle"></i>
                          <p>Manage Members</p>
                        </a>
                      </li>
                    <?php endif; ?>
                  </ul>
                </li>
              <?php endif; ?>

              <?php if (in_array('createProduct', $user_permission) || in_array('updateProduct', $user_permission) || in_array('viewProduct', $user_permission) || in_array('deleteProduct', $user_permission)) : ?>
                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-cube"></i>
                    <p>
                      Products
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <?php if (in_array('createProduct', $user_permission)) : ?>
                      <li class="nav-item">
                        <a href="<?php echo base_url('Controller_Products/create') ?>" class="nav-link">
                          <i class="nav-icon far fa-circle"></i>
                          <p> Add Product</p>
                        </a>
                      </li>
                    <?php endif; ?>
                    <?php if (in_array('updateProduct', $user_permission) || in_array('viewProduct', $user_permission) || in_array('deleteProduct', $user_permission)) : ?>
                      <li class="nav-item">
                        <a href="<?php echo base_url('Controller_Products') ?>" class="nav-link">
                          <i class="nav-icon far fa-circle"></i>
                          <p>Manage Products</p>
                        </a>
                      </li>
                    <?php endif; ?>
                  </ul>
                </li>
              <?php endif; ?>
          </ul>
        </li>

        <li id="inventoryNav" class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-warehouse"></i>
            <p>
              Inventory
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <?php if (in_array('createOrder', $user_permission) || in_array('updateOrder', $user_permission) || in_array('viewOrder', $user_permission) || in_array('deleteOrder', $user_permission)) : ?>
              <li class="nav-item ">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-sign-in-alt"></i>
                  <p>
                    Orders
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <?php if (in_array('createOrder', $user_permission)) : ?>
                    <li class="nav-item">
                      <a href="<?php echo base_url('Controller_Orders/create') ?>" class="nav-link">
                        <i class="nav-icon far fa-circle"></i>
                        <p> Add Order</p>
                      </a>
                    </li>
                  <?php endif; ?>
                  <?php if (in_array('updateOrder', $user_permission) || in_array('viewOrder', $user_permission) || in_array('deleteOrder', $user_permission)) : ?>
                    <li class="nav-item">
                      <a href="<?php echo base_url('Controller_Orders') ?>" class="nav-link">
                        <i class="nav-icon far fa-circle"></i>
                        <p>Manage Order</p>
                      </a>
                    </li>
                  <?php endif; ?>
                </ul>
              </li>
            <?php endif; ?>
            <?php if (in_array('createRequest', $user_permission) || in_array('updateRequest', $user_permission) || in_array('viewRequest', $user_permission) || in_array('deleteRequest', $user_permission)) : ?>
              <li id="mainRequestsNav" class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-sign-out-alt"></i>
                  <p>
                    Requests
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <?php if (in_array('createRequest', $user_permission)) : ?>
                    <li class="nav-item">
                      <a href="<?php echo base_url('Controller_Requests/create') ?>" class="nav-link">
                        <i class="nav-icon far fa-circle"></i>
                        <p> Add Requests</p>
                      </a>
                    </li>
                  <?php endif; ?>
                  <?php if (in_array('updateRequest', $user_permission) || in_array('viewRequest', $user_permission) || in_array('deleteRequest', $user_permission)) : ?>
                    <li id="manageRequestsNav" class="nav-item">
                      <a href="<?php echo base_url('Controller_Requests') ?>" class="nav-link">
                        <i class="nav-icon far fa-circle"></i>
                        <p>Manage Requests</p>
                      </a>
                    </li>
                  <?php endif; ?>
                </ul>
              </li>
            <?php endif; ?>
          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-file-contract"></i>
            <p>
              Agreements
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('Controller_Agreements/create') ?>" class="nav-link">
                <i class="nav-icon far fa-circle"></i>
                <p> Add Agreement</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('Controller_Agreements') ?>" class="nav-link">
                <i class="nav-icon far fa-circle"></i>
                <p>Manage Agreement</p>
              </a>
            </li>
            <?php if (in_array('createRecipients', $user_permission) || in_array('updateRecipients', $user_permission) || in_array('viewRecipients', $user_permission) || in_array('deleteRecipients', $user_permission)) : ?>
              <li class="nav-item">
                <a href="<?php echo base_url('Controller_Recipients/') ?>" class="nav-link">
                  <i class="nav-icon fa fa-envelope-open-text"></i>
                  <p>Recipients</p>
                </a>
              </li>
            <?php endif; ?>
          </ul>
        </li>

        <li class="nav-item has-treeview" style="display:none">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-file-contract"></i>
            <p>
              Schedule Task
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo base_url('Controller_Schedule/create') ?>" class="nav-link">
                <i class="nav-icon far fa-circle"></i>
                <p> Add Schedule</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('Controller_Schedule') ?>" class="nav-link">
                <i class="nav-icon far fa-circle"></i>
                <p>Manage Schedule</p>
              </a>
            </li>
          </ul>
        </li>

        <?php if (in_array('createGroup', $user_permission) || in_array('updateGroup', $user_permission) || in_array('viewGroup', $user_permission) || in_array('deleteGroup', $user_permission)) : ?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-recycle"></i>
              <p>
                Permission
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php if (in_array('createGroup', $user_permission)) : ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('Controller_Permission/create') ?>" class="nav-link">
                    <i class="nav-icon far fa-circle"></i>
                    <p> Add Permission</p>
                  </a>
                </li>
              <?php endif; ?>
              <?php if (in_array('updateGroup', $user_permission) || in_array('viewGroup', $user_permission) || in_array('deleteGroup', $user_permission)) : ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('Controller_Permission') ?>" class="nav-link">
                    <i class="nav-icon far fa-circle"></i>
                    <p>Manage Permission</p>
                  </a>
                </li>
              <?php endif; ?>
            </ul>
          </li>
        <?php endif; ?>
      <?php endif; ?>
      <!-- <li class="nav-item">
            <a href="<?php echo base_url('Controller_Company/') ?>" class="nav-link">
              <i class="nav-icon fa fa-landmark"></i>
              <p>Company</p>
            </a>
          </li> -->


    </nav>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>