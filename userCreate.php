<?php 
include 'dbconfig.php'; 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deegautex - create new user_error</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="userCreate.css" media="screen">

</head>
<body>


<!-- <div class="container rounded bg-white mt-5 mb-5">
    <div class="row"><?php if(isset($_GET['error'])){ ?> <p class="error text-center text-danger mark"><?php echo $_GET['error']; ?></p> <?php } ?>
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="250px" src="img/logo3.png"><span class="font-weight-bold">Deegau Tex (Pvt.) Ltd.</span><span class="text-black-50">Phone: +880 1321-224660</span><span> </span>
            </div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <form action="userCreateBK.php" method="POST">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>

                <div class="row mt-2">

                    <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" placeholder="first name" value="" name="txtFirstName"></div>

                    <div class="col-md-6"><label class="labels">Surname</label><input type="text" class="form-control" value="" name="txtLastName" placeholder="surname"></div>

                </div>
                <div class="row mt-3">

                    <div class="col-md-12"><label class="labels">Designation</label>
                    <select name="cbxDesignation" class="form-control" id="cbxDesignation">
                    <?php 
                        $sqlData = "SELECT * FROM tb_dasignation_info";
                        $sqlResult = mysqli_query($conn,$sqlData); ?>
                    <option selected disabled>Select Designation</option>
                    <?php while($row = mysqli_fetch_array($sqlResult)){?>
                    <option value="<?php echo $catName = $row['Id']; ?>"><?php echo $row['D_Name']; ?></option>
                    <?php } ?>
                    </select>
                    </div>

                    <div class="col-md-12"><label class="labels">Date of Birth</label><input type="date" name="dtpDOB" class="form-control" value=""></div>

                    <div class="col-md-12"><label class="labels">Gender</label>
                    <select name="cbxGender" class="form-control" id="gender">
                        <option selected disabled>Select Gender</option>
                        <option value="Female">Female</option>
                        <option value="Male">Male</option>
                        <option value="Other">Other</option>
                        </select>
                    </div>

                    <div class="col-md-12"><label class="labels">Present Address</label><input type="text" class="form-control" name="txtPresentAddress" placeholder="Present Address" value=""></div>

                    <div class="col-md-12"><label class="labels">Permanent Address</label><input type="text" class="form-control" placeholder="Permanent Address" name="txtPermanentAddress" value=""></div>

                    <div class="col-md-12"><label class="labels">Email</label><input type="email" class="form-control" placeholder="Email" name="txtEmail" value=""></div>

                    <div class="col-md-12"><label class="labels">Phone</label><input type="number" class="form-control" placeholder="Phone" name="txtPhone" value=""></div>

                    <div class="col-md-12"><label class="labels">Emargency Phone</label><input type="number" class="form-control" placeholder="Emargency Phone" name="txtEPhone" value=""></div>

                    <div class="col-md-12"><label class="labels">Father's Name</label><input type="text" class="form-control" placeholder="Father's Name" name="txtFatherName" value=""></div>

                    <div class="col-md-12"><label class="labels">Mother's Name</label><input type="text" class="form-control" placeholder="Mother's Name" name="txtMotherName" value=""></div>

                    <div class="col-md-12"><label class="labels">Nationality</label><input type="text" class="form-control" name="txtNationality" placeholder="Nationality" value=""></div>

                    <div class="col-md-12"><label class="labels">Relisigon</label><input type="text" class="form-control" name="txtRelisigon" placeholder="Relisigon" value=""></div>

                    <div class="col-md-12"><label class="labels">Marrital Status</label>
                    <select name="cbxMarritalStatus" class="form-control" id="MarritalStatus">
                        <option selected disabled>Select Marrital Status</option>
                        <option value="Married">Married</option>
                        <option value="Un-married">Un-married</option>
                        </select>
                    </div>

                    <div class="col-md-12"><label class="labels">NID</label><input type="number" class="form-control" placeholder="NID" name="txtNID" value=""></div>

                </div>

                <div class="row mt-3">

                    <div class="col-md-6"><label class="labels">Office ID</label><input type="number" class="form-control" placeholder="Office ID" name="txtOfficeId" value=""></div>

                    <div class="col-md-6"><label class="labels">Blood Group</label><input type="text" class="form-control" value="" placeholder="Blood Group" name="txtBlooadGroup"></div>

                </div>

                <div class="col-md-12"><label class="labels">Join Date</label><input type="date" class="form-control" name="dtpJoinDate" value=""></div>

                <div class="col-md-12"><label class="labels">Image</label><input type="file" class="form-control" name="my_image"></div>

                <br><hr>

                <div class="col-md-12"><label class="labels">Username (cann't change username)</label><input type="text" class="form-control" placeholder="username" name="txtUsername" value=""></div>

                <div class="col-md-12"><label class="labels">Password</label><input type="password" class="form-control" placeholder="Password" name="txtPassword" value=""></div>

                <div class="col-md-12"><label class="labels">Re-type Password</label><input type="password" class="form-control" name="txtRePassword" placeholder="Re-type password" value=""></div>    

                <div class="mt-5 text-center">
                    <a href="log.php"><button class="button-30" type="button">Back</button></a>
                    <button class="button-30" type="submit" name="btnSubmit">Save Profile</button>
                    <button class="button-30" type="button">Cancel</button>
                </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span>Important Information</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>Generate</span></div><br>
                <div class="col-md-12"><label class="labels">Username (cann't change username)</label><input type="text" class="form-control" placeholder="username" value=""></div>
                <div class="col-md-12"><label class="labels">Password</label><input type="password" class="form-control" placeholder="Password" value=""></div>
                <div class="col-md-12"><label class="labels">Re-type Password</label><input type="password" class="form-control" placeholder="Re-type password" value=""></div>    
                <div class="mt-5 text-center">
                    <a href="log.php"><button class="button-30" type="button">Back</button></a>
                    <button class="button-30" type="submit" name="btnSubmit">Save Profile</button>
                    <button class="button-30" type="button">Cancel</button>
                </div> 
            </div>
        </div>
            <marquee class="bg-warning"><b>Warning: </b> Do not create duplicate profail. Please fill all value in real. If we found false information, we can delete your account without any notice. You cann't found your salary without this account. so, Becarefull create your account & save your username & password. Thank you ! !! !!!  <b>সর্তকবার্তা:</b> ডুপ্লিকেট প্রোফাইল তৈরি করবেন না। প্রকৃত সব মান পূরণ করুন. যদি আমরা মিথ্যা তথ্য খুঁজে পাই, আমরা কোনো বিজ্ঞপ্তি ছাড়াই আপনার অ্যাকাউন্ট মুছে দিতে পারি। আপনি এই অ্যাকাউন্ট ছাড়া আপনার বেতন পাবেন না. সুতরাং, সাবধানে আপনার অ্যাকাউন্ট তৈরি করুন এবং আপনার ব্যবহারকারীর নাম এবং পাসওয়ার্ড গোপনীয়তার সাথে সংরক্ষণ করুন। ধন্যবাদ ! !! !!!</marquee>
            </div>
        </div>
    </div>
</div> -->

<section id="userCreateSection">
    <div class="container mt-5 rounded bg-white">
        <div class="row"><?php if(isset($_GET['error'])){ ?> <p class="error text-center text-danger mark"><?php echo $_GET['error']; ?></p> <?php } ?>
        <div class="row border-right">
            <div class="col-md-3">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="250px" src="img/logo3.png"><span class="font-weight-bold">Deegau Tex (Pvt.) Ltd.</span><span class="text-black-50">Phone: +880 1321-224660</span>
                </div>
            </div>
            <div class="col-md-8 ">
                <form action="userCreateBK" method="POST" enctype="multipart/form-data">

                    <div class="d-flex justify-content-between align-items-center m-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label class="labels" for="firstname">First Name</label>
                            <input type="text" class="form-control" id="firstname" placeholder="First name" name="txtFirstName">
                        </div>
                        <div class="col-md-6">
                            <label class="labels" for="lastname">Last Name</label>
                            <input type="text" class="form-control" id="lastname" placeholder="Last name" name="txtLasttName">
                        </div>
                    </div>

                    <div class="col-md-12"><label class="labels" for="designation">Designation</label>
                        <select name="cbxDesignation" class="form-control" id="designation">
                        <?php 
                            $sqlData = "SELECT * FROM tb_dasignation_info";
                            $sqlResult = mysqli_query($conn,$sqlData); ?>
                        <option selected disabled>Select Designation</option>
                        <?php while($row = mysqli_fetch_array($sqlResult)){?>
                        <option value="<?php echo $catName = $row['D_Name']; ?>"><?php echo $row['D_Name']; ?></option>
                        <?php } ?>
                        </select>
                    </div>

                    <div class="col-md-12"><label class="labels" for="dob">Date of Birth</label><input type="date" name="dtpDOB" id="dob" class="form-control"></div>

                    <div class="col-md-12"><label class="labels" for="gender">Gender</label>
                    <select name="cbxGender" class="form-control" id="gender">
                        <option selected disabled>Select Gender</option>
                        <option value="Female">Female</option>
                        <option value="Male">Male</option>
                        <option value="Other">Other</option>
                        </select>
                    </div>

                    <div class="col-md-12"><label class="labels">Present Address</label><input type="text" class="form-control" name="txtPresentAddress" placeholder="Present Address" ></div>

                    <div class="col-md-12"><label class="labels">Permanent Address</label><input type="text" class="form-control" placeholder="Permanent Address" name="txtPermanentAddress" ></div>

                    <div class="col-md-12"><label class="labels">Email</label><input type="email" class="form-control" placeholder="Email" name="txtEmail" ></div>

                    <div class="col-md-12"><label class="labels">Phone</label><input type="number" class="form-control" placeholder="Phone" name="txtPhone" ></div>

                    <div class="col-md-12"><label class="labels">Emargency Phone</label><input type="number" class="form-control" placeholder="Emargency Phone" name="txtEPhone" ></div>

                    <div class="col-md-12"><label class="labels">Father's Name</label><input type="text" class="form-control" placeholder="Father's Name" name="txtFatherName" ></div>

                    <div class="col-md-12"><label class="labels">Mother's Name</label><input type="text" class="form-control" placeholder="Mother's Name" name="txtMotherName" ></div>

                    <div class="col-md-12"><label class="labels">Nationality</label><input type="text" class="form-control" name="txtNationality" placeholder="Nationality" ></div>

                    <div class="col-md-12"><label class="labels">Relisigon</label><input type="text" class="form-control" name="txtRelisigon" placeholder="Relisigon" ></div>

                    <div class="col-md-12"><label class="labels">Marrital Status</label>
                    <select name="cbxMarritalStatus" class="form-control" id="MarritalStatus">
                        <option selected disabled>Select Marrital Status</option>
                        <option value="Married">Married</option>
                        <option value="Un-married">Un-married</option>
                        </select>
                    </div>

                    <div class="col-md-12"><label class="labels">NID</label><input type="number" class="form-control" placeholder="NID" name="txtNID" ></div>

                    <div class="row mt-3">

                        <div class="col-md-6"><label class="labels">Office ID</label><input type="number" class="form-control" placeholder="Office ID" name="txtOfficeId"></div>

                        <div class="col-md-6"><label class="labels">Blood Group</label><input type="text" class="form-control" placeholder="Blood Group" name="txtBlooadGroup"></div>

                    </div>

                    <div class="col-md-12"><label class="labels">Join Date</label><input type="date" class="form-control" name="dtpJoinDate"></div>

                    <div class="col-md-12"><label class="labels">Image (300px X 300px)</label><input type="file" class="form-control" name="my_image"></div>

                    <br><hr>

                    <div class="col-md-12"><label class="labels">Username (cann't change username)</label><input type="text" class="form-control" placeholder="username" name="txtUsername"></div>

                    <div class="col-md-12"><label class="labels">Password</label><input type="password" class="form-control" placeholder="Password" name="txtPassword"></div>

                    <div class="col-md-12"><label class="labels">Re-type Password</label><input type="password" class="form-control" name="txtRePassword" placeholder="Re-type password"></div>

                    <div class="my-5 text-center">
                        <a href="log"><button class="button-30" type="button">Back</button></a>
                        <button class="button-30" type="submit" name="btnSubmit">Save Profile</button>
                        <button class="button-30" type="button">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
    
</body>
</html>
