<?php

session_start();
include("../config/config.php");

$query="select * from podcasts order by podcast_id desc limit 2";
$exec=mysqli_query($con,$query) or die(mysqli_error($con));
$podcast1=mysqli_fetch_array($exec);
$podcast2=mysqli_fetch_array($exec);


 $event_videos_query="select * from videos order by id desc limit 2";
  $event_videos_query_result=mysqli_query($con,$event_videos_query) or die(mysqli_error($con));
   
  $video1=mysqli_fetch_array($event_videos_query_result);
  $video2=mysqli_fetch_array($event_videos_query_result);
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Videos and Podcasts</title>
      <link rel="icon" href="../assets/logo.jpeg" />
    <meta
      name="viewport"
      content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no"
    />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="HandheldFriendly" content="true" />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/mediaelement/4.2.7/mediaelementplayer.min.css"
    />

    <link
      href="https://use.fontawesome.com/releases/v5.0.6/css/all.css"
      rel="stylesheet"
    />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="https://fonts.googleapis.com/css?family=Roboto&amp;display=swap"
    />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css"
    />
    <link rel="stylesheet" type="text/css" href="video&podcast.css" />
    <link rel="stylesheet" type="text/css" href="audioformainpage.css" />

    <link
      rel="stylesheet"
      href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css"
    />
  </head>
  <body class="container-fluid" id="top_view">
    <!-- navbar -->
    <nav class="navbar navbar-expand-md bg-light navbar-light sticky-top">
      <a class="navbar-brand" href="#"
        ><img src="../assets/logo_png.png" alt="" /> THE LEGAL CHRONICLE</a
      >
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#collapsibleNavbar"
      >
        <span
          class="navbar-toggler-icon"
          style="background-color: white !important;"
        ></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a
              style="font-weight: bold !important;"
              class="nav-link nav-link hvr-float-shadow"
              href="../index.php"
              >Home</a
            >
          </li>
          <li class="nav-item">
            <a
              style="font-weight: bold !important;"
              class="nav-link nav-link hvr-float-shadow"
              href="../about_Us/about-us2.php"
              >About
            </a>
          </li>
          <li class="nav-item">
            <a
              style="font-weight: bold !important;"
              class="nav-link nav-link hvr-float-shadow"
              href="../blog_module/blog_main.php"
              >Blog</a
            >
          </li>
          <li class="nav-item dropdown">
            <a
              style="font-weight: bold !important;"
              class="nav-link dropdown-toggle nav-link hvr-float-shadow"
              href="#"
              id="navbardrop"
              data-toggle="dropdown"
              href="#"
              >Event</a
            >
            <div class="dropdown-menu">
              <a
                class="dropdown-item"
                href="../Event_Module/event_module_main.php?event_category=upcoming"
                name="event_category"
                value="upcoming"
              >
                Upcoming Events
              </a>
              <a
                class="dropdown-item"
                href="../Event_Module/event_module_main.php?event_category=sscorner"
                name="event_category"
                value="sscorner"
              >
                School Students Corner
              </a>
              <a
                class="dropdown-item"
                href="../Event_Module/event_module_main.php?event_category=media"
                name="event_category"
                value="media"
              >
                Media Partnership Events
              </a>
              <a
                class="dropdown-item"
                href="../Event_Module/event_module_main.php?event_category=completed"
                name="event_category"
                value="completed"
              >
                Completed Events
              </a>
            </div>
          </li>
          <li class="nav-item">
            <a
              style="font-weight: bold !important;"
              class="nav-link hvr-float-shadow"
              href="../videosPodcasts/video&podcast.php"
              >Videos/Podcasts</a
            >
          </li>
          <li class="nav-item">
            <a
              style="font-weight: bold !important;"
              class="nav-link hvr-float-shadow"
              href="../contactModule/contact-us1.html"
              >Contact</a
            >
          </li>
        </ul>
      </div>
    </nav>

    <header>
      <video
        playsinline="playsinline"
        autoplay="autoplay"
        muted="muted"
        loop="loop"
      >
        <source src="assets/podcast.mp4" type="video/mp4" />
      </video>
    </header>

    <section class="my-5">
      <div class="container">
        <div class="row">
          <a
            href="videos/video2.php"
            class="col-lg-6 cont1 view overlay zoom"
            style="outline: none; text-decoration: none;"
          >
            <img src="../assets/video_main.jpeg" />
            <h1>VIDEO</h1>
          </a>
          <a
            href="podcast/podcast1.php"
            class="col-lg-6 cont2 view overlay zoom"
            style="outline: none; text-decoration: none;"
          >
            <img src="../assets/podcast_main.jpeg" />
            <h1>PODCAST</h1>
          </a>
        </div>
      </div>
    </section>
    <div class="second">
      <div class="row">
        <div class="col-lg-4">
          <div class="card text-white">
            <div class="view overlay zoom">
              <img
                src="<?php echo $video1['vthumb']; ?>"
                class="img-fluid"
                alt="zoom"
              />
              <div class="mask flex-center waves-effect waves-light">
                <form
                  action="videos/individual_video.php"
                  method="POST"
                  enctype="multipart/form-data"
                >
                  <input
                    type="text"
                    name="video_id"
                    value="<?php echo $video1['id'] ?>"
                    readonly
                    style="display: none;"
                  />
                  <button style="border: none; background-color: transparent;">
                    <img
                      src="videos/assets/icon1.png"
                      style="cursor: pointer;"
                    />
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8" style="padding: 25px; text-align: justify;">
          <p style="padding-right:40px">
            Do you know what we like about videos? Their ability to remain
            imbibed in your memories and that you can reproduce everything in
            text when you remember a video. Don’t believe us? Then watch this
            video and see if you can remember the details better than textbooks.
          </p>
        </div>
      </div>
    </div>
    <div class="third">
      <div class="box"></div>
      <div class="podcast">
        <div class="podcast-content">
          <div class="player">
            <div class="cover">
              <img
                src="../admin_podcasts/podcast_images/<?php echo $podcast1['pic'] ?>"
                alt=""
              />
            </div>
            <div class="info">
              <div class="title">Let's Talk About with Aakriti</div>
            </div>

            <div class="music-box" style="width: 100%;">
              <audio style="width: 100%;" class="fc-media1">
                <?php  
                          if($podcast1['audio']!=='')
                          {
                            echo    "<source src='../../admin_podcasts/podcasts/".$podcast1['audio']."' type='audio/mp3'/>";
                } else { echo "<source src='".$podcast1['audio_link']."'
                type='audio/mp3'/>"; } ?>
              </audio>
            </div>
          </div>
          <div class="description">
            <h2><?php echo $podcast1['header']; ?></h2>
            <p><?php echo $podcast1['details']; ?></p>
          </div>
        </div>
      </div>
      <div class="box1"></div>
    </div>
    <div class="fourth">
      <div class="row">
        <div class="col-lg-4">
          <div class="card text-white">
            <div class="view overlay zoom">
              <img
                src="<?php echo $video2['vthumb']; ?>"
                class="img-fluid"
                alt="zoom"
              />
              <div class="mask flex-center waves-effect waves-light">
                <form
                  action="videos/individual_video.php"
                  method="POST"
                  enctype="multipart/form-data"
                >
                  <input
                    type="text"
                    name="video_id"
                    value="<?php echo $video2['id'] ?>"
                    readonly
                    style="display: none;"
                  />
                  <button style="border: none; background-color: transparent;">
                    <img
                      src="videos/assets/icon1.png"
                      style="cursor: pointer;"
                    />
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <p>
            Reshef said “when you educate one person you can change a life, when
            you educate many you can change the world”. Maybe we want to change
            the world then; the reason why we chose audio-visual means.
          </p>
        </div>
      </div>
    </div>
    <div class="podcast2">
      <div class="podcast2-content">
        <div class="player">
          <div class="cover">
            <img
              src="../admin_podcasts/podcast_images/<?php echo $podcast2['pic'] ?>"
              alt=""
            />
          </div>
          <div class="info">
            <div class="title">Let's Talk About with Aakriti</div>
          </div>

          <div class="music-box" style="width: 100%;">
            <audio style="width: 100%;" class="fc-media2">
              <?php  
                          if($podcast2['audio']!=='')
                          {
                            echo    "<source src='../../admin_podcasts/podcasts/".$podcast2['audio']."' type='audio/mp3'/>";
              } else { echo "<source src='".$podcast2['audio_link']."'
              type='audio/mp3'/>"; } ?>
            </audio>
          </div>
        </div>
        <div class="description">
          <h2><?php echo $podcast2['header']; ?></h2>
          <p><?php echo $podcast2['details']; ?></p>
        </div>
      </div>
    </div>
    <a
      href="#top_view"
      class="btn btn-dark"
      style="margin: 20px auto; padding: 10px; width: 50px; height: 50px;"
    >
      <i class="fa fa-arrow-up fa-2x"></i
    ></a>
    <?php  include("../footer/footer3_.html"); ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/mediaelement/4.2.7/mediaelement-and-player.min.js"></script>

    <script>
      var audio = {
        init: function () {
          var $that = this;
          $(function () {
            $that.components.media();
          });
        },
        components: {
          media: function (target) {
            var media1 = $(
              "audio.fc-media1",
              target !== undefined ? target : "body"
            );
            var media2 = $(
              "audio.fc-media2",
              target !== undefined ? target : "body"
            );
            if (media1.length) {
              media1.mediaelementplayer({
                audioHeight: 40,
                features: [
                  "playpause",
                  "current",
                  "duration",
                  "progress",
                  "volume",
                  "tracks",
                  "fullscreen",
                ],
                alwaysShowControls: true,
                timeAndDurationSeparator: "<span></span>",
                iPadUseNativeControls: true,
                iPhoneUseNativeControls: true,
                AndroidUseNativeControls: true,
              });
            }
            if (media2.length) {
              media2.mediaelementplayer({
                audioHeight: 40,
                features: [
                  "playpause",
                  "current",
                  "duration",
                  "progress",
                  "volume",
                  "tracks",
                  "fullscreen",
                ],
                alwaysShowControls: true,
                timeAndDurationSeparator: "<span></span>",
                iPadUseNativeControls: true,
                iPhoneUseNativeControls: true,
                AndroidUseNativeControls: true,
              });
            }
          },
        },
      };
      audio.init();
    </script>
  </body>
</html>
