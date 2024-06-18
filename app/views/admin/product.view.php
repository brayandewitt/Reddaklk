<?php $this->view('admin/admin-header', $data) ?>

<?php if ($action == 'add') : ?>
  <div class="card-body">
    <h5 class="card-title">New Product</h5>

    <!-- No Labels Form -->
    <form method="post" class="row g-3">
      <div class="col-md-12">
        <input value="<?= set_value('title') ?>" name="title" type="text" class="form-control <?= !empty($errors['title']) ? 'border-danger' : ''; ?>" placeholder="Product Name">
        <?php if (!empty($errors['title'])) : ?>
          <span class="text-danger  font-weight-bold"><?= $errors['title'] ?></span>
        <?php endif; ?>
      </div>
      <div class="col-md-12">
        <select id="inputState" name="category_id" class="form-select <?= !empty($errors['category_id']) ? 'border-danger' : ''; ?>">
          <option value="" selected="">Category...</option>
          <?php if (!empty($categories)) : ?>
            <?php foreach ($categories as $category) : ?>
              <option <?= set_select('category_id', $category->id) ?> value="<?= $category->id ?>"><?= esc($category->category) ?></option>
            <?php endforeach ?>
          <?php endif ?>

        </select>
        <?php if (!empty($errors['category'])) : ?>
          <span class="text-danger  font-weight-bold"><?= $errors['category'] ?></span>
        <?php endif; ?>
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="<?= ROOT ?>/admin/product">
          <button type="button" class="btn btn-secondary">cancel</button>
        </a>
      </div>
    </form><!-- End No Labels Form -->

  </div>

<?php elseif ($action == 'edit') : ?>
  <div class="card">
  <div class="card-body">
    <h5 class="card-title">Edit Product</h5>
    <?php if (!empty($row)) : ?>
      <div class="float-end ">
        <button class="btn btn-success">save</button>
        <a href="<?=ROOT?>/admin/product">
        <button class="btn btn-primary">back</button>
        </a>
      </div>
      
      <h5 class=""><?=esc($row->title)?></h5>
      <!-- Bordered Tabs Justified -->
      <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
        <li class="nav-item flex-fill" role="presentation">
          <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
        </li>
        <li class="nav-item flex-fill" role="presentation">
          <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
        </li>
        <li class="nav-item flex-fill" role="presentation">
          <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
        </li>
      </ul>
      <div class="tab-content pt-2" id="borderedTabJustifiedContent">
        <div class="tab-pane fade show active" id="bordered-justified-home" role="tabpanel" aria-labelledby="home-tab">
          Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.
        </div>
        <div class="tab-pane fade" id="bordered-justified-profile" role="tabpanel" aria-labelledby="profile-tab">
          Nesciunt totam et. Consequuntur magnam aliquid eos nulla dolor iure eos quia. Accusantium distinctio omnis et atque fugiat. Itaque doloremque aliquid sint quasi quia distinctio similique. Voluptate nihil recusandae mollitia dolores. Ut laboriosam voluptatum dicta.
        </div>
        <div class="tab-pane fade" id="bordered-justified-contact" role="tabpanel" aria-labelledby="contact-tab">
          Saepe animi et soluta ad odit soluta sunt. Nihil quos omnis animi debitis cumque. Accusantium quibusdam perspiciatis qui qui omnis magnam. Officiis accusamus impedit molestias nostrum veniam. Qui amet ipsum iure. Dignissimos fuga tempore dolor.
        </div>
      </div>
      <!-- End Bordered Tabs Justified -->
    <?php else : ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-octagon me-1"></i>
        That product not found!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif ?>
  </div>
  </div>
<?php else : ?>

  <div class="card m-md-5">
    <div class="card-body">
      <h5 class="card-title">My product
        <a href="<?= ROOT ?>/admin/product/add">
          <button class="btn btn-primary float-end"><i class="bi bi-plus"></i>New Product</button>
        </a>
      </h5>

      <!-- Table with stripped rows -->
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Product Name</th>
            <th scope="col">user</th>
            <th scope="col">category</th>
            <th scope="col">Stock</th>
            <th scope="col">Color</th>
            <th scope="col">Price</th>
            <th scope="col">date</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <?php if (!empty($rows)) : ?>
          <tbody>
            <?php foreach ($rows as $row) : ?>
              <tr>
                <th scope="row"><?= $row->id ?></th>
                <td><?= esc($row->title) ?></td>
                <td><?= esc($row->user_row->name ?? 'Unkmown') ?></td>
                <td><?= esc($row->category_row->category ?? 'Unknown') ?></td>
                <td><?= esc($row->stock) ?></td>
                <td><?= esc($row->color) ?></td>
                <td><?= esc($row->price_row->name ?? 'Unknown') ?></td>
                <td><?= get_date($row->date) ?></td>
                <td>
                  <a href="<?= ROOT ?>/admin/product/edit/<?= $row->id ?>">
                    <i class="bi bi-pencil-square text-primary-emphasis"></i>
                  </a>
                  <a href="<?= ROOT ?>/admin/product/delete/<?= $row->id ?>">
                    <i class="bi bi-trash-fill text-danger"></i>
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        <?php else : ?>
          <tr>
            <td colspan="10" class="text-center">No records found!</td>
          </tr>
        <?php endif; ?>
      </table>
      <!-- End Table with stripped rows -->

    </div>
  </div>
<?php endif; ?>

<?php $this->view('admin/admin-footer', $data) ?>