<?php
include "php/config.php";
$new_url = "";


if (isset($_GET)) {
  foreach ($_GET as $key => $val) {
    $u = mysqli_real_escape_string($conn, $key);
    $new_url = str_replace('/', '', $u);
  }

  $sql = mysqli_query($conn, "SELECT full_url FROM url WHERE shorten_url = '{$new_url}'");
  if (mysqli_num_rows($sql) > 0) {
    $sql2 = mysqli_query($conn, "UPDATE url SET clicks = clicks + 1 WHERE shorten_url = '{$new_url}'");
    if ($sql2) {
      $full_url = mysqli_fetch_assoc($sql);
      header("Location:" . $full_url['full_url']);
    }
  }
}
?>


<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>URL Shortener in PHP | CodingNepal</title>
  <link rel="stylesheet" href="style.css">
  <!-- Iconsout Link for Icons -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
  <!-------------------------------------------------- form รับ เข้ามา ----------------------------------------------------->
  <div class="wrapper">
    <h1 id="demo1">Short URL and QR code </h1>
    <form action="#" autocomplete="off">
      <input type="text" spellcheck="false" id="uniqueID" name="full_url" />
      <button>button</button>
    </form>

    <script>
      var nameValue = document.getElementById("uniqueID").value;
      document.getElementById("ui").innerHTML = nameValue;
    </script>
    <!-- ดึงข้อมูล ทั้งหมด -->
    <?php
    $sql2 = mysqli_query($conn, "SELECT * FROM url ORDER BY id DESC");
    if (mysqli_num_rows($sql2) > 0) {;
    ?>
      <div class="statistics">
        <?php
        $sql3 = mysqli_query($conn, "SELECT COUNT(*) FROM url");
        $res = mysqli_fetch_assoc($sql3);

        $sql4 = mysqli_query($conn, "SELECT clicks FROM url");
        $total = 0;
        while ($count = mysqli_fetch_assoc($sql4)) {
          $total = $count['clicks'] + $total;
        }
        ?>
        <span>Total Links: <span><?php echo end($res) ?></span> & Total Clicks: <span><?php echo $total ?></span></span>
        <a href="php/delete.php?delete=all">Clear All</a>
      </div>
      <!--------------------------------- แสดงผล OUTPUT -------------------------------------------------------->
      <div class="urls-area">
        <div class="title">
          <li>Shorten URL</li>
          <li>Original URL</li>
          <li>Clicks</li>
          <li>Action</li>
        </div>
        <!-------------------------- ดึงข้อมูลออกมาแสดงผลที่ตาราง ----------------------------------------------->
        <?php
        while ($row = mysqli_fetch_assoc($sql2)) {
        ?>
          <div class="data">
            <li>
              <a href="<?php echo $row['shorten_url'] ?>" target="_blank">
                <?php
                if (strlen($domain . $row['shorten_url']) > 50) {
                  echo substr($domain . $row['shorten_url'], 0, 50) . '...';
                } else {
                  echo   $domain . $row['shorten_url'];
                }
                ?>
              </a>
            </li>
            <li>
              <?php
              if (strlen($row['full_url']) > 60) {
                echo substr($row['full_url'], 0, 60) . '...';
              } else {
                echo $row['full_url'];
              }
              ?>
            </li>
            </li>
            <li><?php echo $row['clicks'] ?></li>
            <li><a href="php/delete.php?id=<?php echo $row['shorten_url'] ?>">Delete</a></li>
          </div>
        <?php
        }
        ?>
      </div>

    <?php
    }
    ?>

    <input class="btu" type="button" onclick="location.href='qrcd.php';" value="QR code now" />


  </div>
  <!-- after หลังจากกดปุ่มแล้วนำมาโชว์ -->
  <div class="blur-effect">
    <div class="popup-box">
      <div class="info-box">Your short link is ready. You can also edit your short link now but can't edit once you saved it.</div>
      <form action="#" autocomplete="off">
        <input type="text" class="shorten-url" />
        <p>Do you want to QR code ? <a href="qrcd.php">Click</a></p>
        <button>Save</button>
      </form>


      <!----------------------------------------------- QR code image ------------------------------------------------>

    </div>
  </div>

  <script src="script.js"></script>

</body>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
  .btu {
    margin-left: 40%;
    margin-top: 5%;
  background-color: black; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
  </style>
</html>

