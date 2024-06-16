<?php $this->view('admin/admin-header', $data) ?>

<?php if ($action == 'add') : ?>
  <div class="card-body">
    <h5 class="card-title">New Product</h5>

    <!-- No Labels Form -->
    <form method="post" class="row g-3">
      <div class="col-md-12">
        <input value="<?=set_value('title')?>" name="title" type="text" class="form-control <?= !empty($errors['title']) ? 'border-danger' : ''; ?>" placeholder="Product Name">
        <?php if (!empty($errors['title'])) : ?>
          <span class="text-danger  font-weight-bold"><?= $errors['title'] ?></span>
        <?php endif; ?>
      </div>
      <div class="col-md-12">
        <select id="inputState"  name="category_id" class="form-select <?= !empty($errors['category_id']) ? 'border-danger' : ''; ?>">
          <option value="" selected="">Category...</option>
          <?php if (!empty($categories)) : ?>
            <?php foreach ($categories as $category) : ?>
              <option <?=set_select('category_id',$category->id)?> value="<?= $category->id ?>"><?= esc($category->category) ?></option>
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
        <?php if(!empty($rows)):?>
        <tbody>
        <?php foreach($rows as $row):?>
          <tr>
            <th scope="row"><?=$row->id?></th>
            <td><?=esc($row->title)?></td>
            <td><?=esc($row->user_row->name ?? 'Unkmown')?></td>
            <td><?=esc($row->category_row->category ?? 'Unknown')?></td>
            <td><?=esc($row->stock)?></td>
            <td><?=esc($row->color)?></td>
            <td><?=esc($row->price)?></td>
            <td><?=get_date($row->date)?></td>
            <td>
              <i class="bi bi-pencil-square"></i>
              <i class="bi bi-trash-fill"></i>
            </td>
          </tr>
          <?php endforeach;?>
        </tbody>
        <?php else:?>
          <tr><td colspan="10" class="text-center">No records found!</td></tr>
        <?php endif;?>
      </table>
      <!-- End Table with stripped rows -->

    </div>
  </div>
<?php endif; ?>

<?php $this->view('admin/admin-footer', $data) ?>