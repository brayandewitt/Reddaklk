<?php $this->view('admin/admin-header', $data) ?>

<?php if (!empty($row)) : ?>
  <div class="pagetitle">
    <h1>Profile</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Users</li>
        <li class="breadcrumb-item active">Profile</li>
        <li class="breadcrumb-item active"><?= esc(ucfirst($row->firstname)) ?> <?= esc(ucfirst($row->lastname)) ?></li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="<?= ROOT ?>/<?= $row->image ?>" alt="Profile" style="width: 150px; max-width: 150px; height: 150px; object-fit: cover;" class="rounded-circle">
            <h2><?= esc(ucfirst($row->firstname)) ?> <?= esc(ucfirst($row->lastname)) ?></h2>
            <h3><?= esc(ucfirst($row->role)) ?></h3>
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button onclick="set_tab(this.getAttribute('data-bs-target'))" class="border-0" data-bs-toggle="tab" data-bs-target="#profile-overview" id="profile-overview-tab">Overview</button>
              </li>

              <li class="nav-item">
                <button onclick="set_tab(this.getAttribute('data-bs-target'))" class="border-0" data-bs-toggle="tab" data-bs-target="#profile-edit" id="profile-edit-tab">Edit Profile</button>
              </li>

              <li class="nav-item">
                <button onclick="set_tab(this.getAttribute('data-bs-target'))" class="border-0" data-bs-toggle="tab" data-bs-target="#profile-settings" id="profile-setting-tab">Settings</button>
              </li>

              <li class="nav-item">
                <button onclick="set_tab(this.getAttribute('data-bs-target'))" class="border-0" data-bs-toggle="tab" data-bs-target="#profile-change-password" id="profile-change-password-tab">Change Password</button>
              </li>

            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">

                <h5 class="card-title">Profile Details</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Full Name</div>
                  <div class="col-lg-9 col-md-8"><?= esc(ucfirst($row->firstname)) ?> <?= esc(ucfirst($row->lastname)) ?></div>
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Address</div>
                  <div class="col-lg-9 col-md-8"><?= esc($row->address) ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Phone</div>
                  <div class="col-lg-9 col-md-8"><?= esc($row->mobile) ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8"><?= esc($row->email) ?> </div>
                </div>

              </div>

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                <!-- Profile Edit Form -->
                <form method="post" enctype="multipart/form-data">
                  <div class="row mb-3">
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                    <div class="col-md-8 col-lg-9">
                      <div class="d-flex ">
                        <img class="js-image-preview" src="<?= ROOT ?>/<?= $row->image ?>">
                        <div class="js-filename m-2">Selected File: None</div>
                      </div>
                      <div class="pt-2">
                        <label href="#" class="btn btn-primary btn-sm" title="Upload new profile image">
                          <i class="text-white bi bi-upload"></i>
                          <input class="js-profile-image-input" onchange="load_image(this.files[0])" type="file" name="image" style="display: none;">
                        </label>
                        <?php if (!empty($errors['image'])) : ?>
                      <span class="js-error-image text-danger  font-weight-bold"><?= $errors['image'] ?></span>
                    <?php endif; ?>
                    <span class="js-error-image text-danger  font-weight-bold"></span>
                        <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                      </div>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="firstname" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="firstname" type="text" class="form-control" id="firstname" value="<?= set_value('firstname', $row->firstname) ?>" required>
                    </div>
                    <?php if (!empty($errors['firstname'])) : ?>
                      <span class="js-error-firstname text-danger font-weight-bold"><?= $errors['firstname'] ?></span>
                    <?php endif; ?>
                    <span class="js-error-firstname text-danger font-weight-bold"></span>
                  </div>
                  <div class="row mb-3">
                    <label for="lastname" class="col-md-4 col-lg-3 col-form-label">last Name</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="lastname" type="text" class="form-control" id="lastname" value="<?= set_value('lastname', $row->lastname) ?>" required>
                    </div>
                    <?php if (!empty($errors['lastname'])) : ?>
                      <span class="js-error-lastname text-danger  font-weight-bold"><?= $errors['lastname'] ?></span>
                    <?php endif; ?>
                    <span class="js-error-lastname text-danger  font-weight-bold"></span>
                  </div>
                  <div class="row mb-3">
                    <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="address" type="text" class="form-control" id="Address" value="<?= set_value('address', $row->address) ?>">
                    </div>
                    <?php if (!empty($errors['address'])) : ?>
                      <span class="js-error-address text-danger  font-weight-bold"><?= $errors['address'] ?></span>
                    <?php endif; ?>
                    <span class="js-error-address text-danger  font-weight-bold"></span>
                  </div>

                  <div class="row mb-3">
                    <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="mobile" type="text" class="form-control" id="Phone" value="<?= set_value('mobile', $row->mobile) ?>">
                    </div>
                    <?php if (!empty($errors['mobile'])) : ?>
                      <span class="js-error-phone text-danger  font-weight-bold"><?= $errors['mobile'] ?></span>
                    <?php endif; ?>
                    <span class="js-error-mobile text-danger  font-weight-bold"></span>
                  </div>

                  <div class="row mb-3">
                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="email" type="email" class="form-control" id="Email" value="<?= set_value('email', $row->email) ?>" required>
                    </div>
                    <?php if (!empty($errors['email'])) : ?>
                      <span class="js-error-email text-danger  font-weight-bold"><?= $errors['email'] ?></span>
                    <?php endif; ?>
                    <span class="js-error-email text-danger  font-weight-bold"></span>
                  </div>
                  <div class="js-prog progress mb-2 hide">
                    <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                  </div>

                  <div class="text-center">
                    <a href="<?= ROOT ?>/admin/dashbord">
                      <button type="button" class="btn btn-primary float-start">back</button>
                    </a>
                    <button  type="button" onclick="save_profile(event)" type="submit" class="btn btn-danger float-end">Save Changes</button>
                  </div>
                </form><!-- End Profile Edit Form -->

              </div>

              <div class="tab-pane fade pt-3" id="profile-settings">

                <!-- Settings Form -->
                <form>

                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                    <div class="col-md-8 col-lg-9">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="changesMade" checked>
                        <label class="form-check-label" for="changesMade">
                          Changes made to your account
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="newProducts" checked>
                        <label class="form-check-label" for="newProducts">
                          Information on new products and services
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="proOffers">
                        <label class="form-check-label" for="proOffers">
                          Marketing and promo offers
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                        <label class="form-check-label" for="securityNotify">
                          Security alerts
                        </label>
                      </div>
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                  </div>
                </form><!-- End settings Form -->

              </div>

              <div class="tab-pane fade pt-3" id="profile-change-password">
                <!-- Change Password Form -->
                <form>

                  <div class="row mb-3">
                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="password" type="password" class="form-control" id="currentPassword">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="newpassword" type="password" class="form-control" id="newPassword">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Change Password</button>
                  </div>
                </form><!-- End Change Password Form -->

              </div>

            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>

<?php else : ?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <i class="bi bi-exclamation-octagon me-1"></i>
    That profile was not found!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php endif; ?>

<script>
  var tab = sessionStorage.getItem("tab") ? sessionStorage.getItem("tab") : "#profile-overview";

  if (typeof tab == 'undefined') {

    var tab = "#profile-edit";
  }

  function show_tab(tab_name) {
    const someTabTriggerEl = document.querySelector(tab_name + "-tab");
    const tab = new bootstrap.Tab(someTabTriggerEl);
    tab.show();
  }

  function set_tab(tab_name) {
    tab = tab_name;
    sessionStorage.setItem("tab", tab_name);
  }

  function load_image(file) {
    document.querySelector(".js-filename").innerHTML = "Selected File: " + file.name;
    var mylink = window.URL.createObjectURL(file);

    document.querySelector(".js-image-preview").src = mylink;
  }

  window.onload = function() {
    show_tab(tab);
  }

  // upload functions
  function save_profile(e) {

    var form = e.currentTarget.form;
    var inputs = form.querySelectorAll("input,textarea");
    var obj = {};
    var image_added = false;

    for (let i = 0; i < inputs.length; i++) {
      var key = inputs[i].name;
      if (key == 'image') {
        if (typeof inputs[i].files[0] == 'object') {
          obj[key] = inputs[i].files[0];
          image_added = true;
        }
      } else {

        obj[key] = inputs[i].value;
      }

    }
    
    //validate image
    if(image_added){

      var allowed = ['jpg', 'jpeg', 'png'];
      if (typeof obj.image == 'object') {
        var ext = obj.image.name.split(".").pop();
      }
      if (!allowed.includes(ext.toLowerCase())) {
        alert("Only these file types are allowed in profile image: " + allowed.toString(","));
        return;
      }
    }
    send_data(obj);
  }

  function send_data(obj, progbar = 'js-prog') {

    var prog = document.querySelector("." + progbar);
    prog.children[0].style.width = "0%";
    prog.classList.remove("hide");
    var myform = new FormData();
    for (key in obj) {
      myform.append(key, obj[key]);
    }
    var ajax = new XMLHttpRequest();
    ajax.addEventListener('readystatechange', function() {
      if (ajax.readyState == 4) {
        if (ajax.status == 200) {
          //alert("upload complete");
          
          handle_result(ajax.responseText);
        } else {
          alert("an error occurred");
        }
      }
    });
    ajax.upload.addEventListener('progress', function(e) {
      var percent = Math.round((e.loaded / e.total) * 100);
      prog.children[0].style.width = percent + "%";
      prog.children[0].innerHTML = "Saving .." + percent + "%";
    });
    ajax.open('post', '', true);
    ajax.send(myform);
  }

  function handle_result(result){
    var obj = JSON.parse(result);
    if(typeof obj == 'object'){

      if(typeof obj.errors == 'object'){
        display_errors(obj.errors);
        alert("Please correct the errors on the page");
      }else{
        alert("Profile data saved successfully!");
        window.location.reload();
      }
    }
  }

  function display_errors(errors){
    for(key in errors){
      document.querySelector(".js-error-"+key).innerHTML = errors[key];
    }
  }

</script>

<?php $this->view('admin/admin-footer', $data) ?>