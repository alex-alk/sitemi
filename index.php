<!DOCTYPE html>
<html lang="ro">
    <head>
        <meta charset="UTF-8" lang="ro">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Mircea Iulian</title>
        <meta name="description" content="Numele meu este Mircea Iulian, sunt născut în orașul Brăila iar pasiunile mele sunt călatoriile și pictura.">
        <meta name="keywords" content="Mircea Iulian, EuroVelo Tour, Turul Romaniei">
        <meta name="author" content="Mircea Iulian">
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.slicknav.min.js"></script>
        <script src ="js/main.js"></script>
      <!--  <script src="ckeditor/ckeditor.js"></script>
        <script src="ckeditor/samples/js/sample.js"></script> -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/slicknav.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="shortcut icon" href="fav.ico">
    </head>
    <body>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.0';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
        </script>
        <header>
            <section>
                <img src="img/logo.png" alt="img" id="imglogo">
                <span id="links">
                    <a href="https://www.facebook.com/mircea.iulian.92" class="fa fa-facebook-square"></a>
                    <a href="https://www.instagram.com/mircea_iulian_18" class="fa fa-instagram"></a>
                    <a href="https://twitter.com/MirceaIulian2" class="fa fa-twitter-square"></a>
                    <a href="https://plus.google.com/u/0/110910143219516336149" class="fa fa-google-plus-square"></a>
                    <a href="https://www.youtube.com/channel/UCnjL6AyyGgQdIu3iD_IvBhA?view_as=subscriber" class="fa fa-youtube-square"></a>
                </span>
                <span class="fa fa-search" id="search"></span>
                <form method="GET" action="index.php" id="searchForm">
                    <input type="text" name="cauta">
                    <input type="submit" name="search" value="Caută" id="searchSub">
                </form>
            </section>
            <nav>
                <?php   
                    function style($fcategorie){
                        require 'connection.php';
                        $sql="SELECT css FROM menu where categorie='$fcategorie'";
                        $stmt = $conn->prepare($sql); 
                        $stmt->execute();
                        $result = $stmt->fetch();
                        echo $result['css']; 
                        $stmt->closeCursor();
                        $conn = null;
                    }
                ?>
                <?php style('home');?>
                <?php style('despre');?>
                <?php style('blog');?>
                <?php style('ciclo');?>
                <?php style('euro');?>
                <?php style('presa');?>
                <?php style('sponsori');?>
                <?php style('contact');?>
                <?php style('doneaza');?>
                <ul id="menu">
                    <li>
                        <a href="index.php?categorie=HOME" id="home">HOME</a>
                    </li>
                    <li>
                        <a href="index.php?categorie=DESPRE_MINE" id="despre">DESPRE MINE</a>
                    </li>
                    <li>
                        <a href="index.php?categorie=BLOG" id="blog">BLOG</a>
                    </li>
                    <li>
                        <label class="a" id="ciclo">CICLOTURISM</label>
                        <ul>
                            <li><a href="index.php?categorie=PRIMUL_TRASEU_CICLOTURISTIC">Primul traseu cicloturistic</a></li>
                            <li><a href="index.php?categorie=TURUL_ROMANIEI" id="turul">Turul României</a></li>
                            <?php
                                require 'connection.php';
                                $sql="SELECT subcategorie FROM categorii where categorie='CICLOTURISM'";
                                $stmt = $conn->prepare($sql); 
                                $stmt->execute();
                                $result = $stmt->fetch();
                                while ($result !=null){
                                    $subcateg = $result['subcategorie'];
                                    $subcateghtml = str_replace('_', ' ', $subcateg);
                                    echo "<li><a href=index.php?categorie=$subcateg>$subcateghtml</a></li>";
                                    $result = $stmt->fetch();
                                }
                                $stmt->closeCursor();
                                $conn = null; 
                            ?>
                        </ul>
                    </li>
                    <li>
                        <label class="a" id="euro">EUROVELO TOUR</label>
                        <ul>
                            <li><a href="index.php?categorie=DESPRE_EUROVELO_TOUR">Despre EuroVelo Tour</a></li>
                            <li><a href="index.php?categorie=ECHIPAMENT">Echipament</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="index.php?categorie=MASS-MEDIA" id="presa">MASS-MEDIA</a>
                    </li>
                    <li>
                        <a href="index.php?categorie=SPONSORI" id="sponsori">SPONSORI</a>
                    </li>
                    <li>
                        <a href="index.php?categorie=CONTACT" id="contact">CONTACT</a>
                    </li>
                    <li>
                        <a href="index.php?categorie=DONEAZA" id="doneaza">DONEAZĂ</a>
                    </li>
                </ul>
            </nav>
        </header>
        <script>
            $(function(){
                    $('#menu').slicknav({
                        prependTo:'nav',
                        label:'MENIU',
                    //    duplicate:false,
                        removeIds:false
                    });
            });
        </script>
        <main>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                </ol>
                <?php
                    require 'connection.php';
                    $sql="SELECT value FROM misc where property='urls'";
                    $stmt = $conn->prepare($sql); 
                    $stmt->execute();
                    $result = $stmt->fetch();
                    while ($result !=null){
                        $resultArr= explode(',,', $result['value']);
                        $result = $stmt->fetch();
                    }
                    $stmt->closeCursor();
                    $conn = null;
                    echo '<div class="carousel-inner">';
                    foreach($resultArr as $key=>$value){
                        if($key==0){
                            echo "<div class='carousel-item active'>
                                    <img class='d-block w-100' src='$value' alt='First slide'>
                                </div>";
                        }else{
                            echo "<div class='carousel-item'>
                                    <img class='d-block w-100' src='$value' alt='Second slide'>
                                </div>";
                        }
                    }
                    echo '</div>';
                ?>
                
                    
                    
                
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
            </div>
            <aside id="right">
                <a href = 'https://www.paypal.me/mirceaiuli/1'><img src="img/donate.gif" alt="donate"></a>
                <div class="fb-page" data-href="https://www.facebook.com/MirceaIulianEVT/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/MirceaIulianEVT/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/MirceaIulianEVT/">EuroVelo Tour 2018-2019</a></blockquote></div>
            </aside>
            <article>
                
                <?php
                    if(isset($_GET['categorie'])){
                        $categorie = $_GET['categorie'];
                    }else {
                        if(!isset($_GET['cauta'])){
                            $categorie='HOME';
                        }else $categorie='';
                    }
                        require 'connection.php';
                        if($categorie ==='BLOG'){
                            echo '<style>main article{background-color: #f1f1f1;border:none}</style>';
                            $sql='SELECT id,URL, titlul FROM blog';
                            $stmt = $conn->prepare($sql); 
                            $stmt->execute();
                            $result = $stmt->fetch();
                            while ($result !=null){
                                $id=$result['id'];
                                echo '<a class=blogArticles href=index.php?categorie=blogPosts&id='.$id.'><div class=blogPosts>';
                                echo '<img src='."'".$result['URL']."'".'>';
                                echo '<p>'.$result['titlul'].'</p>';
                                echo '</div></a>';
                                $result = $stmt->fetch();
                            }
                        }else if($categorie==='blogPosts'){
                            $id=$_GET['id'];
                            $sql='SELECT titlul, body, album FROM blog where id='.$id;
                            $stmt = $conn->prepare($sql); 
                            $stmt->execute();
                            $result = $stmt->fetch();
                            echo '<style>main article{padding: 0 !important;} </style>';
                            while ($result !=null){   
                                echo '<div class=blog>'.$result['body'].'</div>';
                                if(!empty($result['album'])){
                                    $resultArr= explode(',,', $result['album']);
                                    $count = count($resultArr);
                                    echo '<section id=album><img src="" alt="img" id="top"></section>';
                                    echo '<div id=counter><span id=current></span>/<span id=total></span><div id=buttons><button id="First"><<</button><button id="Prev"><</button>
                                          <button id="Next">></button><button id="Last">>></button></div>';
                                }
                                $result = $stmt->fetch();
                            }
                        }else if($categorie==='CONTACT'){
                            $sql="SELECT body,album FROM articles where category='$categorie'";
                            $stmt = $conn->prepare($sql); 
                            $stmt->execute();
                            $result = $stmt->fetch();
                            while ($result !=null){
                                echo $result['body'];
                                if(!empty($result['album'])){
                                    $resultArr= explode(',,', $result['album']);
                                    $count = count($resultArr);
                                    echo '<section id=album><img src="" alt="img" id="top"></section>';
                                    echo '<div id=counter><span id=current></span>/<span id=total></span><div id=buttons><button id="First"><<</button><button id="Prev"><</button>
                                          <button id="Next">></button><button id="Last">>></button></div>';
                                }
                                $result = $stmt->fetch();
                            }
                                    if(isset($_GET['mesaj'])){
                                        echo '<span style=color:green>Mesajul a fost trimis.</span>';
                                    }
                            echo "<form id=formular action=formular.php method=POST>
                                    <Label>Nume:</Label><br>
                                    <input type = text name=nume required><br>
                                    <Label>Email:</Label><br>
                                    <input type=text name=email required><br>
                                    <Label>Subiect:</Label><br>
                                    <input type=text name=subiect required><br>
                                    <Label>Mesaj:</Label><br>
                                    <textarea name=mesaj required></textarea><br>
                                    <input type=submit value=Trimite>
                                  </form> ";
                        }
                        else {
                            $sql="SELECT body,album FROM articles where category='$categorie'";
                            $stmt = $conn->prepare($sql); 
                            $stmt->execute();
                            $result = $stmt->fetch();
                            while ($result !=null){
                                echo $result['body'];
                                if(!empty($result['album'])){
                                    $resultArr= explode(',,', $result['album']);
                                    $count = count($resultArr);
                                    echo '<section id=album><i class="fa fa-times-circle" id="closeButton"></i>
                                    <div id=aButtons>    <i class="fa fa-play" id=play onclick="next()"></i>
                                        <i class="fa fa-expand" id=maximize></i>
                                        <i class="fa fa-compress" id=compress></i>
                                        <i class="fa fa-arrows-alt" id=full></i></div>
                                        </section>';
                                    echo '<div id=counter><span id=current></span>/<span id=total></span><div id=buttons><button id="First"><<</button><button id="Prev"><</button>
                                          <button id="Next">></button><button id="Last">>></button></div>';
                                }
                                $result = $stmt->fetch();
                            }
                        }
                        if(isset($_GET['cauta'])){
                            $cauta = $_GET['cauta'];
                            require 'connection.php';
                            echo '<style>main article{background-color: #f1f1f1;border:none}</style>';
                            echo '<h4 style=color:green>Rezultatele căutării: </h4><br>';
                            $sql="SELECT id,URL, titlul FROM blog where titlul LIKE '%$cauta%'";
                            $stmt = $conn->prepare($sql); 
                            $stmt->execute();
                            $result = $stmt->fetch();
                            while ($result !=null){
                                $id=$result['id'];
                                echo '<a class=blogArticles href=index.php?categorie=blogPosts&id='.$id.'><div class=blogPosts>';
                                echo '<img src='."'".$result['URL']."'".'>';
                                echo '<p>'.$result['titlul'].'</p>';
                                echo '</div></a>';
                                $result = $stmt->fetch();
                            }
                        }
                        $stmt->closeCursor();
                        $conn = null;
                ?>
                    <div id='filter'></div>
                    <i class="fa fa-chevron-circle-right" id="rightButton"></i>
                    <i class="fa fa-chevron-circle-left" id="leftButton"></i>
                    <script>
                            var imgArray = [];
                            var i = 0;
                            <?php foreach($resultArr as $key=>$value){?>
                                imgArray.push('<?php echo $value; ?>');
                                
                            <?php } ?>
                                
                             
                            $('article section img').attr('src',imgArray[0]);
                            var max = imgArray.length;
                            $('#total').text(max);
                            $('#current').text(i+1);
                            $('#First').click(function(){
                                    i=0;
                                    $('article section img').attr('src',imgArray[i]);
                                    $('#current').text(1);
                                
                            });
                            $('#Last').click(function(){
                                i=max-1;
                                $('article section img').attr('src',imgArray[i]);
                                $('#current').text(i+1);
                                    
                                
                            });
                            $('#Next').click(function(){
                                if(i<max-1){
                                    i++;
                                    $('article section img').attr('src',imgArray[i]);
                                    $('#current').text(i+1);
                                }
                            });
                            
                                       var nr = i+1;
                                        var c = "a"+nr+">"
                            function first(){
                                    $('#closeButton').after('<img src="" alt="img" id="top" class='+c);
                                    $('.a1').attr('src',imgArray[i]).css('display','inline');
                                    
                                    
                            }
                            function next(){
                                if(i<max-1){
                                //    $(".a"+i).toggleClass('anim');
                                i++;
                                $('.a1').css('display','none');
                                var nr = i+1;
                                        var c = "a"+nr+">"
                                    $('#closeButton').after('<img src="" alt="img" id="top" class='+c);
                                //    $('a'+i).attr('class',"a"+i);
                                    
                                    $('.a'+nr).attr('src',imgArray[i]);
                                    $('.a'+nr).css('max-height','100%');
                                    $('.a'+nr).fadeIn(3000).fadeOut(3000);
                                //    $('article section img').addClass('op');
                                    
                                //    $("article section img").toggleClass('anim'+nr);
                                    
                                    $('#current').text(i+1);
                                }
                                timer=setTimeout(next, 5000);
                                if(i===max-1){
                                    clearTimeout(timer);
                                }
                            }
                            $('#rightButton').click(function(){
                                if(i<max-1){
                                    i++;
                                    $('article section img').attr('src',imgArray[i]);
                                    $('#current').text(i+1);
                                }
                            });
                            $('#Prev').click(function(){
                                if(i>0){
                                    i--;
                                    $('article section img').attr('src',imgArray[i]);
                                    $('#current').text(i+1);
                                }
                            });
                            $('#leftButton').click(function(){
                                if(i>0){
                                    i--;
                                    $('article section img').attr('src',imgArray[i]);
                                    $('#current').text(i+1);
                                }
                            });
                    </script>
            </article>
        </main>
    </body>
</html>
