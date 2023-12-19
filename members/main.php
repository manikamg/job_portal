<style>
    .job-list-card {
        width: 100%;
        padding: 20px 10px;
        border-radius: 7px;
        box-shadow: 0 0 7px 1px rgba(0, 0, 0, 0.5);
    }

    .job-list-card .job-list-card-row .job-list-card-row-coll .row {
        display: flex;
        align-items: center;
        /* justify-content: start; */
    }

    .img_container {
        position: relative;
        left: 5%;
        width: 100px;
        height: 100px;
        border-radius: 7px;
        box-shadow: 0 0 7px 1px rgba(0, 0, 0, 0.5);
    }

    .img_container img {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        height: 70%;
    }

    .detail_container {}

    .detail_container .detail_container_row {
        display: flex;
        align-items: center;
        justify-content: flex-start;
        height: 100%;
    }
</style>

<div class="col-md-9">
    <div class="box">
        <div align="center">Current Openings</div>
        <div class="box-body table-responsive">
            <table id="example" class="table table-bordered table-striped">
                <thead>
                    <!-- <tr>
                        <th>Apply</th>
                        <th>Type</th>
                        <th>Location</th>
                        <th>Post</th>
                        <th>Last Date</th>
                        <th>Post Date</th>
                    </tr> -->

                    <tr>
                        <th>Job Posted</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $postlist = mysqli_query($db, "SELECT DISTINCT * FROM `post_job` WHERE `status`='active' AND `stf_approve`='approved' AND date(`timedate`)>=date('Y-m-d') ORDER BY `id` DESC");
                    while ($row = mysqli_fetch_array($postlist)) { ?>
                        <tr>
                            <td>
                                <div class="job-list-card">
                                    <div class="row job-list-card-row">
                                        <div class="col-lg-10 job-list-card-row-coll">
                                            <div class="row">
                                                <div class="col-lg-2">
                                                    <div class="img_container">
                                                        <img src="../assets/images/job-search.png" alt="job search icon">
                                                    </div>
                                                </div>
                                                <div class="col-lg-10">
                                                    <div class="detail_container">
                                                        <div class="row detail_container_row">
                                                            <div class="col-lg-12 job_type">
                                                                <table class="table">
                                                                    <tr>
                                                                        <td><span>Type: </span>
                                                                            <?php echo ucwords($row['joiningprocess']); ?>
                                                                        </td>
                                                                        <td><span>Location: </span>
                                                                            <?php echo ucwords($row['location']); ?>
                                                                        </td>
                                                                        <td><span>Post: </span>
                                                                            <?php echo ucwords($row['postname']); ?>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12 job_type">
                                                                <table class="table">
                                                                    <tr>
                                                                        <td><span>Post Date: </span>
                                                                            <?php echo date('d/m -Y', strtotime($row['edate'])) . ' (<small>' . date('M', strtotime($row['edate'])) . '</small>)'; ?>
                                                                        </td>
                                                                        <td><span>Last Date: </span>
                                                                            <?php echo date('d/m/Y', strtotime($row['sdate'])) . ' (<small>' . date('M', strtotime($row['sdate'])) . '</small>)'; ?>
                                                                        </td>
                                                                        <td>.</td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="apply_container"></div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>


                    <!-- <?php
                    $postlist = mysqli_query($db, "SELECT DISTINCT * FROM `post_job` WHERE `status`='active' AND `stf_approve`='approved' AND date(`timedate`)>=date('Y-m-d') ORDER BY `id` DESC");
                    while ($row = mysqli_fetch_array($postlist)) { ?>
                        <tr>
                            <td>
                                <?php if ($run['regi_status'] == 1) { ?>
                                    <button type="button"
                                        onclick="window.open('apply-for-job?id=<?php echo base64_encode($row['id']); ?>','_self')"
                                        class="btn btn-primary btn-sm"><i class="fa fa-chevron-left"></i> Apply</button>
                                <?php } else { ?>
                                    <button type="button" class="btn btn-primary btn-sm" disabled="disabled"><i
                                            class="fa fa-chevron-left"></i> Apply</button>
                                <?php } ?>
                            </td>
                            <td><a href="#">
                                    <?php echo ucwords($row['joiningprocess']); ?>
                                </a></td>
                            <td><a href="#">
                                    <?php echo ucwords($row['location']); ?>
                                </a></td>
                            <td class="mailbox-subject"><b>
                                    <?php echo ucwords($row['postname']); ?>
                            </td>
                            <td class="mailbox-attachment" style="color: red;"><b>
                                    <?php echo date('d/m -Y', strtotime($row['edate'])) . ' (<small>' . date('M', strtotime($row['edate'])) . '</small>)'; ?>
                                </b></td>
                            <td class="mailbox-date">
                                <?php echo date('d/m/Y', strtotime($row['sdate'])) . ' (<small>' . date('M', strtotime($row['sdate'])) . '</small>)'; ?>
                            </td>
                        </tr>
                    <?php } ?> -->






                </tbody>
            </table>
        </div>
    </div>
</div>