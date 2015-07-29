<?php
        $dbc = mysqli_connect('oniddb.cws.oregonstate.edu', 'hammarlp-db', 'MY PASSWORD IS NOT HERE', 'hammarlp-db') or
                      die('Error connecting to MySQL server.');

        $id = 777;

        $query = "SELECT * FROM donations WHERE '$id'=id";
        //$query = "INSERT INTO android_im_account (username, password) VALUES('$username', '$password')";


        if(!mysqli_query($dbc, $query)){
              die('Failed');
        }
        $result=mysqli_query($dbc, $query);

        while($row = mysqli_fetch_array($result)) {
          echo $row['id'] . '<br/>';
          echo $row['user_id'] . '<br/>';
          echo $row['date_given'] . '<br/>';
          echo $row['location'] . '<br/>';
          echo $row['blood_type'] . '<br/>';
          echo $row['donation_type'] . '<br/>';
          echo $row['amount'] . '<br/>';


        }

        $query2 = "SELECT * FROM p2_users WHERE '$id'=id";
        if(!mysqli_query($dbc, $query2)){
                die('Failed');
        }
        $result2 = mysqli_query($dbc, $query2);

        while($row2 = mysqli_fetch_array($result2)) {
               echo $row2['fname'] . '<br/>';
               echo $row2['lname'] . '<br/>';
               echo '(' . $row2['username'] . ')' . '<br/>';
        }

       mysqli_close($dbc);

//echo "Hi!"

?>
