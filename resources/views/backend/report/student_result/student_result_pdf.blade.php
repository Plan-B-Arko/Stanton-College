<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>


    <table id="customers">
        <tr>
         <td><h2>
        <?php $image_path = '/upload/stanton.jpg'; ?>
        <img src="{{ public_path() . $image_path }}" width="300" height="200">

          </h2></td>
          <td><h2>STANTON UNIVERSITY ERP</h2>
      <p>Addres: Dubai</p>
      <p>Phone : +8801785332666</p>
      <p>Email : support@stantonuniversitydubai.com</p>
      <p> <b> Student Result Report</b> </p>


          </td>
        </tr>


      </table>
<br>
<br>
<strong>Result of: </strong>{{ $allData['0']['exam_type']['name'] }}
<br>
<br>

<table id="customers">
  <tr>
    <th width="45%">Year / Session : {{  $allData['0']['year']['name'] }}</th>
    <th width="45%">Class: {{  $allData['0']['student_class']['name'] }} </th>
  </tr>


   
</table>
<br> <br>
  <i style="font-size: 10px; float: right;">Print Data : {{ date("d M Y") }}</i>
</body>
</html>
