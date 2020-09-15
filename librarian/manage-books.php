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
        <h4 class="section-subtitle"><b>Book lists in Savar Model College librery</b></h4>
        <div class="panel">
            <div class="panel-content">
                <div class="table-responsive">
                    <table id="basic-table" class="data-table table-bordered table table-striped nowrap table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Book name</th>
                                <th>Book image</th>
                                <th>Author name</th>
                                <th>Publisher name</th>
                                <th>Purchase date</th>
                                <th>Book price</th>
                                <th>Book quentity</th>
                                <th>Available quentity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result = mysqli_query($conn, "SELECT * FROM `books` ");


                            while ($row =  mysqli_fetch_assoc($result)) {
                            ?>

                                <tr>
                                    <td><?php echo $row['book_name']; ?></td>
                                    <td><img style="width: 100px; height:100px" src="../images/<?php echo $row['book_image']; ?>" alt=""></td>
                                    <td><?php echo $row['book_author_name']; ?></td>
                                    <td><?php echo $row['book_publication_name']; ?></td>
                                    <td><?= date('d-M-Y', strtotime($row['book_purchase_date'])); ?></td>
                                    <td><?php echo $row['book_price']; ?></td>
                                    <td><?php echo $row['book_qnty']; ?></td>
                                    <td><?php echo $row['available_qnty']; ?></td>
                                    <td>
                                        <a class="btn btn-info" href="javascript:avoid(0)" data-toggle="modal" data-target="#books-<?= $row['id']; ?>"><i class="fa fa-eye"></i></a>
                                        <a class="btn btn-warning" href="javascript:avoid(0)" data-toggle="modal" data-target="#books-update-<?= $row['id']; ?>"><i class="fa fa-pencil"></i></a>
                                        <a class="btn btn-danger" onclick="return confirm('Are you sure to delete this books ?')" href="delete.php?book_delete=<?= base64_encode($row['id']); ?>"><i class="fa fa-trash-o"></i></a>
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

<?php
$result = mysqli_query($conn, "SELECT * FROM `books` ");


while ($row =  mysqli_fetch_assoc($result)) {
?>


    <!-- Book info model -->


    <div class="modal fade" id="books-<?= $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header state modal-info">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Book info</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Book name</th>
                            <td><?php echo $row['book_name']; ?></td>
                        </tr>
                        <tr>
                            <th>Book image</th>
                            <td><img style="width: 90px; height:90px" src="../images/<?php echo $row['book_image']; ?>" alt=""></td>
                        </tr>
                        <tr>
                            <th>Author name</th>
                            <td><?php echo $row['book_author_name']; ?></td>
                        </tr>
                        <tr>
                            <th>Publisher name</th>
                            <td><?php echo $row['book_publication_name']; ?></td>
                        </tr>
                        <tr>
                            <th>Purchase date</th>
                            <td><?= date('d-M-Y', strtotime($row['book_purchase_date'])); ?></td>
                        </tr>
                        <tr>
                            <th>Book price</th>
                            <td><?php echo $row['book_price']; ?></td>
                        </tr>
                        <tr>
                            <th>Book quentity</th>
                            <td><?php echo $row['book_qnty']; ?></td>
                        </tr>
                        <tr>
                            <th>Available quentity</th>
                            <td><?php echo $row['available_qnty']; ?></td>
                        </tr>

                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>


<?php
$result = mysqli_query($conn, "SELECT * FROM `books` ");


while ($row =  mysqli_fetch_assoc($result)) {

    $id = $row['id'];
    $book_update = mysqli_query($conn, "SELECT * FROM `books` WHERE `id` = '$id' ");

    $book_update_row = mysqli_fetch_assoc($book_update);



?>


    <!-- Update book info -->


    <div class="modal fade" id="books-update-<?= $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header state modal-info">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Update Book info</h4>
                </div>
                <div class="modal-body">
                    <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="book">Book name</label>
                                            <input type="text" name="book_name" value="<?= $book_update_row['book_name'] ?>" class="form-control" id="book" placeholder="Book name" required>
                                            <input type="hidden" name="id" value="<?= $book_update_row['id'] ?>" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="book_author_name">Author name</label>
                                            <input type="text" name="book_author_name" value="<?= $book_update_row['book_author_name'] ?>" class="form-control" id="book_author_name" placeholder="Book author name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="book_publication_name">Publisher name</label>
                                            <input type="text" name="book_publication_name" value="<?= $book_update_row['book_publication_name'] ?>" class="form-control" id="book_publication_name" placeholder="Book publisher name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="book_purchase_date">Purchase date</label>
                                            <input type="date" name="book_purchase_date" value="<?= $book_update_row['book_purchase_date'] ?>" class="form-control" id="book_purchase_date" placeholder="Book purchase name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="book_price">Book price</label>
                                            <input type="number" name="book_price" value="<?= $book_update_row['book_price'] ?>" class="form-control" id="book_price" placeholder="Book price" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="book_qnty">Book quentity</label>
                                            <input type="number" name="book_qnty" value="<?= $book_update_row['book_qnty'] ?>" class="form-control" id="book_qnty" placeholder="Book quentity" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="available_qnty">Book available</label>
                                            <input type="number" name="available_qnty" value="<?= $book_update_row['available_qnty'] ?>" class="form-control" id="available_qnty" placeholder="available quentity" required>
                                        </div>
                                        <div class="form-group">
                                           <input type="submit" value="Update" name="update-books" class="btn btn-primary">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}


if (isset($_POST['update-books'])) {
    $id                             = $_POST['id'];
    $book_name                      = $_POST['book_name'];
    $book_author_name               = $_POST['book_author_name'];
    $book_publication_name          = $_POST['book_publication_name'];
    $book_purchase_date             = $_POST['book_purchase_date'];
    $book_price                     = $_POST['book_price'];
    $book_qnty                      = $_POST['book_qnty'];
    $available_qnty                 = $_POST['available_qnty'];
    $librerian_username             = $_SESSION['librerian_username'];


    $result = mysqli_query($conn, "UPDATE `books` SET `book_name`= '$book_name',`book_author_name`='$book_author_name',`book_publication_name`='$book_publication_name',`book_purchase_date`='$book_purchase_date' ,`book_price`='$book_price' ,`book_qnty`='$book_qnty' ,`available_qnty`='$available_qnty' ,`librerian_username`= '$librerian_username' WHERE id = '$id' ");

    if ($result) {
        ?>
            <script>
                alert('Book updated successfully');
                javascript:history.go(-1);
            </script>
        <?php
    }else{
        ?>
            <script>
                alert('Error ! Book not updated!');
            </script>
        <?php
    }

}

?>


<?php require_once "footer.php"; ?>