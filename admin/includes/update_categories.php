                            <form action="" method="post">
                                <div class="formGroup">
                                    <label for="cat_title">Edit Category</label>

                                    <?php
                                        if(isset($_GET['edit'])){
                                            $cat_id = $_GET['edit'];
                                            $query = "SELECT * FROM categories WHERE cat_id = '$cat_id'"; //FIND ALL CATEGORIES
                                            $selectCategoriesID = mysqli_query($connection,$query);
                                         
                                            while($row = mysqli_fetch_assoc($selectCategoriesID)){
                                                 $cat_id = $row['cat_id'];
                                                 $cat_title = $row['cat_title']; 
                                    ?>
                                    <input name="cat_title" value="<?php if(isset($cat_title)) echo $cat_title; ?>" type="text" class="form-control">
                                    <?php }} ?>
                                    <?php //UPDATE QUERY
                                        if(isset($_POST['updateSubmit'])){
                                            $the_cat_title = $_POST['cat_title'];
                                            $query = "UPDATE categories SET cat_title = '$the_cat_title' WHERE cat_id = '$cat_id'";
                                            $update_query = mysqli_query($connection,$query);
                                            if(!$update_query){
                                                die("QUERY FAILED".mysqli_error($connection));
                                            }
                                            header("location: categories.php");
                                        }
                                    ?>
                                </div>
                                <br>
                                <div class="formGroup">
                                    <input class="btn btn-primary" type="submit" name="updateSubmit" value="Update Category">
                                </div>
                            </form>