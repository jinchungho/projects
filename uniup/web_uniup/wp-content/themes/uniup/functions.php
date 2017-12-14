<?php
// Setup
  function cmsuniup_setup() {
    // A
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
  }
  add_action( 'after_setup_theme', 'cmsuniup_setup' );
// Styles & Scripts
  function cmsuniup_scripts() {
    // B
	//Bootstrap
	wp_enqueue_style( 'bootstrap.min', get_theme_file_uri( 'vendor/bootstrap/css/bootstrap.min.css' ) );

	wp_enqueue_style( 'clean-blog', get_theme_file_uri( 'css/clean-blog.css' ) );
	
	

	//Custom fonts for this template
	wp_enqueue_style( 'font-awesome.min', get_theme_file_uri( 'vendor/font-awesome/css/font-awesome.min.css' ) );
	wp_enqueue_style('fonts.googleapis1', 'https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic', false);
	wp_enqueue_style('fonts.googleapis2', 'https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800', false);

	wp_enqueue_style( 'clean-blog.min', get_theme_file_uri( 'css/clean-blog.min.css' ) );




	//Bootstrap core JavaScript	
	wp_enqueue_script( 'jquery.min', get_theme_file_uri( 'vendor/jquery/jquery.min.js' ) );
	wp_enqueue_script( 'bootstrap.bundle', get_theme_file_uri( 'vendor/bootstrap/js/bootstrap.bundle.min.js' ) );
	wp_enqueue_script( 'jquery-2.1.0.min', get_theme_file_uri( 'vendor/jquery/jquery-2.1.0.min.js' ) );
	

	//바이트 계산 컴포넌트  		
	wp_enqueue_script('jquery-latest.min.js', 'http://code.jquery.com/jquery-latest.min.js', false);	
	wp_enqueue_script( 'number_bytes.js', get_theme_file_uri( 'js/number_bytes.js' ) );


	//Contact Form JavaScript  
	wp_enqueue_script( 'jqBootstrapValidation', get_theme_file_uri( 'js/jqBootstrapValidation.js' ) );
	wp_enqueue_script( 'contact_me.js', get_theme_file_uri( 'js/contact_me.js' ) );


    //Custom scripts for this template    
	wp_enqueue_script( 'clean-blog.min', get_theme_file_uri( 'js/clean-blog.min.js' ) );	

	//sweetalert cdn
	wp_enqueue_script('sweetalert.min', 'https://unpkg.com/sweetalert/dist/sweetalert.min.js', false);
	
	

	

  }
  add_action( 'wp_enqueue_scripts', 'cmsuniup_scripts' );

  add_action( 'wp_ajax_nopriv_text_check', 'wp_ajax_nopriv_text_check' );

  function wp_ajax_nopriv_text_check() {
 
        try {
            
            ## 금지어
            $noWord = '18아,18놈,18새끼,18뇬,18노,18것,18넘,개년,개놈,개뇬,개새,개색끼,개세끼,개세이,개쉐이,개쉑,개쉽,개시키,개자식,개좆,게색기,게색끼,광뇬,뇬,눈깔,뉘미럴,니귀미,니기미,니미,도촬,되질래,뒈져라,뒈진다,디져라,디진다,디질래,병쉰,병신,뻐큐,뻑큐,뽁큐,삐리넷,새꺄,쉬발,쉬밸,쉬팔,쉽알,스패킹,스팽,시벌,시부랄,시부럴,시부리,시불,시브랄,시팍,시팔,시펄,실밸,십8,십쌔,십창,싶알,쌉년,썅놈,쌔끼,쌩쑈,썅,써벌,썩을년,쎄꺄,쎄엑,쓰바,쓰발,쓰벌,쓰팔,씨8,씨댕,씨바,씨발,씨뱅,씨봉알,씨부랄,씨부럴,씨부렁,씨부리,씨불,씨브랄,씨빠,씨빨,씨뽀랄,씨팍,씨팔,씨펄,씹,아가리,아갈이,엄창,접년,잡놈,재랄,저주글,조까,조빠,조쟁이,조지냐,조진다,조질래,존나,존니,좀물,좁년,좃,좆,좇,쥐랄,쥐롤,쥬디,지랄,지럴,지롤,지미랄,쫍빱,凸,퍽큐,뻑큐,빠큐,ㅅㅂㄹㅁ';
            $noWord = explode(',', $noWord);

            ## 추천어
            $bestWord = '사랑,좋아요,즐거워요,학생,동생';
            $bestWord = explode(',', $bestWord);

            ## 메일내영
            $text = isset($_POST['text']) ? $_POST['text'] : '';
            $text = stripslashes($text);
            $text = str_replace("<u style=\"color:red;\">", "", $text);
            $text = str_replace("<u style=\"color:blue;\">", "", $text);
            $text = str_replace("</u>", "", $text);
            foreach($noWord as $word) {
                $text = str_replace($word, "<u style=\"color:red;\">{$word}</u>", $text);
            }
            foreach($bestWord as $word) {
                $text = str_replace($word, "<u style=\"color:blue;\">{$word}</u>", $text);
            }
            
            ## 마무리
            $result = [
                'success'       => true,
                'text'          => $text,
            ];

        } catch(exception $e) {

            $result = [
                'success'       => false,
                'msg'           => $e->getMessage(),
                'code'          => $e->getCode(),
            ];

        } finally {

            echo json_encode($result, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
            exit;

        }
  }