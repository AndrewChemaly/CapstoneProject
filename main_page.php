<?php
// Start the session
session_start();
$flag=0;
// check if its an admin logging in 
//note that in login  i used session_start(); $_SESSION['username'] = $inputtedUsername;
//and we have2 admin accounts Andrew and Safo
if(isset($_SESSION['username'])){
    if($_SESSION['username']=='Andrew' || $_SESSION['username']=='Safo'){
        $flag=1;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Home Page</title>
  <link href="bootstrap.min.css" rel="stylesheet">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="navbar.css">
  <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
  <!-- this script is for the social media icons in the footer -->
  <script src="navbar.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- this link is for the downwards arrow on Plan & book and services -->

  <script src="https://code.jquery.com/jquery-1.12.4.min.js"
    integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>


  <style>
    * {
      box-sizing: border-box;

    }

    body {
      font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
      width: 100%;
    }


    h1 {
      font-weight: bold;
      font-size: 2rem;
    }

    h2 {
      font-weight: bold;
      font-size: 0.5rem;
    }

    p {
      font-weight: 35;
      font-size: 1rem;
    }


    /* hero */
    main {
      /* background-image: url("main_page_pics/home.png"); */

      height: 100vh;
      background: url('main_page_pics/hero5.jpg');
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
    }



    section {
      padding: 10rem 0 5rem 0;
      /* background: rgb(2, 0, 36); */
      /* background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(255, 255, 255, 1) 100%, rgba(143, 0, 0, 1) 100%, rgba(1, 0, 0, 1) 100%); */
      /* background: linear-gradient(0deg, rgba(34,193,195,1) 0%, rgba(43,29,77,1) 100%); */
      background: linear-gradient(0deg, rgba(34, 148, 195, 1) 0%, rgba(18, 2, 56, 1) 100%);

      /* background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(244,233,233,1) 100%, rgba(5,5,149,1) 100%); */

    }

    /* animation */
    svg {
      animation: infinite-spinning 3s infinite;
    }

    @keyframes infinite-spinning {
      from {
        transform: rotate(0deg);
      }

      to {
        transform: rotate(360deg);
      }
    }


    /* hero section */
    img {
      width: 50%;
      height: auto;
      /* border: 0.5rem solid gray; */
    }

    .z {
      display: flex;
      justify-content: center;
      width: 100%;
      align-items: center;
      margin: auto;
      padding-top: 2rem;
      margin-top: 100px;

    }

    .z div {
      text-align: center;
      border: 2px #ccc solid;
      font-size: 100%;
      height: 12rem;
      margin: 9rem;
      max-width: 100vh;
      /* background: linear-gradient(0deg, rgba(34, 193, 195, 1) 0%, rgba(41, 14, 68, 0.6225840678068102) 0%, rgba(4, 98, 152, 1) 100%, rgba(17, 225, 160, 1) 100%); */
      background: linear-gradient(0deg, rgba(34, 148, 195, 1) 0%, rgba(18, 2, 56, 1) 100%);
      z-index: 2;
    }

    .box1,
    .box2,
    .box3 {

      flex-basis: 70%;
      border-radius: 0.5em;
      flex-flow: column;
      transition: all 0.3s ease;
    }

    .z a {
      text-decoration: none;
      color: white;
      margin: 0.125rem;
      transition: color .1s ease-in-out;
    }

    .z a:hover {
      box-shadow: inset 200px 0 0 0 #54b3d6;
      color: black;
      transition: all 1s ease;

    }




    /* Winter Getaway section */
    .z1 {
      display: flex;
      justify-content: left;
      width: 100%;
      margin-top: -15rem;
      padding-top: 10rem;
    }

    .box4 h1 {
      color: white;
      padding-left: 10rem;
      white-space: nowrap;
      font-weight: bolder;
      font-family: Arial, Helvetica, sans-serif;

    }

    .box4 p {
      margin-left: 1em;
      text-align-last: left;
      font-size: 1.8rem;
      font-family: Georgia, 'Times New Roman', Times, serif;
      font-weight: lighter;
      padding-top: 1rem;
      text-shadow: -4px 4px 6px dimgray;
      color: white;
    }


    /* Summer Getaway section */
    .z2 {
      display: flex;
      justify-content: right;
      width: 100%;
      margin-top: -15rem;
      padding-top: 10rem;
    }

    .box5 h1 {
      color: white;
      padding-left: 10rem;
      white-space: nowrap;
      font-weight: bolder;
      font-family: Arial, Helvetica, sans-serif;

    }

    .box5 p {
      margin-left: 1em;
      margin-right: 1em;
      text-align-last: left;
      font-size: 1.8rem;
      font-family: Georgia, 'Times New Roman', Times, serif;
      font-weight: lighter;
      padding-top: 1rem;
      text-shadow: -4px 4px 6px dimgray;
      color: white;
    }


    #button1 {
      white-space: nowrap;
      margin: auto;
      cursor: pointer;
      border: none;
      padding: 1rem;
      /* background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,43,121,1) 44%, rgba(0,212,255,1) 100%); */
      /* color:white; */
      font-family: cursive;
      box-sizing: border-box;
      padding: 0.4em 0.7em;
      font-size: clamp(.5rem, 1.5vw + 3px, 2rem);
    }


    /* slide show section */

    .h11 {
      text-align: center;
      font-size: 2rem;
      font-family: 'Montserrat', sans-serif;
      color: white;
      text-transform: uppercase;
      letter-spacing: 0.2rem;
      /* -webkit-text-stroke: 1px white; */
    }


    .navigation-mannual {
      position: absolute;
      width: 1200px;
      margin-top: -40px;
      display: flex;
      justify-content: center;
    }

    .mannual-btn {
      border: 2px solid #ccc;
      padding: 5px;
      border-radius: 10px;
      cursor: pointer;
      transition: 1s;
    }

    .mannual-btn:not(:last-child) {
      margin-right: 40px;
    }

    .mannual-btn:hover {
      background-color: #ccc;
    }

    #radio1:checked~.first {
      margin-left: 0;
    }

    #radio2:checked~.first {
      margin-left: -20%;
    }

    #radio3:checked~.first {
      margin-left: -40%;
    }

    #radio4:checked~.first {
      margin-left: -60%;
    }

    /* Automatic Navigation */
    .navigation-auto {
      position: absolute;
      display: flex;
      width: 1200px;
      justify-content: center;
      margin-top: 460px;
    }

    .navigation-auto div {
      border: 2px solid #333;
      padding: 5px;
      border-radius: 10px;
      transition: 1s;
    }

    .navigation-auto div:not(:last-child) {
      margin-right: 40px;
    }

    #radio1:checked~.navigation-auto .auto-btn-1 {
      background: #ccc;
    }

    #radio2:checked~.navigation-auto .auto-btn-2 {
      background: #ccc;
    }


    #radio3:checked~.navigation-auto .auto-btn-3 {
      background: #ccc;
    }

    #radio4:checked~.navigation-auto .auto-btn-4 {
      background: #ccc;
    }

    /* Contact Us Section*/

    .box6 {
      height: 80vh;
      margin-top: -5rem;
    }

    .ContactUs .box6 h1 {
      text-align: center;
      color: white;
      font-weight: bold;
      font-style: italic;
    }

    .ContactUs input {
      width: 30%;
      font-size: 1rem;
      padding: 1rem;
      margin: 1.1rem;
      display: block;
      border: 1px solid #ccc;
    }

    .ContactUs input[type=submit] {
      background-color: #4CAF50;
      color: white;
    }

    .ContactUs input::placeholder {
      font-size: 1rem;
    }


    .ContactUs form {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .ContactUs textarea {
      width: 30%;
      height: 18rem;
      padding-top: 1rem;
      padding-left: 1rem;
      border: 1px solid #ccc;
      font-size: 1rem;
      margin: 1.1rem;
      font-family: sans-serif;
    }


    /* Footer part */
    /* footer {
      padding-bottom: 5rem;
      height: 1rem;
      background-color: black;
      line-height: 80px;
      text-align: center;
    } */

    .Mediaicons {
      text-decoration: none;
      padding: 20px;
      margin: 0.1rem;
      font-size: 1rem;
      background-color: white;
    }

    .Mediaicons-facebook {
      background: #3B5998;
      color: white;
    }

    .Mediaicons-twitter {
      background: #55ACEE;
      color: white;
    }

    .Mediaicons-instagram {
      background: #125688;
      color: white;
    }

    .Mediaicons-youtube {
      background: #bb0000;
      color: white;
    }

    .Mediaicons-google {
      background: #dd4b39;
      color: white;
    }


    .Mediaicons:hover {
      opacity: 0.9;
    }


    @media (max-width:1500px) {

      .z {
        display: flex;
        flex-direction: row;
        padding-top: 10rem;
        width: 100%;
      }

      .z div {
        width: 80%;
        justify-content: center;
        border: px #ccc solid;
        font-size: 100%;
        margin-top: -7rem;
      }

      form {
        height: 25rem;
      }

    }




    /* --------------------------------------------------------- */
    /* MEDIA QUERIES */
    @media (max-width:1340px) {

      .box1 {
        width: 100%;
        padding: 1rem;
      }

      .box1 h1 {
        font-size: 2rem;
        margin-top: -1.5rem;
        text-align: last;
      }

      .z {
        display: flex;
        flex-direction: row;
        padding-top: 10rem;
        width: 100%;
      }

      .z div {
        width: 80%;
        justify-content: center;
        border: px #ccc solid;
        font-size: 100%;
        margin-top: -7rem;
      }


      .box4 h1 {
        padding-left: clamp(2rem, 1.5vw + 3px, 2rem);
        font-size: clamp(1rem, 2.5vw, 2rem);
      }

      .box4 p {
        margin-left: 1em;
        text-align-last: left;
        font-size: 3rem;

        padding-top: 1rem;
        font-size: clamp(1rem, 2.5vw, 2rem);
      }


      .box5 h1 {
        padding-left: clamp(2rem, 1.5vw + 3px, 2rem);
        font-size: clamp(1rem, 2.5vw, 2rem);
      }

      .box5 p {
        margin-left: 1em;
        text-align-last: left;
        font-size: 3rem;

        padding-top: 1rem;
        font-size: clamp(1rem, 2.5vw, 2rem);
      }

      /* make contact us repsonsive */
      /* .ContactUs input {
        width: 50%;
        font-size: 1rem;
        padding: 1rem;
        margin: 0.1rem;
        display: block;
        border: 1px solid #ccc;
      } */
      /* .ContactUs{
        margin-top: -5rem;
      } */
      /* 
      textarea {
        width: 50%;
        height: 10rem;
        padding-top: 10rem;
        padding-left: 1rem;
        border: 1px solid #ccc;
        font-size: 1rem;
        margin: 0.1rem;
        font-family: sans-serif;
      } */

      form {
        height: 25rem;
      }

      /* input[type="submit"]{
        width: 50%;
        font-size: 1rem;
        padding: 0.4rem;
        margin: 0.1rem;
        display: block;
        border: 1px solid #ccc;
      } */


    }




    @media (max-width:600px) {

      .box4 h1 {
        font-size: small;
        padding-left: clamp(2rem, 1.5vw + 3px, 2rem);
      }

      .box4 p {
        width: 50%;
        margin-left: 1em;
        text-align-last: left;
        font-size: 3rem;

        padding-top: 1rem;
        font-size: clamp(1rem, 2.5vw, 2rem);
      }


      .box5 h1 {
        font-size: small;
        padding-left: clamp(2rem, 1.5vw + 3px, 2rem);
      }

      .box5 p {
        width: 50%;
        margin-left: 1em;
        text-align-last: left;
        font-size: 3rem;

        padding-top: 1rem;
        font-size: clamp(1rem, 2.5vw, 2rem);
      }
    }

    @media (max-height:500px) {

      .z div {

        height: 10rem;
        margin-top: -1rem;
      }
    }

    @media (max-height:300px) {

      .z div {
        height: 10rem;
        margin-top: -10rem;
      }

    }


    @media (max-height:800px) and (max-width:1300px) {
      .z {
        display: flex;
        flex-direction: row;
        height: 10rem;
        /* min-height: 80vh; */
      }

      .z div {
        margin-top: -20rem;
        margin: 1rem;
        height: 10rem;
      }

    }


    @media (max-height:600px) and (max-width:800px) {
      .z {

        display: flex;
        flex-direction: row;
        height: 18rem;
      }

      .z div {
        margin-top: 4rem;
        width: 80%;
        height: 7rem;
        margin-top: -10rem;
      }


    }

    @media (max-height:400px) and (max-width:600px) {
      .z {

        display: flex;
        flex-direction: row;
        height: 18rem;
      }

      .z div {
        font-size: small;
        width: 50%;
        height: 10rem;
        margin-top: -10rem;
      }


    }
  </style>
</head>

<body>
  <main>
    <header>
      <nav>
        <ul>
          <li><a class="active" href="main_page.php">Home Page</a></li>
          <div class="subnav">
            <!-- <li><a href="book.html">Book Room<i class="fa fa-caret-down"></i></a></li> -->
            <!-- <div class="subnav-content"> -->
            <!-- <li><a href="book.html">Book a Room</a></li> -->
            <!-- <li><a href="rooms.php">Room Status</a></li> -->
            <!-- </div> -->
            <div class="subnav">
              <li><a href="rooms.php">Book Room<i class=""></i></a></li>
              <!-- <div class="subnav-content"> -->
              <!-- <li><a href="book.html">Book a Room</a></li> -->
              <!-- <li><a href="rooms.php">Room Status</a></li> -->
              <!-- </div> -->
            </div>
          </div>
          <div class="subnav">
            <li><a href="dining.html">Facilities<i class="fa fa-caret-down"></i></a></li></button>
            <div class="subnav-content">
              <li><a href="dining.html">Dining</a></li>
              <li><a href="pool.html">Swimming Pool</a></li>
              <li><a href="gym.html">Gym</a></li>
              <!-- <li><a href="checkin.php">Check-in</a></li> -->
              <!--  -->
              <!-- <li><a href="admin.html">Admin</a></li> -->
            </div>
          </div>
          <!-- <li><a href="CovidRestrictions.html">Covid Restrictions</a></li> -->
          <li><a href="faq.html">FAQ</a>
          <li><a href="login.php">Login/Register</a>
          <?php
              if ($flag == 1) {
                // add admin link
                print '<li><a href="admin.html">Admin</a></li>';
              }
              ?>
        </ul>

        <!-- hamburger menu, only essentiel links -->
        <div class="topnav">
          <a href="main_page.php" class="active">
            <ion-icon name="airplane-outline"></ion-icon>
          </a>
          <div id="myLinks">
            <a href="rooms.php">Book a Room</a>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
          </div>
          <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
          </a>
      </nav>
    </header>



    <!-- temp.html -->

    <!-- hero -->
    <h1 style="margin-top: 2rem; text-align: center; color: white;">
    Welcome, 
      <!-- use session to print username, note that i already started the session in login.php -->
      <?php 
      // print if guest
      if (!isset($_SESSION['username'])) {
        print 'Guest';
      }
      // print username
      else {
        print $_SESSION['username'];
      }
      ?>
     To Wukong Hotel!

    </h1>





    <!-- The Three Boxes hero sectionn -->
    <div class="z">
      <div class="box1">
        <?php
        if (!isset($_SESSION['username'])) {
            echo "<a href='login.php'>";
        }
        else{
          echo "<a href='rooms.php'>";
        }
        ?>
          <h1>Book Room</h1>
          <p>Buy or Reserve a Room</p>
        </a>
      </div>
      <div class="box2">
        <a href="dining.html">
          <h1>Facilities</h1>
          <p>Check Out The Different Facilities</p>
        </a>
      </div>
      <div class="box3">
        <a href="MyReservations.php">
          <h1>My Bookings</h1>
          <p>Check out My Bookings</p>
        </a>
      </div>
    </div>
  </main>







  <!-- Winter Getaway section -->
  <section>
    <div class="z1">
      <img src="main_page_pics/winterpic.jpg" width="100%" alt="Winter Getaway"
        style="vertical-align: bottom;border: 0.5rem solid gray;">
      <div class="box4">
        <h1>Plan your Winter Getaway!</h1>
        <p>Visit our lovely mountain hotel to get away from the winter's chilly weather.<br><br>
          Relax in our indoor pool and hot tub, unwind in our beautiful guest rooms with fireplaces and mountain views,
          and treat yourself to a spa treatment.<br><br>
          Perfect for a winter vacation that includes skiing and snowshoeing.
          <a href="rooms.php"><button id="button1">Book Now</button></a>
        </p>
      </div>
    </div>
  </section>


  <section>
    <div class="z2">
      <div class="box5">
        <h1>Plan your Summer Getaway!</h1>
        <p>Plan your summer vacation at our seaside hotel to escape the heat.<br><br>
          Swim in the pristine ocean, enjoy delectable seafood dishes, and unwind on the sandy beach.<br><br>
          Make lifetime experiences by making a reservation right away.
          <a href="rooms.php"><button id="button1">Book Now</button></a>
        </p>
      </div>
      <img src="main_page_pics/summerpic.jpg" width="100%" alt="Summer Getaway"
        style="vertical-align: bottom;border: 0.5rem solid gray;">
    </div>

    <!-- divider -->
    <!-- <div class="divider"></div>
    
    <style>
      .divider {
        width: 100%;
        height: 15px;
        /* background: #333; */
        background: radial-gradient(circle, rgba(238, 174, 202, 1) 0%, rgba(148, 187, 233, 1) 100%);
        margin: 10px 0;
      }
      </style> -->

  </section>




  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap');



    .z99 {
      max-width: 90%;
      margin: auto;
    }


    .flex {
      display: flex;
    }




    /* -------------head---------
/*-------------header--------- */

    button {
      background: #CC8C18;
      color: white;
      padding: 10px 20px;
      outline: none;
      border: none;
      border-radius: 30px;
    }





    .left,
    .right {
      width: 50%;
    }



    p {
      line-height: 30px;
      color: #a4a4a4;
      margin-bottom: 20px;
      font-size: 15px;
    }

    /*------------wrapper------------*/
    /*------------wrapper2------------*/
    .wrapper2 {
      position: relative;
      text-align: center;
    }

    .wrapper2 .grid {
      grid-template-columns: repeat(4, 1fr);
    }

    .box p {
      color: black;
    }

    .wrapper2 .box {
      box-shadow: 0 0 20px 3px rgb(0 0 0 / 5%);
      padding: 20px;
      transition: 0.5s;
      background: radial-gradient(circle, rgba(238, 174, 202, 1) 0%, rgba(148, 187, 233, 1) 100%);
    }

    .wrapper2 i {
      margin: 10px 0 15px 0;
      /* color: # ; */
      font-size: 30px;
    }

    .wrapper2 h3 {
      font-size: 20px;
      /* color: white; */
    }

    .wrapper2 span {
      padding: 10px;
      background: #F5E8D1;
      color: #CC8C18;
      border-radius: 50%;
    }

    .wrapper2 .box:hover {
      background: #CC8C18;
      cursor: pointer;
    }

    .wrapper2 .box:hover span {
      background: #fff;
    }

    .wrapper2 .box:hover p,
    .wrapper2 .box:hover h3,
    .wrapper2 .box:hover i {
      color: white;
    }

    .wrapper2::after {
      content: '';
      position: absolute;
      top: -22%;
      left: 0;
      background-image: url("../image/line1.png");
      background-size: cover;
      background-repeat: no-repeat;
      height: 75px;
      width: 100%;
      z-index: 2;
    }

    /*------------wrapper2------------*/
    /*------------room------------*/
    .room {
      margin-bottom: 50px;
      position: relative;
    }

    .heading h5 {
      font-weight: 400;
      letter-spacing: 5px;
      color: white;
      padding-top: 20px;
    }

    .heading h2 {
      color: white;
      font-size: 45px;
      font-family: serif;
      font-weight: bold;
      margin: 10px 0 20px 0;
    }

    .room.wrapper2::after {
      display: none;
      top: 105%;
      background-image: url("../image/line2.png");
    }

    .grid2 {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      grid-gap: 30px;
    }

    .room img {
      width: 100%;
      height: 100%;
      margin-left: 20px;
    }

    .room h3 {
      margin: 0;
      padding: 0;
    }


    /*------------footer------------*/
    @media only screen and (max-width:768px) {

      /*------------home------------*/
      footer .grid,
      .blog .grid,
      .offer2 .grid,
      .wrapper2 .content,
      .grid {
        grid-template-columns: repeat(2, 1fr);
      }

      .home h1 {
        font-size: 100px;
      }

      .home {
        height: 80vh;
      }

      .home .grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-template-rows: repeat(2, auto);
        grid-gap: 15px;
      }

      .home .box:nth-last-child(1) {
        grid-column-start: 1;
        grid-column-end: 3;
        grid-row-start: 3;
        grid-row-end: 3;
      }

      /*------------home------------*/
      /*------------about------------*/
      .left,
      .right {
        width: 100%;
      }

      .area .content,
      .room .content,
      .about .content {
        flex-direction: column;
      }

      .wrapper2::after,
      .area .left::after,
      .timer.about::before,
      .timer.about::after,
      .about .right::after,
      .about::before,
      .about::after {
        display: none;
      }

      /*------------about------------*/
      /*------------wrapper------------*/
      .wrapper .z99 {
        max-width: 80%;
        margin: auto;
      }

      /*------------wrapper2------------*/
      ------------room------------ .room img {
        margin: 0;
        margin-top: 50px;
      }

    }



    @media only screen and (max-width:512px) {

      img {
        width: 100%;
        height: 100%;
      }

      /*------------wrapper------------*/
      .wrapper .z99 {
        max-width: 90%;
      }

      .wrapper {
        height: 100vh;
      }

      .wrapper .item {
        padding: 20px;
        border: 0 solid #F3F3F3;
      }

      .offer2.wrapper {
        height: 170vh;
      }
    }
  </style>


  <section class="room wrapper2 top" id="room">
    <div class="z99">
      <div class="heading">
        <h5>OUR ROOMS</h5>
        <h2>Fascinating rooms & suites </h2>
      </div>
      <div class="content flex mtop">
        <div class="left grid2">
          <div class="box">
            <i class="fas fa-desktop"></i>
            <p>Free Cost</p>
            <h3>No booking fee</h3>
          </div>
          <div class="box">
            <i class="fas fa-dollar-sign"></i>
            <p>Free Cost</p>
            <h3>Best rate guarantee</h3>
          </div>
          <div class="box">
            <i class="fab fa-resolving"></i>
            <p>Free Cost</p>
            <h3>Reservations 24/7</h3>
          </div>
          <div class="box">
            <i class="fal fa-alarm-clock"></i>
            <p>Free Cost</p>
            <h3>High-speed Wi-Fi</h3>
          </div>
          <div class="box">
            <i class="fas fa-mug-hot"></i>
            <p>Free Cost</p>
            <h3>Free breakfast</h3>
          </div>
          <div class="box">
            <i class="fas fa-user-tie"></i>
            <p>Free Cost</p>
            <h3>One person free</h3>
          </div>
        </div>
        <div class="right">
          <img src="main_page_pics/r.jpg" alt="">
        </div>
      </div>
    </div>
  </section>





  <link href="carousel.css" rel="stylesheet">
  <!-- <section> -->

  <div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin-top: -50px;">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="third-slide" src="main_page_pics/hero4.jpg" alt="First slide">
        <div class="zr">
          <div class="carousel-caption text-left">
            <h1>Modern Rooms</h1>
            <h1>Our rooms are modern, well maintained and always clean!</h1>
            <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img class="third-slide" src="main_page_pics/hero7.jpg" alt="Second slide">
        <div class="zr">
          <div class="carousel-caption">
            <h1>Beautiful Nature.</h1>
            <h1>Want to go for a walk deep into nature?.</h1>
            <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img class="third-slide" src="main_page_pics/hero8.jpg" alt="Third slide">
        <div class="zr">
          <div class="carousel-caption text-right">
            <h1>Modern Rooms</h1>
            <h1>Our rooms are modern, well maintained and always clean!</h1>
            <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse Rooms</a></p>
          </div>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <style>
    .third-slide {
      width: 100%;
      height: 100%;
    }
  </style>

  <!-- </section> -->

  <!-- Bootstrap core JavaScript
      ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
  <script src="assets/js/vendor/popper.min.js"></script>
  <script src="bootstrap.min.js"></script>
  <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
  <script src="assets/js/vendor/holder.min.js"></script>














  <section class="ContactUs" style="margin-top: -8rem;">
  <div class="box6">
    <h1>Contact Us</h1>
    <form action="mailto:wukonghotel@gmail.com" method="post" enctype="text/plain">
      <input type="text" name="FullName" placeholder="First and Last Name" required>
      <input type="text" name="Email" placeholder="Enter your email" required>
      <textarea name="Message" placeholder="Enter your message"></textarea>
      <input type="submit" value="Send Message">
    </form>
  </div>
</section>













  <!-- Footer
  <footer>
    <a href="#" class="Mediaicons Mediaicons-faceook">
      <ion-icon name="logo-facebook"></ion-icon>
    </a>
    <a href="#" class="Mediaicons Mediaicons-twitter">
      <ion-icon name="logo-twitter"></ion-icon>
    </a>
    <a href="#" class="Mediaicons Mediaicons-instagram">
      <ion-icon name="logo-instagram"></ion-icon>
    </a>
    <a href="#" class="Mediaicons Mediaicons-youtube">
      <ion-icon name="logo-youtube"></ion-icon>
    </a>
    <a href="#" class="Mediaicons Mediaicons-google">
      <ion-icon name="logo-google"></ion-icon>
    </a>
  </footer> -->

  <footer class="zr py-5">
    <div class="roww">
      <div class="col-12 col-md">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="d-block mb-2">
          <circle cx="12" cy="12" r="10"></circle>
          <line x1="14.31" y1="8" x2="20.05" y2="17.94"></line>
          <line x1="9.69" y1="8" x2="21.17" y2="8"></line>
          <line x1="7.38" y1="12" x2="13.12" y2="2.06"></line>
          <line x1="9.69" y1="16" x2="3.95" y2="6.06"></line>
          <line x1="14.31" y1="16" x2="2.83" y2="16"></line>
          <line x1="16.62" y1="12" x2="10.88" y2="21.94"></line>
        </svg>
        <small class="d-block mb-3 text-muted">&copy; 2023-2024</small>
      </div>
      <div class="col-6 col-md">
        <h5>Services</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="pool.html">Pool</a></li>
          <li><a class="text-muted" href="gym.html">Gym</a></li>
          <li><a class="text-muted" href="dining.html">Dinner</a></li>
          <li><a class="text-muted" href="rooms.php">Explore</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>Resources</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="faq.html">FAQ</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>Account</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="register.php">Register</a></li>
          <li><a class="text-muted" href="login.php">Login</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>About</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="#">Contact us</a></li>
          <li><a class="text-muted" href="#">Locations</a></li>
          <li><a class="text-muted" href="#">Privacy</a></li>
          <li><a class="text-muted" href="#">Terms</a></li>
        </ul>
      </div>
    </div>
  </footer>


</body>

</html>