@extends('layouts.app')
@section('content')
<html>
 <head>
  <title>
   Kelas Online
  </title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
   body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff;
        }
        .content {
            display: flex;
            justify-content: center;
            padding: 20px;
        }
        .card {
            background-color: #f8cfcf;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 10px;
            text-align: center;
            width: 200px;
            padding: 10px;
        }
        .card img {
            width: 100%;
            border-radius: 10px 10px 0 0;
        }
        .card h3 {
            margin: 10px 0;
            font-size: 18px;
        }
        .card button {
            background-color: #a97b7b;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 10px 0;
            cursor: pointer;
            border-radius: 5px;
        }
        .pagination {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }
        .pagination span {
            height: 10px;
            width: 10px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            margin: 0 5px;
        }
        .pagination span.active {
            background-color: #000;
        }
  </style>
 </head>
 <body>
  <div class="content">
   <div class="card">
    <img alt="Globe with graduation cap and books" height="150" src="https://storage.googleapis.com/a1aa/image/BMGUmAB0uLKEE9SNbU17tzjVZFls9wYoN57UKE3Aq7ADV45E.jpg" width="200"/>
    <h3>
     Matematika
    </h3>
    <button>
     Pilih
    </button>
   </div>
   <div class="card">
    <img alt="Globe with graduation cap and books" height="150" src="https://storage.googleapis.com/a1aa/image/BMGUmAB0uLKEE9SNbU17tzjVZFls9wYoN57UKE3Aq7ADV45E.jpg" width="200"/>
    <h3>
     Bahasa Indonesia
    </h3>
    <button>
     Pilih
    </button>
   </div>
   <div class="card">
    <img alt="Globe with graduation cap and books" height="150" src="https://storage.googleapis.com/a1aa/image/BMGUmAB0uLKEE9SNbU17tzjVZFls9wYoN57UKE3Aq7ADV45E.jpg" width="200"/>
    <h3>
     PPKn
    </h3>
    <button>
     Pilih
    </button>
   </div>
   <div class="card">
    <img alt="Globe with graduation cap and books" height="150" src="https://storage.googleapis.com/a1aa/image/BMGUmAB0uLKEE9SNbU17tzjVZFls9wYoN57UKE3Aq7ADV45E.jpg" width="200"/>
    <h3>
     Pendidikan Agama Islam
    </h3>
    <button>
     Pilih
    </button>
   </div>
  </div>
  <div class="pagination">
   <span class="active">
   </span>
   <span>
   </span>
   <span>
   </span>
  </div>
 </body>
</html>
@endsection
