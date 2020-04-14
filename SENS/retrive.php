<html>
    <body>
<table border=1>
    <tr><td>NAME</td><td>EMAIL</td></tr>
<?php
    $conn = mysqli_connect("localhost","root","","wad");
    $query = "select *from sample";
    $result = mysqli_query($conn,$query);
        while($row = mysqli_fetch_array($result)){
            echo "<tr>"."<td>".$row["name"]."</td>"."<td>".$row["email"]."</td>"."</tr>";
        }
?>
</table>
    </body>
    </html>