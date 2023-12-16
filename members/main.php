<style>
    .border_color {
        border-color: #5D46BD;
    }


    .job-list-card {
        width: 100%;
        padding: 20px 15px;
        border-radius: 7px;
        box-shadow: 0 0 7px 1px rgba(0, 0, 0, 0.5);
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

    .job_types span,
    .job_dates span {
        font-weight: bold;
        color: gray;
    }

    table {
        width: 100%;
    }

    .apply_container {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .border_ {
        border: none;
        border-radius: 5px;
        /* height: 40px; */
        line-height: 28px;
        font-size: 16px;
        /* font-weight: 600; */
    }

    .btn_1:hover {
        background-color: #5D46BD;
    }

    .apply_container {
        height: 100px;
    }

    @media (max-width: 768px) {
        table {
            width: 90%;
        }

        .job-list-card {
            width: 100%;
        }

        .img_container_col {
            /* display: flex;
            justify-content: center; */
        }

        .img_container {
            position: absolute;
            left: 50%;
            transform: translate(-50%);
        }

        .detail_container {
            margin-top: 105px;
            padding: 10px;
            font-size: 16px;
        }


    }
</style>


<div class="col-md-9">
    <div class="box border_color">
        <div align="center">Current Openings</div>
        <div class="box-body border_color">
            <table id="job_list_data" class="table table-bordered table-striped">
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
                                                <div class="col-lg-2 col-md-12 img_container_col">
                                                    <div class="img_container">
                                                        <img src="../assets/images/job-search.png" alt="job search icon">
                                                    </div>
                                                </div>
                                                <div class="col-lg-10 col-md-12">
                                                    <div class="detail_container">
                                                        <div class="row">
                                                            <div class="col-lg-12 job_types">
                                                                <!-- <table class="table">
                                                                    <tr> -->
                                                                <div><span>Type: </span>
                                                                    <?php echo ucwords($row['joiningprocess']); ?>
                                                                </div>
                                                                <div><span>Location: </span>
                                                                    <?php echo ucwords($row['location']); ?>
                                                                </div>
                                                                <div><span>Post: </span>
                                                                    <?php echo ucwords($row['postname']); ?>
                                                                </div>
                                                                <!-- </tr>
                                                                </table> -->
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12 job_dates">
                                                                <!-- <table class="table">
                                                                    <tr> -->
                                                                <div><span>Post Date: </span>
                                                                    <?php echo date('d-m-Y', strtotime($row['sdate'])) . ' (<small>' . date('M', strtotime($row['sdate'])) . '</small>)'; ?>
                                                                </div>
                                                                <div><span>Last Date: </span>
                                                                    <?php echo date('d-m-Y', strtotime($row['edate'])) . ' (<small>' . date('M', strtotime($row['edate'])) . '</small>)'; ?>
                                                                </div>
                                                                <!-- </tr>
                                                                </table> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-12">
                                            <div class="apply_container" style="width: 100%;">
                                                <?php if ($run['regi_status'] == 1) { ?>
                                                    <button type="button"
                                                        onclick="window.open('apply-for-job?id=<?php echo base64_encode($row['id']); ?>','_self')"
                                                        class="btn btn-primary btn-block border_ btn_1 btn-sm">
                                                        Apply <i class="fa fa-chevron-right"></i></button>
                                                <?php } else { ?>
                                                    <button type="button" class="btn btn-primary btn-block border_ btn_1 btn-sm"
                                                        disabled="disabled">Apply <i class="fa fa-chevron-right"></i></button>
                                                <?php } ?>
                                            </div>
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
<script>
    $(document).ready(function () {
        $('#job_list_data').DataTable();
    }); 
</script>