<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>

<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large"
  onclick="w3_close()">Close &times;</button>
  <div class="sidebar">
      <ul>
        <li><a href="index.php">Dashboard</a></li>
        <li><a href="peminjaman.php">Peminjaman Buku</a></li>
        <li><a href="pengembalian.php">Pengembalian Buku</a></li>
        <li><a href="pesan.php">Pesan</a></li>
        <li><a href="profil.php">Profil Saya</a></li>
        <li><a href="../logout.php">Keluar </a></li>
      </ul>
    </div>

</div>

<div id="main">

<div class="w3-teal">
  <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
  <div class="w3-container">
  <h1>Perpustakaan SMKN 64 JAKARTA</h1>
  <h4>Selamat Datang <?= $data_user['username']?> </h4>
  </div>
</div>


<script>
function w3_open() {
  document.getElementById("main").style.marginLeft = "25%";
  document.getElementById("mySidebar").style.width = "25%";
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("openNav").style.display = 'none';
}
function w3_close() {
  document.getElementById("main").style.marginLeft = "0%";
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("openNav").style.display = "inline-block";
}
</script>


</body>
</html>


