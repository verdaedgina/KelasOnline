<html>
 <head>
  <title>
   Kelas Online
  </title>
  <style>
   body {
       font-family: Arial, sans-serif;
       margin: 0;
       padding: 0;
       background-color: #ffffff;
   }
   .content {
       text-align: center;
       padding: 50px;
   }
   .content h2 {
       background-color: #A05C5C;
       color: #ffffff;
       display: inline-block;
       padding: 10px 20px;
       border-radius: 10px;
       font-size: 24px;
       position: relative;
       left: -400px; /* Anda bisa menyesuaikan posisi ini sesuai kebutuhan */
   }
   .pyramid {
       width: 0;
       height: 0;
       border-left: 200px solid transparent;
       border-right: 200px solid transparent;
       border-bottom: 400px solid #E3B3B3;
       margin: 50px auto;
       position: relative;
   }
   .level {
       position: absolute;
       text-align: center;
       color: #ffffff;
       font-size: 18px;
       font-weight: bold;
       border-radius: 20px;
       left: 50%;
       transform: translateX(-50%);
   }
   .level:nth-child(1) {
       top: 60px;
       background-color: #FFA500;
       padding: 10px 0;
       width: 80px;
   }
   .level:nth-child(2) {
       top: 120px;
       background-color: #90EE90;
       padding: 10px 0;
       width: 140px;
   }
   .level:nth-child(3) {
       top: 180px;
       background-color: #87CEEB;
       padding: 10px 0;
       width: 180px;
   }
   .level:nth-child(4) {
       top: 240px;
       background-color: #6495ED;
       padding: 10px 0;
       width: 220px;
   }
   .level:nth-child(5) {
       top: 300px;
       background-color: #FF6347;
       padding: 10px 0;
       width: 260px;
   }
  </style>
 </head>
 <body>
  <div class="content">
   <h2 href="/profil">
    Tingkatan Level
   </h2>
   <div class="pyramid">
    <div class="level" style="background-color: #FFA500; width: 80px; top: 60px;">
     Master
    </div>
    <div class="level" style="background-color: #90EE90; width: 140px; top: 120px;">
     Expert
    </div>
    <div class="level" style="background-color: #87CEEB; width: 180px; top: 180px;">
     Terpelajar
    </div>
    <div class="level" style="background-color: #6495ED; width: 220px; top: 240px;">
     Menengah
    </div>
    <div class="level" style="background-color: #FF6347; width: 260px; top: 300px;">
     Pemula
    </div>
   </div>
  </div>
 </body>
</html>
