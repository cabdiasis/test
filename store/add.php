<?php
include 'login.db.php';
include 'signup.db.php';
$userid = $_SESSION['userid'];
$conn = mysqli_connect("us-cdbr-east-06.cleardb.net","b15ea59dcdac73","def2bd98","heroku_ee628d3fc1a82c3");
if (isset($_POST['add'])){
    $name = $_POST['name'];
    $pics = $_POST['npics'];
    $paid = $_POST['paid'];
    $unpaid = $_POST['unpaid'];
    $pmethod = $_POST['pmethod'];
    $phone= $_POST['phone'];
    $userid = $_POST['userid'];
    $day = date("D");
    $month = date("M");
    $year = date("Y");
    $sql = "INSERT INTO cli(name, pics, paid, unpaid, pmethod,phone,userid,day,month,year) VALUE('$name','$pics', '$paid', '$unpaid','$pmethod','$phone','$userid','$day','$month','$year')";
    $result = mysqli_query($conn, $sql);
    header("Location:user.php");
}

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

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
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
                <li class="nav-item active">
                  <a class="nav-link" href="user.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="login.php"> Login</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="signup.php"> Sign up </a>
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

  <!-- service section -->

  <section class="service_section layout_padding ">
    <div class="container">
      <h2 class="custom_heading">Add Costumer</h2>
      <p class="custom_heading-text">
        All your information at your fingertips
      </p>
      <div class="form-style-5">
        <form method="post">
          <label>Name:</label>
          <input type="text" name="name" placeholder="Geli Magaca" required>
          <label>Tirada Sawirada:</label>
          <input type="text" name="userid" hidden="hidden" value="<?php echo $userid ?>">
          <input type="text" name="npics" placeholder="Geli Tirada Sawirka" required>
          <label>Bixiyay:</label>
          <input type="text" name="paid" placeholder="Geli Lacagta La Bixiyay" required>
          <label>Baaqi Ah:</label>
          <input type="text" name="unpaid" placeholder="Geli Lacagta Baaqiga ah" required>
          <label>Habka Lacagta:</label>
          <select name="pmethod">
              <option value="Zaad">Zaad</option>
              <option value="Ku Iibso">Ku Iibso</option>
              <option value="Cash">Cash</option>
          </select>
          <label>Phone Number:</label>
          <input type="text" name="phone" placeholder="Geli Numberka Macmiilka" required>
          <input type="submit" name="add" value="Add">
        </form>
      </div>
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
  <!-- end google map js -->
</body>

</html>