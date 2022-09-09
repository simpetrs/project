<?php
include_once "../header_doctor.php";
?>
<main id="main" class="main">

    <!-- I Have to work on this page title tonight -->
    <div class="col-12">
        <div class="card">
            <div class="pagetitle">
                <h1>Profile</h1>
                <?php
                $rows = mysqli_query($conn, "select * from user where user_Id = '" . $_SESSION['user_Id'] . "'");
                $rows = mysqli_fetch_array($rows);
                $user = $_SESSION['user_Id'];
                if (isset($_POST['names'])) {
                    $names = trim($_POST['names']);
                    $description = trim($_POST['about']);
                    $job = trim($_POST['job']);
                    $country = trim($_POST['country']);
                    $company  = trim($_POST['company']);
                    $address = trim($_POST['address']);
                    $phone = trim($_POST['phone']);
                    if (! empty($_FILES['file']['name'])) {
                        include_once "../upload.php";
                    }
                    if (empty($names) or empty($phone) or empty($address)) {
                        ?>
                        <div class="alert alert-danger">
                            Name field, phone field and Address should be provided.
                        </div>
                        <?php
                    } else {
                        mysqli_query($conn, "update user set name = '$names', description = '$description',
                                              job = '$job', country = '$country', address = '$address', phone = '$phone', company = '$company' where user_Id = '$user' ") or die(mysqli_query($conn));
                        ?>
                        <div class="alert alert-success">
                            Successfully updated Personal Profile.
                        </div>
                        <?php
                    }
                }
                elseif (isset($_POST['changePwd'])) {
                    $password_1 = hash("sha256", $_POST['newpassword']);
                    $password_2 = hash("sha256", $_POST['renewpassword']);
                    $old_password = hash("sha256", $_POST['password']);
                    if($rows['password'] != $old_password) {
                        ?>
                        <div class="alert alert-danger">
                            Old password incorrect
                        </div>
                        <?php
                    }else {
                        if ($password_1 != $password_2) {
                            ?>
                            <div class="alert alert-danger">
                                Password mismatch.
                            </div>
                            <?php

                        } else{
                            mysqli_query($conn, "update user set password = '$password_2' where user_Id = '$user'") or die(mysqli_error($conn));
                            ?>
                            <div class="alert alert-success">
                                Password successfully changed. You will
                            </div>
                            <?php
                        }
                    }
                }
                ?>
            </div>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">

                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                            <img src="assets/img/<?=$rows['photo']?>" alt="<?=$rows['photo']?>" class="rounded-circle">
                            <h2><?=$_SESSION['names']?></h2>
                            <h3></h3>

                        </div>
                    </div>

                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                                </li>

                            </ul>

                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <!-- <h5 class="card-title">About</h5>
                                    <p class="small fst-italic"></p> -->

                                    <h5 class="card-title">Profile Details</h5>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $rows["name"]; ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $rows["email"]; ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Telephone number</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $rows["phone"]; ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Country</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $rows["country"]; ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Address</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $rows["address"]; ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Phone</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $rows["phone"]; ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $rows["email"]; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Description</div>
                                        <div class="col-lg-9 col-md-8"><?php echo $rows["description"]; ?></div>
                                    </div>
                                </div>

                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                    <!-- Profile Edit Form -->
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="row mb-3">
                                            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                            <div class="col-md-8 col-lg-9">
                                                <img src="assets/img/<?=$rows['photo']?>" alt="Profile">
                                                <div class="pt-2">
                                                    <label for="fileUpload" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></label>
                                                    <input type="file" id="fileUpload" name="file" style="display: none" onchange="alert('file has been selected')"/>
                                                    <a href="../upload.php?delete_pic=<?=$rows['photo']?>" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="names" type="text" class="form-control" id="fullName" value="<?=$rows['name']?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                                            <div class="col-md-8 col-lg-9">
                                                <textarea name="about" class="form-control" id="about" style="height: 100px" placeholder="Short Biography"><?=$rows['description']?></textarea>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="company" type="text" class="form-control" id="company" placeholder="Where do you work from?" value="<?=$rows['company']?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="job" type="text" class="form-control" id="Job" placeholder="Your Job description" value="<?=$rows['job']?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="country" type="text" class="form-control" id="Country" placeholder="Eg: Uganda" value="<?=$rows['country']?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="address" type="text" class="form-control" id="Address" placeholder="Where do you stay?" value="<?=$rows['address']?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="phone" type="text" class="form-control" id="Phone" value="<?=$rows['phone']?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input  type="email" disabled class="form-control" id="Email" value="<?=$rows['email']?>">
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" value="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form><!-- End Profile Edit Form -->
                                </div>

                                <div class="tab-pane fade pt-3" id="profile-change-password">
                                    <!-- Change Password Form -->
                                    <form action="" method="post">

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
                                            <input type="submit" class="btn btn-primary" name="changePwd" value="Change Password">
                                        </div>
                                    </form><!-- End Change Password Form -->

                                </div>

                            </div><!-- End Bordered Tabs -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<!-- <footer id="footer" class="footer">
  <div class="copyright">&copy; Copyright <strong><span>Group-IST 6</span></strong>. All Rights Reserved
  </div>
</footer>End Footer -->

<!-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> -->

<!-- Vendor JS Files -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="  crossorigin="anonymous"></script>

<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/chart.js/chart.min.js"></script>
<script src="assets/vendor/echarts/echarts.min.js"></script>
<script src="assets/vendor/quill/quill.min.js"></script>
<script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="assets/vendor/tinymce/tinymce.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Verms Main JS File -->
<script src="assets/js/main.js"></script>
<script>
    function fileUpload() {
        alert("File changes ready to submit")
    }
</script>

</body>

</html>