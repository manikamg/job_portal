<?php include_once 'head.php';
if(isset($_POST['submit'])){
$blog  = mysqli_real_escape_string($db,$_POST['blog']);
$tag = mysqli_real_escape_string($db,$_POST['tag']);
$meattag = mysqli_real_escape_string($db,$_POST['meta']);
$btitle = mysqli_real_escape_string($db,$_POST['title']);
$sql=query("INSERT INTO `blog`(`title`,`meta`,`tag`, `blog`) VALUES ('$btitle','$meattag','$tag','$blog')");
if($sql>0){echo "<script>window.open('blog?success','_self')</script>";
}else{echo "<script>alert('Server busy')</script>";
}
}
//remove
if(isset($_POST['remove'])){
$sql=mysqli_query($db,"DELETE FROM `blog` WHERE `id`='".trim($_POST['did'])."'");
if($sql>0){
echo "<script>window.open('blog?remove','_self')</script>";
}else{
echo "<script>alert('Server Busy')</script>";
}
}
?><script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script><div class="container"><section class="content-header"><h1><small style="font-style: uppercase"><a href=".\"><< Back</a>< Blog</small></h1>
<ol class="breadcrumb">
<li><a href=".\"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<li><a href="#">Blog</a></li>
</ol>
</section>
<section class="content">
<div class="row">
<div class="col-md-6">
<?php
if(isset($_GET['success'])){ ?>
<div class="box box-success box-solid">
<div class="box-header with-border">
<h3 class="box-title">Add Success</h3>
<div class="box-tools pull-right">
<button type="button" class="btn btn-box-tool" onclick="window.open('blog','_self')" data-widget="remove"><i class="fa fa-times"></i></button>
</div>
</div></div>
<?php } ?>
<?php if(isset($_GET['remove'])){ ?>
<div class="box box-denger box-solid">
<div class="box-header with-border">
<h3 class="box-title">Removed Success</h3>

<div class="box-tools pull-right">
<button type="button" class="btn btn-box-tool" onclick="window.open('blog','_self')" data-widget="remove"><i class="fa fa-times"></i></button>
</div>
</div></div>
<?php } ?>
<div class="box box-primary">
<div class="box-header with-border">
<h3 class="box-title">Blog</h3>
</div>
<?php 
if(isset($_GET['id'])){ 
$sqlio=mysqli_query($db,"SELECT `id`, `tag`, `blog`, `timedate` FROM `blog` WHERE  `id`='".trim($_GET['id'])."'");
$rowx=mysqli_fetch_array($sqlio);  ?>
<form method="post" action="#">
<input type="hidden" name="formid" value="<?php echo $_GET['id']; ?>">
<div class="box-body">
<div class="form-group">
<label for="exampleInputEmail1">Tag</label>
<textarea class="form-control" name="tag" placeholder="enter tag here.."></textarea>
</div>
</div>
<div class="box-body">
<div class="form-group">
<label for="exampleInputEmail1">Name</label>
<input type="type" name="name" class="form-control" value="<?php echo $rowx['name']; ?>" id="formname" placeholder="Form Heading" required="required">
</div>
</div>
<div align="center"><div class="box-footer">
<button type="submit" name="update" class="btn btn-primary">Update</button>
<button type="button" onclick="window.open('blog','_self');" class="btn btn-secondary">Cancel</button>
</div></div>
</form>
<?php }else{?>
<form method="post" action="#">
<input type="hidden" name="admid" value="<?php echo $run['id']; ?>"> 
<div class="box-body">
<div class="form-group">
<label for="exampleInputEmail1">Title</label>
<input name="title" class="form-control" placeholder="Enter Here..">
</div></div>
<div class="box-body">
<div class="form-group">
<label for="exampleInputEmail1">meta</label>
<textarea name="meta" class="form-control" placeholder="Enter Here.."></textarea>
</div></div>
<div class="box-body">
<div class="form-group">
<label for="exampleInputEmail1">Tag</label>
<textarea name="tag" class="form-control" placeholder="Enter Here.."></textarea>
</div></div>
<div class="box-body">
<div class="form-group">
<label for="exampleInputEmail1">Blog </label>
<textarea id="blog" name="blog" class="form-control" placeholder="Enter Here.."></textarea>
</div>
</div>
<div align="center"><div class="box-footer">
<button type="submit" name="submit" class="btn btn-primary">Submit</button>
</div></div>
</form>
<?php }?></div></div><div class="col-md-6"><div class="box box-danger"><div class="box-header with-border"><h3 class="box-title">Job Type List</h3></div><input class="form-control" id="myInput" type="text" placeholder="Search.."><table class="table table-fixedheader table-bordered table-striped"><thead><tr><th>Sno.</th><th>Tag</th><th>Title</th><th>Remove</th></tr></thead><tbody id="myTable" style="height:500px"><?php 
$i=1;
$sql=mysqli_query($db,"SELECT `id`,`title`, `tag`, `blog`, `timedate` FROM `blog`");
while($row=mysqli_fetch_array($sql)){?><tr><td><?php echo $i; ?>.</td><td><b><?php echo ucwords(($row['tag']));?></b></td><td><b><?php echo ucwords($row['title']);?></b></td><td><form method="post" class="delete_form" action="#"><input type="hidden" name="did" value="<?php echo $row['id']; ?>" /><button type="submit" name="remove" class="btn btn-danger"><i class="fa fa-trash"></i></button></form></td></tr><?php $i++;} ?></tbody></table></div></div></section></div>
<script>
$(document).ready(function(){
$('.delete_form').on('submit', function(){
if(confirm("Are you sure you want to delete it?"))
{
return true;
}else{
return false;
}
});
});</script><script>$(function () {  CKEDITOR.replace('blog')
    $('.textarea').wysihtml5()
  })</script><script src="../../bower_components/ckeditor/ckeditor.js"></script><?php include_once 'footer.php';?>