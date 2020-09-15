<?php 

require_once "header.php";
require_once "../database.php";


    if (isset($_POST['save'])) {
        $book_name                      = $_POST['book_name'];
        $book_author_name               = $_POST['book_author_name'];
        $book_publication_name          = $_POST['book_publication_name'];
        $book_purchase_date             = $_POST['book_purchase_date'];
        $book_price                     = $_POST['book_price'];
        $book_qnty                      = $_POST['book_qnty'];
        $available_qnty                 = $_POST['available_qnty'];
        $librerian_username             = $_SESSION['librerian_username'];

        $book_image = explode('.', $_FILES['book_image']['name']);

        $book_image = end($book_image);

        $image = date('Ymdhis.').$book_image;

       $result = mysqli_query($conn, "INSERT INTO `books`(`book_name`, `book_image`, `book_author_name`, `book_publication_name`, `book_purchase_date`, `book_price`, `book_qnty`, `available_qnty`, `librerian_username`) VALUES ('$book_name','$image','$book_author_name','$book_publication_name','$book_purchase_date','$book_price','$book_qnty','$available_qnty','$librerian_username')");

       if ($result) {
           move_uploaded_file($_FILES['book_image']['tmp_name'], '../images/'.$image);
        echo "<p class='alert alert-success'>
        Books added successfully
       <button type='button' class='close' data-dismiss='alert' aria-label='close'>
       <span aria-hidden='true'>&times;</span>
        </button>
    </p>";
    } else {
        echo "<p class='alert alert-danger'>
     Sorry! Something wrong. Books not added !
       <button type='button' class='close' data-dismiss='alert' aria-label='close'>
        <span aria-hidden='true'>&times;</span>
        </button>
     </p>";
    }

        
    }


?>
<!-- content HEADER -->
<!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-book" aria-hidden="true"></i><a href="javascript:avoid(0)">Add books</a></li>
        </ul>
    </div>
</div>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<div class="row animated fadeInUp">
    <div class="col-sm-12 col-md-6 col-sm-offset-3">
        <h4 class="section-subtitle"><b>Add books</b></h4>
        <div class="panel">
            <div class="panel-content">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                            <h5 class="mb-lg">Add your favourite book here</h5>
                            <div class="form-group">
                                <label for="book" class="col-sm-3 control-label">Book name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="book_name" class="form-control" id="book" placeholder="Book name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="book_image" class="col-sm-3 control-label">Book image</label>
                                <div class="col-sm-9">
                                    <input type="file" name="book_image" class="form-control" id="book_image" placeholder="Book image" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="book_author_name" class="col-sm-3 control-label">Author name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="book_author_name" class="form-control" id="book_author_name" placeholder="Book author name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="book_publication_name" class="col-sm-3 control-label">Publisher name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="book_publication_name" class="form-control" id="book_publication_name" placeholder="Book publisher name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="book_purchase_date" class="col-sm-3 control-label">Purchase date</label>
                                <div class="col-sm-9">
                                    <input type="date" name="book_purchase_date" class="form-control" id="book_purchase_date" placeholder="Book purchase name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="book_price" class="col-sm-3 control-label">Book price</label>
                                <div class="col-sm-9">
                                    <input type="number" name="book_price" class="form-control" id="book_price" placeholder="Book price" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="book_qnty" class="col-sm-3 control-label">Book quentity</label>
                                <div class="col-sm-9">
                                    <input type="number" name="book_qnty" class="form-control" id="book_qnty" placeholder="Book quentity" required>
                                </div>
                            </div>
                            <div class="form-group">
                            <label for="available_qnty" class="col-sm-3 control-label">Book available</label>
                                <div class="col-sm-9">
                                    <input type="number" name="available_qnty" class="form-control" id="available_qnty" placeholder="available quentity" required>
                                </div>
                            </div>
                                <div class="col-sm-9 col-sm-offset-2">
                                    <input type="submit" value="Save" name="save" class="form-control btn btn-primary">
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<?php require_once "footer.php"; ?>