<html>
<head>
    <title>Reports</title>
    <link rel="stylesheet" href="datadb.css">
</head>
<body>    
      <table class="reg_table">
          <thead>
          <tr>
              <th>full_name</th>
              <th>mobile_no</th>
              <th>email</th>
              <th>pwd</th>
              <th>department</th>
          </tr>
          </thead>
         <tbody>
         <?php
          include ("connect.php");
          $sql="SELECT * FROM register";
          $result= $conn->query($sql);
          if($result->num_rows>0){
              while ($row = $result -> fetch_assoc()){
                  echo "<tr><td>" .$row["full_name"]."</td><td>".$row["mobile_no"]."</td><td>".$row["email"]."</td><td>".$row["pwd"]."</td><td>".$row["department"]."</td></tr>";
              }
          }
          else {
              echo "No Results";
          }
          $conn-> close();
          ?>
         </tbody>

      </table>

</body>

</html>