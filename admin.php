<?php
session_start();
if (!isset($_SESSION['id'])){
		header("Location: login.php");
	}
	
	?>
<?php
if(isset($_GET['logout'])){
    session_destroy();
    header("location: login.php");
}

?>

<!DOCTYPE html>
<html ng-app="roundft">
<head>
  <title>Admin Panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="ngmodules/angular.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script>
	angular.module("roundft",[]);
	angular.module("roundft").controller("roundftCtrl",function($scope,$http){
		$scope.monsur="Hello";
		$scope.data={};
		
		$http.get("http://localhost/ngp/php/retrive.php").success(function (hamid){
			$scope.data=hamid;
		}).error(function(error){
			$scope.msg=error;
		});
		
		$scope.emailSent=function(n){
			$scope.about=n;
		}
		$scope.emptyData=function(){
			$scope.about=null;
		}
		
		$scope.sendEmail= function(ab){
			$http.post('http://localhost/ngp/php/sendemail.php',ab).success(function(res){
				$scope.msg=res;
				$scope.about=null;
			}).error(function(error){
				$scope.msg=error;
			});
		}
		
		$scope.deleteData= function(ab){
			var isConf=confirm("are you sure to delete?");
			if(isConf){
				$http.post('http://localhost/ngp/php/delete.php',ab).success(function(id){
					$scope.msg="success";
					$scope.data.splice($scope.data.indexOf(ab),1);
				}).error(function(error){
					$scope.msg=error;
				});
			}
		}
	})
  </script>

  <style>
   .fakeimg {
    height: 200px;
    background: #aaa;
  }
  </style>
</head>
<body ng-controller="roundftCtrl">
{{ msg }}
<nav class="navbar navbar-expand-sm bg-info navbar-dark">
  <a class="navbar-brand" href="#" ><h2><b>CAR SERVICE STATION</b></h2></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>   
    </ul>
  </div>  
  <div>
  <a href="?logout=true" class="text-warning"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
  </div>
</nav>

<div class="container mb-3" style="margin-top:30px">
  <div class="row">
    <div class="col-sm-12">
		<h2 class="pb-2 text-center">CUSTOMER MANAGE WINDOW</h2>
      <table class="table table-bordered table-hover">
		<tr class="bg-info text-white text-center">
			<th> #sl </th>
			<th> Name </th>
			<th> Contact </th>
			<th> Email </th>
			<th> Detail </th>
			<th> Status </th>
			<th> Action </th>
		</tr>
		<tr ng-repeat="n in data">
			<td>{{ $index+1 }}</td>
			<td>{{ n.name }}</td>
			<td>{{ n.contact }}</td>
			<td>{{ n.email }}</td>
			<td>{{ n.service }}</td>
			<td>
				<span ng-if="n.status == 0" class="badge badge-info">Pending</span>
				<span ng-if="n.status == 1" class="badge badge-success">Email Sent</span>
			</td>
			<td>
				<button  class="btn btn-outline-success" ng-click="emailSent(n)" data-toggle="modal" data-target="#myModal">Send Email </button>
				<button  class="btn btn-outline-info" ng-click="emailSent(n)" data-toggle="modal" data-target="#showEmail">Email Detail</button>
				<button  class="btn btn-outline-danger" ng-click="deleteData(n)">Delete </button>
			</td>
		
		</tr>
	  </table>
	  
    </div>
  </div>
</div>

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
	<form method="POST" action="">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Email Send Box</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
		
         <div class="form-group">
			<label>Subject:</label>
			<input type="text" name="email_subject" class="form-control" placeholder="Email Subject" ng-model="about.email_subject">
		  </div>

		  <div class="form-group">
			<label>Detail:</label>
			<textarea name="email_body" class="form-control" ng-model="about.email_body"></textarea>
		  </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
		<button type="button" ng-click="sendEmail(about)" class="btn btn-primary" data-dismiss="modal">Submit</button>
		<button type="button" ng-click="emptyData()" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
	</form>
    </div>
  </div>
</div>

<!-- The Modal -->
<div class="modal" id="showEmail">
  <div class="modal-dialog">
    <div class="modal-content">
	<form method="POST" action="">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Email Details Box</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
		
         <div class="form-group">
			<label><b>Subject:</b></label>:<br>
				{{ about.email_subject }}
		  </div>

		  <div class="form-group">
			<label><b>Detail:</b></label>:<br>
				{{ about.email_body }}
		  </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
		<button type="button" ng-click="emptyData()" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
	</form>
    </div>
  </div>
</div>
</body>
</html>
