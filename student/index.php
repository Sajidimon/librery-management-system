    <?php

    require_once "header.php";

    ?>
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">
        <div class="col-sm-12">
            <h4 class="section-subtitle"><b>Issue book list in Savar Model College</b></h4>
           
            <div class="panel">
                <div class="panel-content">
                    <div class="table-responsive">
                        <table id="basic-table" class="data-table table-bordered table table-striped nowrap table-hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Book Name</th>
                                    <th>Book image</th>
                                    <th>Book issue date</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
            $student_id = $_SESSION['students_id'];

           $result = mysqli_query($conn, "SELECT `issue-books`.`book_issue_date`, `books`.`book_name`, `books`.`book_image`
                FROM `books`
                INNER JOIN `issue-books` ON `issue-books`.`book_id`=`books`.`id`
                WHERE `issue-books`.`student_id`=$student_id");
                    while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?= $row['book_name'] ?></td>
                                    <td><img style="width: 100px; height:100px;" src="../images/<?= $row['book_image'] ?>" alt=""></td>
                                    <td><?= date('d-M-Y', strtotime($row['book_issue_date'])) ?></td>
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
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <?php require_once "footer.php"; ?>