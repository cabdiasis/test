<?php
include 'signup.db.php';
include 'login.db.php';
$userid = $_SESSION['userid'];
$name = $_SESSION['name'];
$conn = mysqli_connect("us-cdbr-east-06.cleardb.net","b15ea59dcdac73","def2bd98","heroku_ee628d3fc1a82c3");
$month = date("M");
$year = date("Y");
?>
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Hoser</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />
    <script src="https://kit.fontawesome.com/c9fd9c0489.js" crossorigin="anonymous"></script>
  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
<style>
  .dropbtn {
  background-color: orange;
  color: black;
  padding: 5px;
  font-size: 14px;
  border: none;
  cursor: pointer;
  margin-left:20px;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 50px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  margin-left:20px;
}
.dropdown-content button{
  background:none;
  border:none;
  text-decoration:none;
  padding:10px;
}
/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #f1f1f1}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
  display: block;
}
#myInput {
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 40%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}
</style>
</head>

<body>
  <div class="hero_area sub_pages">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
          <a class="navbar-brand" href="index.html">
            <img src="images/cam.png" alt="" /><span>
              Hoser
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item">
                  <a class="nav-link" href="add.php"> Add+</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="logout.php"> Logout </a>
                </li>
              </ul>
            </div>
            <div class="quote_btn-container ml-0 ml-lg-4 d-flex justify-content-center">
              <a href="">
                Pro+
              </a>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->

  </div>


  <!-- fruits section -->

  <section class="fruit_section layout_padding-top">
    <div class="container">
      <div>
        <form method="post">
        <input type="search" id="myInput" onkeyup="my()" name="search" placeholder="Raadi....">
          <div class="dropdown">
            <button class="dropbtn">Sort By</button>
            <div class="dropdown-content">
            <button name="all"><a>All</a></button>
            <button name="month"><a>Month</a></button>
            <button name="year"><a>Year</a></button>
            </div>
          </div>
        </form>
      </div><br>
      <table id="myTable">
        <tr>
          <th>Name</th>
          <th>Phone</th>
          <th>Sawirada</th>
          <th>Bixiyay</th>
          <th>Baaqi ah</th>
          <th>Lacag Bixin</th>
          <th>Money</th>
          <th>Action</th>
        </tr>
        <?php
       $conn = mysqli_connect("us-cdbr-east-06.cleardb.net","b15ea59dcdac73","def2bd98","heroku_ee628d3fc1a82c3");
        $sql_all = "SELECT * FROM cli WHERE userid= '$userid'";
        $sql_year = "SELECT * FROM cli WHERE userid= '$userid'&& year='$year'";
        $sql_month = "SELECT * FROM cli WHERE userid= '$userid' && month='$month'";
        if(isset($_POST['month'])){
          $result = $conn-> query($sql_month);
        }else if(isset($_POST['year'])){
          $result = $conn-> query($sql_year);
        }else if(isset($_POST['year'])){
          $result = $conn-> query($sql_all);
        }else{
          $result = $conn-> query($sql_all);
        }
        while($row = $result-> fetch_assoc()):
          $paid = $row['paid'];
          $unpaid = $row['unpaid'];
          if($row['unpaid'] == 0){
        ?>
        <tr class="paid">
          <td><?php echo $row['name'];  ?></td>
          <td><?php echo $row['phone'];  ?></td>
          <td><?php echo $row['pics'];  ?></td>
          <td><?php echo $row['paid'];  ?></td>
          <td><?php echo $row['unpaid'];  ?></td>
          <td><?php echo $row['pmethod'];  ?></td>
          <td>
            <button class="btn">Good</button></td>
            <td>
              <a href="update.php?edit=<?php echo $row['id']; ?>" class="edit" >Edit</a>
            </td>
        </tr>
        <?php
          }else if($row['paid'] == 0){
          ?>
            <tr class="unpaid">
          <td><?php echo $row['name'];  ?></td>
          <td><?php echo $row['phone'];  ?></td>
          <td><?php echo $row['pics'];  ?></td>
          <td><?php echo $row['paid'];  ?></td>
          <td><?php echo $row['unpaid'];  ?></td>
          <td><?php echo $row['pmethod'];  ?></td>
          <td><button class="btn">Bixi</button></td>
          <td>
            <a href="update.php?edit=<?php echo $row['id']; ?>" class="edit" >Edit</a>
          </td>
        </tr>
        <?php
          }else{
        ?>
        <tr class="partial">
          <td><?php echo $row['name'];  ?></td>
          <td><?php echo $row['phone'];  ?></td>
          <td><?php echo $row['pics'];  ?></td>
          <td><?php echo $row['paid'];  ?></td>
          <td><?php echo $row['unpaid'];  ?></td>
          <td><?php echo $row['pmethod'];  ?></td>
          <td><button class="btn">Bixi</button></td>
          <td>
            <a href="update.php?edit=<?php echo $row['id']; ?>" class="edit" >Edit</a>
          </td>
        </tr>
        <?php
          }
        endwhile;
        ?>
      </table>
    </div>
  </section>


  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>

  <script>
    // This example adds a marker to indicate the position of Bondi Beach in Sydney,
    // Australia.
    function initMap() {
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 11,
        center: {
          lat: 40.645037,
          lng: -73.880224
        },
      });

      var image = 'images/maps-and-flags.png';
      var beachMarker = new google.maps.Marker({
        position: {
          lat: 40.645037,
          lng: -73.880224
        },
        map: map,
        icon: image
      });
    }
  </script>
  <!-- google map js -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap">
  </script>
  <script>
    function my() {
      // Declare variables 
      var input, filter, table, tr, i, j, column_length, count_td;
      column_length = document.getElementById('myTable').rows[0].cells.length;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
      for (i = 1; i < tr.length; i++) { // except first(heading) row
        count_td = 0;
        for(j = 1; j < column_length-1; j++){ // except first column
            td = tr[i].getElementsByTagName("td")[0];
            /* ADD columns here that you want you to filter to be used on */
            if (td) {
              if ( td.innerHTML.toUpperCase().indexOf(filter) > -1)  {            
                count_td++;
              }
            }
        }
        if(count_td > 0){
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
      }
      
    }
</script>
  <!-- end google map js -->
</body>

</html>
</html>
