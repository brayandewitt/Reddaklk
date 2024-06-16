<?php $this->view('admin/admin-header', $data) ?>

<?php if ($action == 'add') : ?>
  <div class="card-body">
    <h5 class="card-title">New Product</h5>

    <!-- No Labels Form -->
    <form class="row g-3">
      <div class="col-md-12">
        <input type="text" class="form-control" placeholder="Product Name">
      </div>
      <div class="col-md-12">
        <select id="inputState" class="form-select">
          <option value="" selected="">Category...</option>
          <?php if(!empty($categories)):?>
            <?php foreach($categories as $category):?>
              <option value="<?=$category->id?>"><?=esc($category->category)?></option>
            <?php endforeach?>
          <?php endif?>
          
        </select>
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

  <div class="card">
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
            <th scope="col">Stock</th>
            <th scope="col">Color</th>
            <th scope="col">Price</th>
            <th scope="col">date</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>shirt</td>
            <td>15</td>
            <td>red</td>
            <td>3000</td>
            <td>2016-05-25</td>
            <td>
              <i class="bi bi-pencil-square"></i>
              <i class="bi bi-trash-fill"></i>
            </td>
          </tr>
        </tbody>
      </table>
      <!-- End Table with stripped rows -->

    </div>
  </div>
<?php endif; ?>

<?php $this->view('admin/admin-footer', $data) ?>