<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <link rel="profile" href="http://gmpg.org/xfn/11">
	
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?> oncontextmenu="return false" ondragstart="return false" onselectstart="return false">
	
		
    


	<!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="index.html">Start Bootstrap</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="post.html">Sample Post</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/contact-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="page-heading">
              <h1>Contact Me</h1>
              <span class="subheading">Have questions? I have answers.</span>
            </div>
          </div>
        </div>
      </div>
    </header>



	<?php echo do_shortcode("[TABS_R id=4]"); ?>
    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <p>Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible!</p>
          <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
          <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
          <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
          <form name="sentMessage" id="contactForm" novalidate>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="성함" id="name" required				
				data-validation-required-message="이름을 입력해주세요.">				
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Email Address</label>
                <input type="email" class="form-control" placeholder="이메일 주소" id="email" required data-validation-required-message="메일주소를 입력해주세요.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Phone Number</label>
                <input type="tel" class="form-control" placeholder="연락처" id="phone" required data-validation-required-message="번호를 입력해주세요.">
                <p class="help-block text-danger"></p>
              </div>
            </div>			

            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Message</label>
                <iframe id="editor" style="display:block;width:100%;border:0px solid #dee2e6;"></iframe>
                <p class="help-block text-danger"></p>	
              </div>
            </div>
            <br>
            <div id="success"></div>
			
			<br />
            <div class="form-group">
              <center><button type="button" onclick="goSend();" class="btn btn-primary" id="sendMessageButton" >Send</button></center>
            </div>
			
          </form>
		  <br />
		  <div class="form-group" style="text-align: center;">
			<span id="byteInfo">0</span>/1000 글자수
		  </div>
		
			
        </div>
      </div>
    </div>
	
    <hr>
	

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <ul class="list-inline text-center">
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
            </ul>
            <p class="copyright text-muted">Copyright &copy; Your Website 2017</p>
          </div>
        </div>
      </div>
    </footer>
    <script>
        // 시작
        $(function() {
            var editor = document.getElementById('editor').contentDocument;    
            editor.designMode = 'on';
            if(editor.addEventListener) {
                editor.addEventListener("keyup", editorKeyUp, true)
            }
            else { //For IE
                editor.attachEvent("onkeyup", editorKeyUp);
            }
        });
        // send
        function goSend() {
            var text = $('#editor').contents().find('body').html();
            $.ajax({
                url     : '/wp-admin/admin-ajax.php',
                data    : {
                    action  : 'text_check',
                    text    : text
                },
                type    : 'post',
                dataType: 'json',
                success : function(result) {
                    if(result.success == false) {
                        alert(result);
                        return;
                    }
                    $('#editor').contents().find('body').html(result.text);
                }
            });
        }
        // 키보드입력 이벤트
        function editorKeyUp(e) {
            
        }
    </script>
    <?php wp_footer(); ?>
  </body>
</html>