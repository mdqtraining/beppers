<?php include 'header.php'; ?>
<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-0">
                <?php include 'sides.php'; ?>
            </div>
            <div class="col py-3 table-responsive">
           
              
              
            
               
                <!-- COMMENTS -->
              
            </div>
        </div>
    </div>


    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();


        function user(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("usertab");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("usertablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpenuser").click();

        function refresh() {
            $('#orders').load(location.href + " #orders");
            $('#products').load(location.href + " #products");
        }

        $(document).ready(function() {
            $("#calc").on('click', function() {
                var bm = Number($('#bm').val());
                var ass_bon = Number($('#ass_bon').val());
                var cont = Number($('#cont').val());

                var total = bm + ass_bon + cont;

                $('#total').text(total);
            });
        });
    </script>
    <!-- SEARCH SCRIPT -->

    <!-- BUSINESS SEARCH -->
    <script>
        $(document).on('keyup', "#search_param", function() {
            var search_param = $("#search_param").val();
            $.ajax({
                url: 'business_search.php',
                type: 'POST',
                data: {
                    search_param: search_param
                },
                success: function(data) {
                    $("#business_search").html(data);
                }
            });
        });
    </script>
    <!-- USERS SEARCH -->
    <script>
        $(document).on('keyup', "#user_param", function() {
            var user_param = $("#user_param").val();
            $.ajax({
                url: 'user_search.php',
                type: 'POST',
                data: {
                    user_param: user_param
                },
                success: function(data) {
                    $("#user_search").html(data);
                }
            });
        });
    </script>
    <!-- FREELANCER SEARCH -->
    <script>
        $(document).on('keyup', "#free_param", function() {
            var free_param = $("#free_param").val();
            $.ajax({
                url: 'freelancer_search.php',
                type: 'POST',
                data: {
                    free_param: free_param
                },
                success: function(data) {
                    $("#freelancer_search").html(data);
                }
            });
        });
    </script>
    <!-- DELETE POST TOAST -->
    <script>
        $(".remove").click(function() {

            var id = $(this).parents("tr").attr("id");


            if (confirm('Are you sure to remove this record ?'))

            {

                $.ajax({

                    url: 'delete.php',

                    type: 'GET',

                    data: {
                        id: id
                    },

                    error: function() {

                        alert('Something is wrong');

                    },

                    success: function(data) {

                        $("#" + id).remove();

                        alert("Record removed successfully");

                    }

                });

            }

        });
    </script>
    <script>
        $(".userremove").click(function() {

            var id = $(this).parents("tr").attr("id");


            if (confirm('Are you sure to remove this record ?'))

            {

                $.ajax({

                    url: 'delete.php',

                    type: 'GET',

                    data: {
                        id: id
                    },

                    error: function() {

                        alert('Something is wrong');

                    },

                    success: function(data) {

                        $("#" + id).remove();

                        alert("Record removed successfully");

                    }

                });

            }

        });
    </script>
    <script>
        $(".freelanceremove").click(function() {

            var id = $(this).parents("tr").attr("id");


            if (confirm('Are you sure to remove this record ?'))

            {

                $.ajax({

                    url: 'delete.php',

                    type: 'GET',

                    data: {
                        id: id
                    },

                    error: function() {

                        alert('Something is wrong');

                    },

                    success: function(data) {

                        $("#" + id).remove();

                        alert("Record removed successfully");

                    }

                });

            }

        });
    </script>

    <script>
        $(".posters").click(function() {

            var id = $(this).parents("tr").attr("id");


            if (confirm('Are you sure to remove this record ?'))

            {

                $.ajax({

                    url: 'delete.php',

                    type: 'GET',

                    data: {
                        id: id
                    },

                    error: function() {

                        alert('Something is wrong');

                    },

                    success: function(data) {

                        $("#" + id).remove();

                        alert("Record removed successfully");

                    }

                });

            }

        });
    </script>

    <script>
        $(".cmntremove").click(function() {

            var id = $(this).parents("tr").attr("id");


            if (confirm('Are you sure to remove this record ?'))

            {

                $.ajax({

                    url: 'delete.php',

                    type: 'GET',

                    data: {
                        id: id
                    },

                    error: function() {

                        alert('Something is wrong');

                    },

                    success: function(data) {

                        $("#" + id).remove();

                        alert("Record removed successfully");

                    }

                });

            }

        });
    </script>

</body>

</html>