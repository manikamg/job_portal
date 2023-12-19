<?php include("function.php");
$uri = $_SERVER['REQUEST_URI'];
$uri_array = explode("/", $uri); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width,initial-scale=1" name="viewport">
  <title>Get Hire From Top Companies | Apply Online | Root Placement</title>
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <div id="pageloader"><img src="assets/loader.gif" alt="processing..." /></div>
  <style>
    #pageloader {
      background: rgba(255, 255, 255, .8);
      display: none;
      height: 100%;
      position: fixed;
      width: 100%;
      z-index: 9999
    }

    #pageloader img {
      left: 50%;
      margin-left: -32px;
      margin-top: -32px;
      position: absolute;
      top: 50%
    }
    .input {
      box-shadow:0 0 10px 1px #D5D8DC;
    }
  </style>
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
  <div class="login-box-body">

    <section class="content">

      <!-- Small boxes (Stat box) -->
      <div class="row">

        <div class="col-lg-6 pull-right">
          <img src="assets/images/registration_bg.jpg" alt="Registration bg" style="height: 100%;width: 100%">
        </div>

        <div class="col-lg-6">

          <form method="post" enctype="multipart/form-data" id="myform" action="submit-apply.php">

            <input type='hidden' value='
              <?php if (!empty($uri_array['3'])) {
                echo $uri_array['3'];
              } else {
                '';
              } ?>' name='postid'>
            <input type='hidden' value='job@654321' name='password'>



            <div class="row">
              <div class="col-lg-12">
                <h1 style="
                width:100%;
                padding: 10px 0;
                text-align:center;
                box-shadow:0 0 10px 1px #1B4F72;
                border-bottom: 3px solid #1B4F72;
                color:#000;
                border-radius:5px;
                font-size:18px;
                ">
                  Create Your Profile <br />
                  <small style="color:orange;">& Get Your Dream Job</small>
                </h1>
              </div>
            </div>


            <div class="row" style="position:relative">

              <div class="col-lg-6">
                <span style="background-color:orange;color:#fff;border-radius:10%;">
                  <label>Your Job Preference? <b style="color:red">*</b>
                  </label>
                  <select class="form-control form-group input select2" name="tag" required="required"
                    data-placeholder="Select Your Job Preference?" style="width:100%;">
                    <option value="">Select Any </option>
                    <?php $indust = printwhileloop("SELECT `id`,`postname` FROM `postnames` ORDER BY `id` DESC");
                    foreach ($indust as $key => $indtyp) { ?>
                      <option value="
                        <?php echo $indtyp[0]; ?>">
                        <?php echo ($indtyp[1]); ?>
                      </option>
                    <?php } ?>
                  </select>
                </span>
              </div>
              <!-- ----------- -->
              <div class="col-lg-6">
                <div class="form-group has-feedback">
                  <label>Full Name <b style=color:red;>*</b>
                  </label>
                  <input type="text" name="fname" class="form-control input" placeholder="What is You Full Name?"
                    required="required" maxlegth="75">
                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
              </div>
            </div>
            <!-- ----------- -->
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group has-feedback">
                  <label>Mobile <b style=color:red;>*</b>
                  </label>
                  <input type="text" name="mobile" maxlength="10" class="form-control input"
                    placeholder="What is Your Mobile Number?" pattern="[0-9]+" required="required">
                  <small>Recruiters call you on this number</small>
                  <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                </div>
              </div>
              <!-- ----------- -->
              <div class="col-lg-6">
                <div class="form-group has-feedback">
                  <label>Current City <b style=color:red;>*</b>
                  </label>
                  <input type="text" name="currentcity" maxlength="225" class="form-control input"
                    placeholder="What is Your Current City?" required="required">
                </div>
              </div>
            </div>
            <!-- ----------- -->
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group has-feedback">
                  <label>Email Id </label>
                  <input type="email" name="mail" class="form-control input" placeholder="What is Your Mail?">
                  <span class="fa fa-envelope form-control-feedback"></span>
                </div>
              </div>
              <!-- ----------- -->
              <div class="col-lg-6">
                <input type='hidden' class="form-control input" name='yourlanguage' placeholder="hindi,marthi" maxlength="25"
                  value="english">
                <label>Highest Qualification <b style="color: red"> * </b>
                </label>
                <select class="form-control form-group input select2" name="hq" required="required"
                  data-placeholder="Your Qualification?" style="width: 100%;">
                  <option value="">Select Any </option>
                  <?php $loop = mysqli_query($db, "SELECT `id`, `name` FROM `higest_qual`");
                  while ($abc = mysqli_fetch_array($loop)) { ?>
                    <option value="
                                <?php echo $abc['id'] ?>">
                      <?php echo ucwords($abc['name']); ?>
                    </option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <!-- ----------- -->
            <div class="row">
              <div class="col-lg-3 col-xs-6 form-group ">
                <label>Computer Skill? <b style="color:red">*</b>
                </label>
                <br />
                <input type="radio" name="comp" value="yes" checked="checked"> Yes <input type="radio" name="comp"
                  value="no"> No
              </div>
              <!-- ----------- -->

              <div class="col-lg-3 col-xs-6 form-group ">
                <label>You Are? <b style="color:red">*</b>
                </label>
                <br />
                <input type="radio" name="gender" value="male" checked="checked"> Male <input type="radio" name="gender"
                  value="female"> Female
              </div>

              <!-- ---------- -->
              <div class="col-lg-6">
                <div class="form-group has-feedback">
                  <label>Experience? <b style="color:red">*</b>
                  </label>
                  <br />
                  <input type="radio" name="exp" value="no" checked="checked"> No <input type="radio" name="exp"
                    value="yes" id="chkPassport"> Yes <div id="dvPassport" style="display: none">
                    <br />
                    <label>Experience Details: </label>
                    <textarea name="preference" class="form-control input"
                      placeholder="Enter Your Experience Details on 225 Words" maxlength="225"></textarea>
                  </div>
                </div>
              </div>

            </div>

            <!-- ----------- -->
            <div class="row" style="margin-top: 20px;">
              <div class="col-lg-6">
                <label>English Skill? <b style="color:red">*</b>
                </label>
                <select class="form-control form-group input" name="english" required="required" data-placeholder="English Skill?">
                  <option value="fresher">Average</option>
                  <option value="good">Good</option>
                  <option value="expert">Expert</option>
                </select>
              </div>
              <!-- ----------- -->
              <div class="col-lg-6">
                <label>Your Skill </label>
                <select class="form-control form-group input select2" name="skillid[]" data-placeholder="Your Skill?" multiple="multiple"
                  style="width: 100%;">
                  <option value="">Select Any </option>
                  <?php $sskill = mysqli_query($db, "SELECT `id`,`name` FROM `skill` ORDER BY `name` ASC");
                  while ($abc = mysqli_fetch_array($sskill)) { ?>
                    <option value="
                              <?php echo $abc['id'] ?>">
                      <?php echo ucwords($abc['name']); ?>
                    </option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <!-- ----------- -->
            <div class="row">
              <div class="col-lg-12 col-xs-12">
                <div class="form-group">
                  <label>Job Location Pref <b style=color:red>*</b>
                  </label>
                  <div class="input-group">
                    <div class="input-group-addon">Location</div>
                    <select class="form-control input select2" name="city" required>
                      <option value="">Select City</option>
                      <?php $cityl = mysqli_query($db, "SELECT `id`, `name` FROM `job_locations`");
                      while ($rrr = mysqli_fetch_array($cityl)) { ?>
                        <option value="
                                        <?php echo ($rrr['id']); ?>">
                          <?php echo ucwords($rrr['name']); ?>
                        </option>
                      <?php } ?>
                    </select> : <input type="text" placeholder="Near area name" maxlength="75" class="form-control input"
                      name="locationnear">
                  </div>
                </div>
              </div>
            </div>

            <!-- ----------- -->
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group has-feedback">
                  <label>Select Photo <small>(jpg,png)</small>
                  </label>
                  <img id="blah" src="assets/employee/1.png" width="100px" height="100px" />
                  <br />
                  <input type="file" name="pic" class="form-control input" id="imgInp"
                    accept="image/png, image/gif, image/jpeg, image/jpg">
                </div>
              </div>
              <!-- ----------- -->
              <div class="col-lg-6">
                <div class="form-group has-feedback">
                  <label>Select Resume <small>(pdf,doc.)</small>
                  </label>
                  <img id="blahcv" src="assets/employee/no_cv.png" width="100px" height="100px" />
                  <br />
                  <input id="file" type="file" name="resume" class="form-control input"
                    accept="application/msword, application/pdf" id="imgInpp">
                  <br />
                  <p id="foleoutput" style="color:red;"></p>
                </div>
              </div>
            </div>

            <!-- ----------- -->
            <div class="row">
              <div class="col-lg-12 col-xs-12">
                <div style="display:none" id="gifdiv">
                  <br />
                  <img src="assets/loader.gif" id="gif"
                    style="display:block; margin: 0 auto; width:120px;height:180px; visibility: hidden;">
                </div>
              </div>
            </div>

            <!-- ----------- -->
            <div class="row">
              <div class="col-lg-12 col-xs-12">
                <div align="center">
                  <br />
                  <div class="signin-rit">
                    <span class="agree-checkbox">
                      <label class="checkbox">
                        <input type="checkbox" name="checkbox" required="required">I am Agree with <a
                          href="./user-agreement">Terms & Condition</a> ,I want to apply </label>
                    </span>
                    <br />
                  </div>
                  <div class="col-sm-12">
                    <hr />
                  </div>
                  <button type="submit" name="submit" class="btn btn-warning" style="border-radius:5px;"> Submit &
                    Create</button>
                </div>
              </div>
            </div>
            <!-- ----------- -->
          </form>
          <!-- -------------------------------- -->
          <br />
         
          <div align="center">
          <div id="google_translate_element"></div>
          <br/>
            <a href="./" class="btn btn-default">
              << Back To Website </a>
          </div>
        </div>

      </div>

    </section>



    <script src="js/classie.js"></script>
    <script src="<?php echo $baseurl; ?>/js/main.js"></script>
    <script
      type="text/javascript">$(document).ready(function () { $().UItoTop({ easingType: "easeOutQuart" }) })</script>
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script src="bower_components/select2/dist/js/select2.full.min.js"></script>
    <script> $(function () { $('.select2').select2() }) </script>

    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js"></script>

    <script>$(document).ready(function () {
        $("#myform").on("submit", function () {
          $("#pageloader").fadeIn();
        });
      });
    </script>
    <script>$(function () {
        $("#chkPassport").click(function () {
          if ($(this).is(":checked")) {
            $("#dvPassport").show();
          } else {
            $("#dvPassport").hide();
          }
        });
      });</script>
    <script> function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
        }
      }
      $("#imgInp").change(function () {
        readURL(this);
      });

      function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
        }
      }
      $("#imgInp").change(function () {
        readURL(this);
      });
    </script>
    <script type="text/javascript">
      $('#file').on('change', function () {
        const size =
          (this.files[0].size / 1024).toFixed(2);
        if (size > 1024) {
          $("#foleoutput").html('<span>' +
            '<b>ERROR</b> File Size is Large  "\n" Re-upload less then 1MB is allow.</span>');
        } else {
          $("#foleoutput").html('<span>' +
            'Resume Selected</span>');
        }
      });
    </script>
    <script type="text/javascript">
      function googleTranslateElementInit() {
        new google.translate.TranslateElement({ pageLanguage: 'en', includedLanguages: 'hi,en' }, 'google_translate_element');
      }
    </script>
    <script type="text/javascript"
      src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>

</html>
</body>

</html>