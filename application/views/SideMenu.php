<div  class = 'row'>

  <div id = 'navigation' class = 'col-sm-12'>



    <nav>

      
        <div class="navbar navbar-default" id="myHome">
          <ul  class="nav navbar-nav">
            <li><a onclick = "scroll_down('home')" class = 'menu'><span class="glyphicon glyphicon-home"></span></a></li>
          </ul>
        </div>
        <div class="navbar navbar-default" id="myNavbar">
          <ul  class="nav navbar-nav">
            <li><a onclick = "scroll_down('aboutus')" class = 'menu'>About Us</a></li>
            <li><a onclick = "scroll_down('classes')" class = 'menu'>Classes</a></li>
            <li><a onclick = "scroll_down('contact')" class = 'menu'>Contact Us</a></li>
            <?php $li = array();

                    if(get_cookie('type') === 'admin'){
                        array_push($li , 'Dashboard');
                        array_push($li , 'Staff');
                        array_push($li , 'Student');
                        array_push($li , 'Classes');

                    }
                    else if(get_cookie('type') === 'teacher'){
                        array_push($li , 'Dashboard');
                        array_push($li , 'Student');

                    }
                    else if(get_cookie('type') === 'reception'){
                        array_push($li , 'Dashboard');
                    }
                    else if(get_cookie('type') === 'student'){
                        array_push($li , 'Dashboard');
                    }

                    for($i  = 0 ; $i < count($li) ; $i++){
                    ?>
                    <li class = '<?php if($title === $li[$i]) echo "active";?>'><a href="<?=base_url()?>index.php/<?php echo $li[$i] ?>"><?php echo $li[$i] ?></a></li>

                    <?php } ?>

                    <li><?php if(get_cookie('type') != NULL){ ?>
                      <form class = "form" method = "post" action = "<?=base_url()?>index.php/Login/sign_out">
                          <input type = 'submit' class="btn btn-danger" value = "SIGN OUT">
                      </form>
                    <?php } ?>
                    </li>
          </ul>
        </div>
     
    </nav>

  </div>
</div>