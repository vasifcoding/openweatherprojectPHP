<?php require_once 'header.php'; 
error_reporting(0);
?>


  <div class=" main col-12 text-center m-auto mt-3">
<h1 class="text-primary">Hava Durumu</h1>
    <div class=" form col-12 text-center">
    <form action="index.php" method="POST" 
     enctype="multipart/form-data">
   <ul>   
     <li> <input type="text" id=searchBar name="konum" placeholder="Sehir giriniz..."></li>
 <li> <button name="konumgonder" class="btn  btn-outline-primary  ms-4 ">Ara</button></li>
   </ul>
   
    </form> 
    </div>
      <div class="content">
    <div class=" konum col-12">
 
      <?php if($_GET['geldi']="ok"){
    
$api = "https://api.openweathermap.org/data/2.5/";
$key = "ca5c44643f8f5c654a8b91228c3c7cb1";

if(isset($_POST['konumgonder'])){
  $konum= $_POST['konum'];
  $url = $api."weather?q=".$konum."&appid=".$key."&units=metric"."&lang=tr";

  $data = file_get_contents($url);
$data = json_decode($data, true);

echo "<div class='sehir'>".'Konum: ' . $data['name'] . '</div>'.'</div>';
echo "<div class='aciklama'>".'Hava Durumu: ' . $data['weather'][0]['description'] .  '</div>';
echo "<div class='sicaklik'>".'Sıcaklık: ' .ceil( $data['main']['temp']) . '°C </div>';
echo "<div class='minmax'>".'Nem Oranı: ' . $data['main']['humidity'] . '% </div>';
echo "<div class='minmax'>".'Rüzgar Hızı: ' . $data['wind']['speed'] . ' m/s </div>';
    
}
elseif(@$_GET['baskent']){
    $baskent=@$_GET['baskent'];
$api = "https://api.openweathermap.org/data/2.5/";
$key = "ca5c44643f8f5c654a8b91228c3c7cb1"; 
$url = $api."weather?q=".$baskent."&appid=".$key."&units=metric"."&lang=tr";

$data = file_get_contents($url);
$data = json_decode($data, true);


echo "<div class='sehir'>".'Konum: ' . $data['name'] . '</div>'.'</div>';
echo "<div class='aciklama'>".'Hava Durumu: ' . $data['weather'][0]['description'] .  '</div>';
echo "<div class='sicaklik'>".'Sıcaklık: ' .ceil( $data['main']['temp']) . '°C </div>';
echo "<div class='minmax'>".'Nem Oranı: ' . $data['main']['humidity'] . '% </div>';
echo "<div class='minmax'>".'Rüzgar Hızı: ' . $data['wind']['speed'] . ' m/s </div>';
}else{
    echo "<div class='sehir'>"."Bir şehir giriniz..."."</div>";
}}


?>
 
     
      
      
     
    
      
      
      
      
      
      
      
        
    </div>
    </div>
   
   
   
  
</div>







<?php require_once 'footer.php'; ?>


   