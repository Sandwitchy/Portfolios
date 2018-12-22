<!DOCTYPE html>
<?php
  include('Admin/bdd.inc.php');
 ?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="devellopeur portfolios">
  <meta name="author" content="FRATANI Andréa">
  <title>Andréa FRATANI</title>
  <link rel="stylesheet" href="assets/css/color.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Mono|Inconsolata" rel="stylesheet">
  <link href="https://cdn.materialdesignicons.com/2.0.46/css/materialdesignicons.min.css" rel="stylesheet">
</head>
<body>

<!--Switcher
  <div class="style-switcher">
    <span class="style-switcher__control"></span>
    <div class="style-switcher__list">
      <a class="style-switcher__link style-switcher__link--color"></a>
      <a class="style-switcher__link style-switcher__link--mono"></a>
    </div>
  </div>
Switcher-->

<!--Main menu-->
  <div class="menu">
    <div class="container">
      <div class="row">
        <div class="menu__wrapper d-none d-lg-block col-md-12">
          <nav class="">
            <ul>
              <li><a href="#hello">Hello</a></li>
              <li><a href="#resume">Resume</a></li>
              <li><a href="#portfolio">Mes Projets</a></li>
              <!--<li><a href="#blog">blog</a></li>-->
              <li><a href="#contact">Contact</a></li>
            </ul>
          </nav>
        </div>
        <div class="menu__wrapper col-md-12 d-lg-none">
          <button type="button" class="menu__mobile-button">
            <span><i class="fa fa-bars" aria-hidden="true"></i></span>
          </button>
        </div>
      </div>
    </div>
  </div>
<!--Main menu-->

<!-- Mobile menu -->
  <div class="mobile-menu d-lg-none">
    <div class="container">
      <div class="mobile-menu__close">
        <span><i class="mdi mdi-close" aria-hidden="true"></i></span>
      </div>
      <nav class="mobile-menu__wrapper">
        <ul>
          <li><a href="#hello">Hello</a></li>
          <li><a href="#resume">Resume</a></li>
          <li><a href="#portfolio">Mes Projets</a></li>
          <!--<li><a href="#blog">blog</a></li>-->
          <li><a href="#contact">Contact</a></li>
        </ul>
      </nav>
    </div>
  </div>
<!-- Mobile menu -->

<!--Header-->
<?php
  $sql = "SELECT * FROM bio";
  $req = $conn -> query($sql);
  $r = $req -> fetch();
?>
  <header class="main-header" style="background-image: url(<?php echo $r['img']; ?>)">
    <div class="container">
      <div class="row personal-profile">
        <div class="col-md-4 personal-profile__avatar">
          <img class="" src="<?php echo $r['img']; ?>" alt="avatar">
        </div>
        <div class="col-md-8">
          <p class="personal-profile__name">FRATANI Andréa_</p>
          <p class="personal-profile__work"><?php echo $r['descri'] ?></p>
          <div class="personal-profile__contacts">
            <dl class="contact-list contact-list__opacity-titles">
              <dt>Age:</dt>
              <dd><?php echo $r['age']; ?></dd>
              <dt>Email:</dt>
              <dd><a href="mailto<?php echo $r['mail']; ?>"><?php echo $r['mail']; ?></a></dd>
              <dt>Addresse:</dt>
              <dd><?php echo $r['adress']; ?></dd>
            </dl>
          </div>
          <p class="personal-profile__social">
            <a href="https://github.com/Sandwitchy" target="_blanck"><i class="fa fa-github"></i></a>
            <a href="https://www.linkedin.com/in/andr%C3%A9a-fratani-13748315b/" target="_blanck"><i class="fa fa-linkedin-square"></i></a>
            <a href="https://twitter.com/elsandwitchy" target="_blanck"><i class="fa fa-twitter-square"></i></a>
          </p>
        </div>
      </div>
    </div>
  </header>
<!--Header-->

<!--Hello-->
  <section id="hello" class="container section">
    <div class="row">
      <div class="col-md-10">
        <h2 id="hello_header" class="section__title">Hi_</h2>
        <p class="section__description">
        <?php echo $r['bio_content']; ?>
        </p>
        <a href="" class="section_btn site-btn"><img src="assets/img/img_btn_icon.png" alt="">Download CV</a>
      </div>
    </div>
  </section>
<!--Hello-->

  <hr>

<!--Resume-->
  <section id="resume" class="container section">
    <div class="row">
      <div class="col-md-10">
        <h2 id="resume_header" class="section__title">Resume_</h2>
        <p class="section__description">
          Lorem ipsum dolor sit amet, <i><b>communication</b></i> adipisicing elit, <i><b>helpful</b></i> eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud <i><b>sence of
          humour</b></i> ullamco laboris nisi ut <i><b>honest</b></i> ea commodo consequat. Duis aute irure dolor in
          upper-intermediate english level velit  dolore eu ivivdtevoluptatem ontend developer.
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8 section__resume resume-list">
        <h3 class="resume-list_title">Diplome</h3>
        <?php
          $sql ="SELECT * FROM diplome WHERE valide_dipl = 0 ORDER BY datefin DESC";
          $req = $conn -> query($sql);
          while ($r = $req -> fetch())
          {
            ?>
            <div class="resume-list__block">
              <p class="resume-list__block-title"><?php echo $r['lib_dipl'] ?> </p>
              <p class="resume-list__block-date"><?php echo $r['datedeb']." - ".$r['datefin']; ?></p>
              <p>
                <?php echo $r['desc_dipl']; ?>
              </p>
            </div>
            <?php
          }
         ?>


      </div>
    </div>
    <div class="row">
      <div class="col-md-8 section__resume resume-list">
        <h3 class="resume-list_title">Expérience Profesionnel</h3>
        <?php
          $sql = "SELECT * FROM experience WHERE valide_exp = 0 ORDER BY datefin DESC";
          $req = $conn -> query($sql);
          while ($r = $req -> fetch())
          {
         ?>
          <div class="resume-list__block">
            <p class="resume-list__block-title"><?php echo $r['lib_exp'] ?></p>
            <p class="resume-list__block-date"><?php echo $r['datedeb']." - ".$r['datefin']; ?></p>
            <p>
              <?php echo $r['desc_exp']; ?>
            </p>
          </div>
        <?php
          }
        ?>

      </div>
    </div>
    <div class="row section__resume progress-list js-progress-list">
      <div class="col-md-12">
        <h3 class="progress-list__title">general skills</h3>
      </div>
    <?php
      $sql = "SELECT * FROM skill WHERE valide_sk = 0";
      $req = $conn -> query($sql);
      $count = 0;
      while ($r = $req -> fetch())
      {
        if ($count == 0) {
          ?>
          <div class="col-md-5 mr-auto">
          <?php
        }
     ?>
          <div class="progress-list__skill">
            <p>
              <span class="progress-list__skill-title"><?php echo $r['lib_sk']; ?></span>
              <span class="progress-list__skill-value"><?php echo $r['niv_sk']; ?>%</span>
            </p>
            <div class="progress">
              <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $r['niv_sk']; ?>" aria-valuemin="0" aria-valuemax="100" >
              </div>
            </div>
          </div><!-- 1 skill -->
          <?php
          $count++;
          if ($count == 4)
          {
            ?></div><!--4 skill max -->  <?php
              $count = 0;
            } ?>
      <?php
      }
       ?>
    </div>
  </section>
<!--Resume-->

<!--Portfolio-->
  <section id="portfolio" class="container section">
    <div class="row">
      <div class="col-md-12">
        <h2 id="portfolio_header" class="section__title">Mes projets_</h2>
      </div>
    </div>
    <div class="portfolio-cards">
      <?php
      $sql = "SELECT * FROM projet WHERE valide_pro = 0";
      $req = $conn -> query($sql);
      $count = 0;
      while ($r = $req -> fetch())
      {
       ?>
      <div class="row project-card" data-toggle="modal" data-target="<?php echo '#'.$r['lib_pro'].'modal'; ?>">
        <div class="col-md-6 col-lg-5 project-card__img">
          <img class="" src="<?php echo $r['img_pro']; ?>" alt="project-img">
        </div>
        <div class="col-md-6 col-lg-7 project-card__info">
          <h3 class="project-card__title"><?php echo $r['lib_pro']; ?>  </h3>
          <p class="project-card__description">
          <?php echo $r['desc_pro']; ?>
          </p>
          <!--<p class="project-card__stack">Used stack:</p>
          <ul class="tags">
            <li>html5</li>
            <li>css3</li>
            <li>JavaScript</li>
            <li>bower</li>
            <li>grunt</li>
          </ul>
          <a href="" class="project-card__link">www.superapp.com</a>-->
        </div>
      </div>
      <?php
      }
     ?>
    </div>
  </section>
<!--Portfolio-->

<!--Blog
  <section id="blog" class="container section">
    <div class="row">
      <div class="col-md-12">
        <h2 id="blog_header" class="section__title">Latest Posts_</h2>
      </div>
    </div>

    <div class="row post-cards">
      <div class="col-md-4">
        <a href="blog.html">
          <div class="post-cards__card">
            <div class="post-cards__img">
              <img src="assets/img/img_blog_1.png" alt="blog_img">
            </div>
            <div class="post-cards__info">
              <p class="post-cards__date">October 22, 2017</p>
              <h3 class="post-cards_title">How to use css-preprocessor</h3>
              <p class="post-cards_description">Lorem ipsum dolor sit amet, consectetur
                adipisicing elit, sed do eiusmod tempr incididunt...
              </p>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-4">
        <a href="blog.html">
          <div class="post-cards__card">
            <div class="post-cards__img">
              <img src="assets/img/img_blog_2.png" alt="blog_img">
            </div>
            <div class="post-cards__info">
              <p class="post-cards__date">October 22, 2017</p>
              <h3 class="post-cards_title">How I organize my work with code</h3>
              <p class="post-cards_description">Lorem ipsum dolor sit amet, consectetur
                adipisicing elit, sed do eiusmod tempr incididu...
              </p>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-4">
        <a href="blog.html">
          <div class="post-cards__card">
            <div class="post-cards__img">
              <img src="assets/img/img_blog_3.png" alt="blog_img">
            </div>
            <div class="post-cards__info">
              <p class="post-cards__date">October 22, 2017</p>
              <h3 class="post-cards_title">SVG sprites vs Icon Font</h3>
              <p class="post-cards_description">Lorem ipsum dolor sit amet, consectetur
                adipisicing elit, sed do eiusmod tempr incididu...
              </p>
            </div>
          </div>
        </a>
      </div>
    </div>
  </section>
Blog-->

<!--Contact-->
  <div class="background" style="background-image: url(assets/img/img_bg_main.jpg)">
    <div id="contact" class="container section">
      <div class="row">
        <div class="col-md-12">
          <p id="contacts_header" class="section__title">Vous voulez me contacter?_</p>
        </div>
      </div>
      <div class="row contacts">
        <div class="col-md-5 col-lg-4">
          <div class="contacts__list">
            <dl class="contact-list">
              <dt>Email:</dt>
              <?php
                $sql = "SELECT * FROM bio";
                $req = $conn -> query($sql);
                $r = $req -> fetch();
              ?>
              <dd><a href="mailto:<?php echo $r['mail']; ?>"><?php echo $r['mail']; ?></a></dd>
            </dl>
          </div>
          <div class="contacts__social">
            <ul>
              <li><a href="https://twitter.com/elsandwitchy">Twitter</a></li>
              <li><a href="https://www.linkedin.com/in/andr%C3%A9a-fratani-13748315b/">Linkedin</a></li>
              <li><a href="https://github.com/Sandwitchy">GitHub</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-7 col-lg-5">
          <div class="contacts__form">
            <p class="contacts__form-title">Ou ecrivez moi ici_</p>
            <form class="js-form">
              <div class="form-group">
                <input class="form-field js-field-name" type="text" placeholder="Your name" required>
                <span class="form-validation"></span>
                <span class="form-invalid-icon"><i class="mdi mdi-close" aria-hidden="true"></i></span>
              </div>
              <div class="form-group">
                <input class="form-field js-field-email" type="email"  placeholder="Your e-mail" required>
                <span class="form-validation"></span>
                <span class="form-invalid-icon"><i class="mdi mdi-close" aria-hidden="true"></i></span>
              </div>
              <div class="form-group">
                <textarea class="form-field js-field-message" placeholder="Type the message here" required></textarea>
                <span class="form-validation"></span>
                <span class="form-invalid-icon"><i class="mdi mdi-close" aria-hidden="true"></i></span>
              </div>
              <button class="site-btn site-btn--form" type="submit" value="Send">Envoyer</button>
            </form>
          </div>
          <div class="footer">
            <p>© 2016 Ivan Susanin. All Rights Reserved</p>
          </div>
        </div>
      </div>
    </div>
  </div>
<!--Contact-->

<!-- Portfolio Modal -->
<?php
$sql = "SELECT * FROM projet WHERE valide_pro = 0";
$req = $conn -> query($sql);
$count = 0;
while ($r = $req -> fetch())
{
  ?>
  <div class="modal fade portfolio-modal" id="<?php echo $r['lib_pro']."modal"; ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body col-md-11 col-lg-9 ml-auto mr-auto">
        <p class="portfolio-modal__title"><?php echo $r['lib_pro']; ?></p>
        <img class="portfolio-modal__img" src="<?php echo $r['img_pro']; ?>" alt="modal_img">
        <p class="portfolio-modal__description">
        <?php echo $r['desc_pro']; ?>
        </p>
        <!--<div class="portfolio-modal__link">
          <a href="">www.superapp.com</a>
        </div>
        <div  class="portfolio-modal__stack">
          <p class="portfolio-modal__stack-title">Using stack:</p>
          <ul class="tags">
            <li>html5</li>
            <li>css3</li>
            <li>JavaScript</li>
            <li>bower</li>
            <li>grunt</li>
          </ul>
        </div>-->
      </div>
    </div>
  </div>
</div>
<!-- Portfolio Modal -->
<?php
}
 ?>

  <script src="assets/js/jquery-2.2.4.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/menu.js"></script>
  <script src="assets/js/jquery.waypoints.js"></script>
  <script src="assets/js/progress-list.js"></script>
  <script src="assets/js/section.js"></script>
  <script src="assets/js/portfolio-filter.js"></script>
  <script src="assets/js/slider-carousel.js"></script>
  <script src="assets/js/mobile-menu.js"></script>
  <script src="assets/js/contacts.js"></script>
  <script src="assets/js/mbclicker.min.js"></script>
  <script src="assets/js/site-btn.js"></script>
  <script src="assets/js/style-switcher.js"></script>
</body>
</html>
