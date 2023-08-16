<h4 class="py-3" style="color: #fc6703;">Post VS Categories</h4>
                            
                            <?php
                            $sql = mysqli_query($conn, "SELECT substring_index(p.name,',',1) AS array, count(substring_index(p.name,',',1)) as cat_count from post p inner join users u on p.user_id = u.id group by array");
                            while ($data = mysqli_fetch_array($sql)) {
                            ?>
                                <div class="col-md-6 col-lg-4 col-xl-4 col-xxl-4 py-4 justify-content-center cars px-5">
                                 
                                    <a href="dashtable.php?cat=<?php echo $data['array']; ?>" class="text-decoration-none text-white">
                                        <div class="css fs-3 d-flex align-items-center justify-content-center text-wrap">
                                            
                                            <div class="px-5">
                                                <h5 name="cat" style="color: rgb(241, 38, 81);"><?php echo $data['array']; ?></h5>
                                            </div>

                                        </div>
                                        <div class="circ">
                                            <div class="fs-3 d-flex justify-content-center">
                                                <h5 class="text-wrap counts" style="color: rgb(241, 38, 81);"><?php echo $data['cat_count']; ?></h5>
                                            </div>
                                        </div>
                                    </a>
                             
                                </div>
                            <?php } ?>