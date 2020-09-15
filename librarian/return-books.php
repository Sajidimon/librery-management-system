<?php require_once "header.php"; ?>
<?php require_once "../database.php"; ?>


<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-book" aria-hidden="true"></i><a href="javascript:avoid(0)">Return book</a></li>
        </ul>
    </div>
</div>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<div class="row animated fadeInUp">
    <div class="col-sm-12">
        <h4 class="section-subtitle"><b>Return book list</b></h4>
        <div class="panel">
            <div class="panel-content">
                <div class="table-responsive">
                    <table id="basic-table" class="data-table table table-bordered table-striped nowrap table-hover" cellspacing="0"
                        width="100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Roll</th>
                                <th>Phone number</th>
                                <th>Book name</th>
                                <th>Book image</th>
                                <th>Book issue date</th>
                                <th>Book return</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result = mysqli_query($conn, "SELECT `issue-books`.`id`,`issue-books`.`book_issue_date`, `students`.`fname`, `students`.`lname`, `students`.`roll`, `students`.`phone`, `books`.`book_name`, `books`.`book_image`
                            FROM `issue-books`
                            INNER JOIN `students` ON `students`.`id`=`issue-books`.`student_id`
                            INNER JOIN `books` ON `books`.`id`=`issue-books`.`book_id`
                            WHERE `issue-books`.`book_return_date`= '' ");


                            while ($row =  mysqli_fetch_assoc($result)) {
                            ?>

                            <tr>
                                <td><?= ucwords($row['fname'] . ' ' . $row['lname']); ?></td>
                                <td><?php echo $row['roll']; ?></td>
                                <td><?php echo $row['phone']; ?></td>
                                <td><?php echo $row['book_name']; ?></td>
                                <td><img style="width: 100px; height:100px;" src="../images/<?php echo $row['book_image']; ?>" alt=""></td>
                                <td><?= date('d-M-Y', strtotime($row['book_issue_date'])) ?></td>
                                <td><a href="return-books.php?id=<?php echo $row['id']; ?>">Return book</a></td>
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
<?php 

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $date = date('d-M-Y');
      $return_book = mysqli_query($conn, "UPDATE `issue-books` SET `book_return_date`= '$date'  WHERE `id` = '$id' ");

      if ($return_book) {
         ?>
            <script>
                alert('Book return successfully');
                javascript:history.go(-1);
            </script>
         <?php
      }else{
          ?>
               <script>
                alert('Book not return');
            </script> 
          <?php
      }
    }

?>
<?php require_once "footer.php"; ?>