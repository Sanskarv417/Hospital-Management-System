 <?php 

session_start();

include("include/connection.php");

 ?>
 <?php  
 if(!empty($_FILES["patient_file"]["name"]))  
 {  
      $connect=mysqli_connect("localhost","root","","HMS"); 
      $output = '';  
      $allowed_ext = array("csv");  
      $extension = end(explode(".", $_FILES["patient_file"]["name"]));  
      if(in_array($extension, $allowed_ext))  
      {  
           $file_data = fopen($_FILES["patient_file"]["tmp_name"], 'r');  
           fgetcsv($file_data);  
           while($row = fgetcsv($file_data))  
           {  
                $firstname = mysqli_real_escape_string($connect, $row[0]);  
                $surname = mysqli_real_escape_string($connect, $row[1]);  
                $username = mysqli_real_escape_string($connect, $row[2]);  
                $email = mysqli_real_escape_string($connect, $row[3]);  
                $phone = mysqli_real_escape_string($connect, $row[4]);  
                $gender = mysqli_real_escape_string($connect, $row[5]);  
                $country = mysqli_real_escape_string($connect, $row[6]);  
                $password = mysqli_real_escape_string($connect, $row[7]);  
                $query = "  
                INSERT INTO patient  
                     (firstname, surname, username, email, phone, gender, country, password)  
                     VALUES ('$firstname', '$surname', '$username', '$email', '$phone', '$gender', '$country', '$password')  
                ";  
                mysqli_query($connect, $query);  
           }  
           $select = "SELECT * FROM patient ORDER BY id DESC";  
           $result = mysqli_query($connect, $select);  
           $output .= '  
                <table class="table table-bordered">  
                     <tr>  
                          <th>ID</th>  
                          <th>firstname</th>  
                          <th>surname</th>  
                          <th>username</th>  
                          <th>email</th>  
                          <th>phone</th>  
                          <th>gender</th>  
                          <th>country</th>  
                          <th>password</th>
                     </tr>  
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>'.$row["id"].'</td>  
                          <td>'.$row["surname"].'</td>  
                          <td>'.$row["surname"].'</td>  
                          <td>'.$row["username"].'</td>  
                          <td>'.$row["email"].'</td>  
                          <td>'.$row["phone"].'</td>  
                          <td>'.$row["gender"].'</td>  
                          <td>'.$row["country"].'</td>  
                          <td>'.$row["password"].'</td> 
                     </tr>  
                ';  
           }  
           $output .= '</table>';  
           echo $output;  
      }  
      else  
      {  
           echo 'Error1';  
      }  
 }  
 else  
 {  
      echo "Error2";  
 }  
 ?>  