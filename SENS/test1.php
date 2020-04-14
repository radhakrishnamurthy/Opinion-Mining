<?php
$i=0;
$j=0;
$k=4; // get the movie rating from the database instead of a static value
// just get the average rating as an assosciate array and just add 
//one more loop to traverse through each element of the array to generate the stars.

while($i<$k){// to create checked stars
    ?>
    <span class="fa fa-star checked"></span> 

<?php $i+=1;
}
while($j<5-$k){//to create unchecked stars
    ?>
    <span class="fa fa-star"></span>
<?php $j+=1;} ?>



<html>
    <head>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.checked {
  color: orange;
}</style>
    </head>
</html> 