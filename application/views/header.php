<?php $this-> load->helper('cookie'); ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Coaching Center - Haris</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>css/myStyle.css">
  
  <script src="<?=base_url()?>js/angular.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
</head>

<script>
    var scroll_down = function(ide){
      var element = document.getElementById(""+ide);
      element.scrollIntoView(true);
      // element.parentNode.scrollTop = target.offsetTop;
    };
  </script>

<script>

var app = angular.module('myApp', []);
app.controller('headerCtrl', function($scope) {
   $scope.is_click_tri_right = false;
   $scope.click_tri_right = function(){
     $scope.is_click_tri_right = !$scope.is_click_tri_right;
   }
}
);
</script>






<body ng-app="myApp" id='home'>




<div ng-controller="headerCtrl" class="jumbotron text-center header">
  <div>
    <h1>Coaching <font>Center</font></h1>
	<p>We Build Students Who Lead The World</p>
<!-- <div class = 'tri_down'></div> -->
  </div>
  <div class = 'tri_holder'><div onclick = "scroll_down('myCarousel')" class = 'tri_down'><p class = 'go_down'>Go Down</p></div></div>
  <?php if(get_cookie('type') === NULL){ ?>
  <form id = "myForm" class = "form" method = "post" action = "<?=base_url()?>index.php/Login">
      <input name = "username" class="form-control myfield" value = '' type = 'text' placeholder = 'Username'/><br/>
      <input name = "password" ng-click = "click_tri_right()" class="form-control myfield" value = '' type = 'password' placeholder = 'Password'/>
      <div class = 'button-holder'>
        <div class = 'extra-space'></div>
        <div class = 'button-login'>
          <input type = 'submit' id = "login_input" class = "btn btn-login" value = 'Login'/>
          <a><small ng-class = "{'animate forget_pass_hide' : !is_click_tri_right ,'animate forget_pass_show' : is_click_tri_right }" class = 'forget_pass_hide'>Forget Password</small></a>
          <div ng-click = "click_tri_right()" class = 'tri-right'></div>
        </div>
      </div>
  </form>
  <?php } ?>
  

</div>

