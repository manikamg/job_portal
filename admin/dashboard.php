<?php include_once 'head.php'; ?>
<?php include_once 'menu.php'; ?>
<div class="content-wrapper">
    <div class="content" style="background-color:#fff;">
        <section class="content-header">
            <h1><small><button type="button" onclick="window.open('./','_self');"
                        class="btn btn-dark">Home</button></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href=".\"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Manage</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12"><br /><br /><br /><br />
                    <div class="table-responsive">
                        <table class="table table-responsive">
                            <tr>
                                <th><a href="new-job-applications-manage?id=<?php echo trim($_GET['id']); ?>"
                                        class="btn btn-info" style="width:300px;"><i class="fa fa-circle-o"></i> New
                                        Application</a></th>
                                <th><a href="candidate-manage?id=<?php echo trim($_GET['id']); ?>"
                                        class="btn btn-primary" style="width:300px;"><i class="fa fa-circle-o"></i>
                                        Candidate Manage</a> </th>
                            </tr>
                            <tr>
                                <th><a href="client-manage?id=<?php echo trim($_GET['id']); ?>" class="btn btn-success"
                                        style="width:300px;"><i class="fa fa-circle-o"></i> Client Manage</a></th>
                                <th><a href="manage-job?id=<?php echo trim($_GET['id']); ?>" class="btn btn-warning"
                                        style="width:300px;"><i class="fa fa-circle-o"></i> Job Post Manage</a></th>
                            </tr>
                        </table>
                        <hr />
                        <a href="add-consultancy?id=<?php echo trim($_GET['id']); ?>" class="btn btn-danger"
                            style="width:300px;"><i class="fa fa-circle-o"></i> New Consultancy Add</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<?php include_once 'footer.php'; ?>