<?php require_once "header.php"; ?>
<?php require_once "../database.php"; ?>


<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-users" aria-hidden="true"></i><a href="javascript:avoid(0)">students</a></li>
        </ul>
    </div>
</div>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<div class="row animated fadeInUp">
    <div class="col-sm-12">
        <h4 class="section-subtitle"><b>Students data in Savar Model College</b></h4>
        <div class="clearfix"></div>
        <div class="panel">
            <div class="panel-content">
                <div class="table-responsive">
                    <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last name</th>
                                <th>Roll</th>
                                <th>Register No</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Phone number</th>
                                <th>Photo</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result = mysqli_query($conn, "SELECT * FROM `students` ");


                            while ($row =  mysqli_fetch_assoc($result)) {
                            ?>

                                <tr>
                                    <td><?php echo $row['fname']; ?></td>
                                    <td><?php echo $row['lname']; ?></td>
                                    <td><?php echo $row['roll']; ?></td>
                                    <td><?php echo $row['register']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['phone']; ?></td>
                                    <td><img src="<?php echo $row['photo']; ?>" alt=""></td>
                                    <td><?php if ($row['status'] == 1) {
                                            echo "Active";
                                        } else {
                                            echo "Inactive";
                                        } ?></td>
                                    <td>
                                        <?php
                                        if ($row['status'] == 1) {
                                        ?>
                                            <a class="btn btn-primary" href="students-inactive.php?id=<?php echo base64_encode($row['id']); ?>"><i class="fa fa-arrow-circle-up"></i></a>
                                        <?php
                                        } else {
                                        ?>
                                            <a class="btn btn-danger" href="students-active.php?id=<?php echo base64_encode($row['id']); ?>"><i class="fa fa-arrow-circle-down"></i></a>
                                        <?php
                                        }
                                        ?>

                                    </td>
                                </tr>

                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php require_once "footer.php"; ?>