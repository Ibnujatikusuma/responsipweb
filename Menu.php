<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tugas Akhir</title>
	<script type="text/javascript">
		function clearScreen() {
		 document.getElementById("result").value = "";
		}

		function display(value) {
		 document.getElementById("result").value += value;
		}

		function calculate() {
		 var p = document.getElementById("result").value;
		 var q = eval(p);
		 document.getElementById("result").value = q;
	}
 	</script>
	<style>
	*{
		box-sizing: border-box;
	}

	body{
		font-family: arial;
		padding: 10px;
		background: cyan;
	}

	.header{
		padding: 30px;
		text-align: center;
		background: cyan;
	}

	.header1{
		font-size: 50px;
	}

	.topnav{
		overflow: hidden;
		background-color: white;
	}

	.topnav a{
		float: left;
		display: block;
		color: #f2f2f2;
		text-align: center;
		padding: 14px 16px;
		text-decoration: none;
	}

	.topnav a:hover{
		background-color: cyan;
		color: grey;
	}

	.leftcolumn{
		float: left;
		width: 75%;
	}

	.rightcolumn{
		float: left;
		width: 25%;
		background-color: cyan;
		padding-left: 20px;
	}
	.bagian{
		background-color: white;
		padding: 20px;
		margin-top: 20px;
	}

	.row:after{
		content: "";
		display: table;
		clear: both;
	}

	.footer{
		padding: 20px;
		text-align: center;
		background-color: #ddd;
		margin-top: 25px;
	}

	@media screen and (max-width: 800px){
		.leftcolumn, .rightcolumn{
			width: 100%;
			padding: 0;
		}
	}

	@media screen and (max-width: 400px){
		.topnav a{
			float: none;
			width: 100%;
		}
	}
</style>
</head>
<body>

<div class="header">
	<h1>TUGAS AKHIR</h1>
	<p>PEMROGRAMAN WEB</p>
</div>

<div class="topnav">

		<a href="kalkulator.html"><h4 style="color : black">Kalkulator</h4></a>
		<a href="simpan.php"><h4 style="color : black">Isi Form</h4></a>
		<a href="kalender.php"><h4 style="color : black">Kalender</h4></a>
</div>

<div class="row">
	<div class="leftcolumn">
		<div class="bagian">
				<center><h2>INPUT DAN OUTPUT FORM</h2></center>
				<form method="post" action="menu.php">
				<table>
					<tr>
						<td>NIM</td>
						<td> : </td>
						<td><input type="text" name="nim" size="60px"></td>
					</tr>
					<tr>
						<td>Nama </td>
						<td> : </td>
						<td><input type="text" name="nama" size="60px"></td>
					</tr>
					<tr>
						<td>Kota </td>
						<td> : </td>
						<td><input type="text" name="kota" size="60px"></td>
					</tr>
					<tr>
						<td>Umur </td>
						<td> : </td>
						<td><input type ="text" name="umur" size="60px"></td>
					</tr>
			</table>
			<input type="submit" name="simpan"><br>
			</form>
			<?php 
				$nim=@$_POST['nim'];
				$nama = @$_POST["nama"];
				$kota = @$_POST["kota"];

				//simpan ke dalam file
					$fileku=fopen("data.txt", "a"); //buka file dengan mode archive
					$data=$nim."\n".$nama."\n".$kota."\n"; //gabungkan kata
					fwrite($fileku,$data); //simpan data ke dalam file
					fclose($fileku);	//close agar terjadi write data secara fisik
				echo"<pre>";
				include("data.txt"); //panggil dam tampilkan
				echo"</pre>";
			?>
		</div>
		<div class="bagian">
			<?php
			//mengambil tanggal sistem saat ini (1-31)
			$hari = date("d");
			$hariini=$hari;
			//mengambil bulan sistem saat ini (1-12)
			$bulan = date("m");
			//mengambil tahun sistem saat ini
			$tahun = date("Y");
			//mencari jumlah hari bulan dan tahun ini
			$jumlahhari = date("t",mktime(0,0,0,$bulan,$hari,$tahun));
			?>
			<?php
				switch ($bulan) {
					case 1: $bln = "January"; break;
					case 2: $bln= "February"; break;
					case 3: $bln= "March"; break;
					case 4: $bln= "April"; break;
					case 5: $bln= "May"; break;
					case 6: $bln= "June"; break;
					case 7: $bln= "July"; break;
					case 8: $bln= "August"; break;
					case 9: $bln= "September"; break;
					case 10: $bln= "October"; break;
					case 11: $bln= "November"; break;
					case 12: $bln= "December"; break;
				}
				echo "<center><h1>$bln $tahun</h1></center>";?>
				<br>
				<table style="border: 2px solid black;" align="center" cellpadding="5">
					<tr bgcolor="lightgreen">
						<td align="center"><font color="#FF0000">Sun</font></td>
						<td align="center">Mon</td>
						<td align="center">Tue</td>
						<td align="center">Wed</td>
						<td align="center">Thu</td>
						<td align="center">Fri</td>
						<td align="center">Sat</td>
					</tr>
			<?php
				$s=date("w",mktime (0,0,0,$bulan,1,$tahun));
				for ($ds=1; $ds<=$s; $ds++) { 
					echo "<td></td>";
				}

				for ($d=1; $d<=$jumlahhari; $d++) {
					//jika minggu ke 0, maka buat baris baru
					if (date("w",mktime (0,0,0,$bulan,$d,$tahun))==0) {
						echo "<tr>";
					}

					$warna="#000000"; //warna default
					$warnasel="white"; //warna sel default

					//jika hari minggu beri warna merah
					if (date("l",mktime (0,0,0,$bulan,$d,$tahun))=="Sunday") {
						$warna="#FF0000";
					}

					//blok sel yang sesuai hari ini
					if ($hariini==$d) {
						$warna="black";
						$warnasel="lightblue";
					}

					//beri warna default tanggal tiap harinya (selain hari minggu)
					echo "<td align=center valign=middle bgcolor=$warnasel> <span style=\"color:$warna\">$d</span></td>";

					//jika hari ke enam, akhiri baris
					if (date("w",mktime (0,0,0,$bulan,$d,$tahun))==6) {
						echo "</tr>";
					}
				} 
				echo '</table>';
			?>
		<br><br>	
		</div>
	</div>
	<div class="rightcolumn">
		<div class="bagian">
					<center><h2>KALKULATOR</h2></center>
					<table border="1" align="center">
						<tr>
						<td colspan = "3"> <input class = "display-box" type = "text" id = "result" disabled /> </td>

						<tr>
						<td>
							<table>
								<tr>
									<td width="50%" align="center">
									<input type="button" value="1" onclick = "display('1')" /;>
									<input type="button" value="2" onclick = "display('2')" /;>
									<input type="button" value="3" onclick = "display('3')" /;>
									<input type="button" value="*" onclick = "display('*')" /;></td></tr>
								<tr>
								<td width="50%" align="center">
									<input type="button" value="4" onclick = "display('4')" /;>
									<input type="button" value="5" onclick = "display('5')" /;>
									<input type="button" value="6" onclick = "display('6')" /;>
									<input type="button" value="/" onclick = "display('/')" /;></td></tr>
								<tr>
								<td width="50%" align="center">
									<input type="button" value="7" onclick = "display('7')" /;>
									<input type="button" value="8" onclick = "display('8')" /;>
									<input type="button" value="9" onclick = "display('9')" /;>
									<input type="button" value="+" onclick = "display('+')" /;></td></tr>
								<tr>
								<td width="50%" align="center">
									<input type="button" value="." onclick = "display('.')" /;>
									<input type="button" value="0" onclick = "display('0')" /;>
									<input class = "button" type = "button" value = "C" onclick = "clearScreen()" />
									<input type="button" value="-" onclick = "display('-')" /;></td></tr>
							</table>
							<tr>
								<td colspan="4" align="right">
								<input type="button" value="Enter" onclick = "calculate()";>
								
								</td></tr>
						</td>
					</tr>
					</table>
	
			</div>
		<div class="bagian">
			<h2>About Me</h2>
			<div class="about" style="height: 120px;">
				<table>
					<tr>
						<td>Nama</td>
						<td> : </td>
						<td>Ibnu Jati Kusuma Admiyanto</td>
					</tr>
					<tr>
						<td>NIM</td>
						<td> : </td>
						<td>2100018199</td>
					</tr>
					<tr>
						<td>Kelas</td>
						<td> : </td>
						<td>D</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="bagian">
			<div class="singkat" style="height: 200px;">
			<tr>
				<td><h2>Sekilas Tentang Saya<h2></td>
				</tr>
			<tr>
				<td><h4>Saya adalah mahasiswa semester 2 yang berasal dari Kota Cilacap. Saya menyukai pemrograman sejak kelas 2 SMA karena waktu itu saya sadar bahwa propek kedepanya dalam dunia pemrograman sangat besar.</h4></td>
			</tr>
	</div>
</div>

<div class="footer">
		<center>Copyright <@> 2022 oleh Ibnu Jati Kusuma</center>
</div>
</body>
</html>