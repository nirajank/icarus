<!DOCTYPE html>
<html lang="en">
<head>
	<title>icarus</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="{{asset('lib/bootstrap.min.css')}}">
   <script type="text/javascript" src="{{asset('lib/jquery.min.js')}}"></script>
   <script type="text/javascript" src="{{asset('lib/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
   <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css">
   <script type="text/javascript">
   $(document).ready(function(){
    $('#myTable').DataTable();
   });
    </script>
</head>
<body  style="background-color:#252830">
<div class="table-responsive">
            <table class="table" id="myTable">
  <thead style="color:white">
  <tr>
  <td>ID</td>
  <td>NAME</td>
  <td>LINK</td>
  <td>ACTION</td>
  </tr>
  </thead>
  <tbody style="color:#c3c3c3">
  </tbody>
  
</table>
</div>


</body>