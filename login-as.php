
<head>
  
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style type="text/css">
html {
  width: 100%;
  height: 100%;
  overflow-x: hidden;
}

body {
  padding: 0;
  margin: 0;
}

.section {
  width: 100%;
  height: 300px;
  padding: 0;
  position: absolute;
  border-top: 2px solid #fff;
  border-bottom: 2px solid #fff;
}

.one {
  top: 300px;
  left: 0px;
  background: url(img/banner-bg.jpg) center center no-repeat;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
.one #button {
  width: 122px;
  padding: 6px;
  height: 50px;
  color: #f6f6f6;
  font-family: "Montserrat", sans-serif;
  font-size: 2.5em;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -moz-transform: translate(-50%, -50%);
  -o-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  border: #fff 2px solid;
  overflow: hidden;
  -webkit-transition: all 0.6s cubic-bezier(0.55, 0, 0.1, 1);
  -moz-transition: all 0.6s cubic-bezier(0.55, 0, 0.1, 1);
  -o-transition: all 0.6s cubic-bezier(0.55, 0, 0.1, 1);
  transition: all 0.6s cubic-bezier(0.55, 0, 0.1, 1);
  cursor: pointer;
  box-shadow: 0px 0px 0px #fff;
}
.one #button:hover {
  text-shadow: 0px 8px 6px rgba(0, 0, 0, 0.9);
  box-shadow: 8px 8px 0px #fff, -8px -8px 0px #fff;
}
.one #button:hover .one {
  opacity: 1;
  transform: translate3d(0px, 0px, 0px);
}
.one #button:hover .two {
  transform: translate3d(0px, 0px, 0px);
}
.one #button:hover .three {
  transform: translate3d(0px, 0px, 0px);
}
.one #button:hover .four {
  transform: translate3d(0px, 0px, 0px);
}
.one #button .ring {
  width: 100%;
  height: 100%;
  position: absolute;
  background: transparent;
  top: 0;
  left: 0;
  transform: translate3d(0px, 90px, 0px);
}
.one #button .one {
  background-color: #FE6B26;
  -webkit-transition: all 0.3s cubic-bezier(0.55, 0, 0.1, 1);
  -moz-transition: all 0.3s cubic-bezier(0.55, 0, 0.1, 1);
  -o-transition: all 0.3s cubic-bezier(0.55, 0, 0.1, 1);
  transition: all 0.3s cubic-bezier(0.55, 0, 0.1, 1);
  z-index: -3;
  z-index: -4;
}
.one #button .two {
  background-color: #FE8EFE;
  -webkit-transition: all 0.5s cubic-bezier(0.55, 0, 0.1, 1);
  -moz-transition: all 0.5s cubic-bezier(0.55, 0, 0.1, 1);
  -o-transition: all 0.5s cubic-bezier(0.55, 0, 0.1, 1);
  transition: all 0.5s cubic-bezier(0.55, 0, 0.1, 1);
  z-index: -3;
}
.one #button .three {
  background-color: #841EE4;
  z-index: -2;
  -webkit-transition: all 0.7s cubic-bezier(0.55, 0, 0.1, 1);
  -moz-transition: all 0.7s cubic-bezier(0.55, 0, 0.1, 1);
  -o-transition: all 0.7s cubic-bezier(0.55, 0, 0.1, 1);
  transition: all 0.7s cubic-bezier(0.55, 0, 0.1, 1);
  z-index: -3;
}
.one #button .four {
  background-color: #3E12FD;
  z-index: -1;
  -webkit-transition: all 0.9s cubic-bezier(0.55, 0, 0.1, 1);
  -moz-transition: all 0.9s cubic-bezier(0.55, 0, 0.1, 1);
  -o-transition: all 0.9s cubic-bezier(0.55, 0, 0.1, 1);
  transition: all 0.9s cubic-bezier(0.55, 0, 0.1, 1);
  z-index: -3;
}

.two {
  top: 0px;
  left: 0;
  background: url(img/hero/hero-2.jpg) center center no-repeat;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
.two #button {
  width: 122px;
  padding: 16px;
  height: 50px;
  color: #f6f6f6;
  font-family: "Montserrat", sans-serif;
  font-size: 2.5em;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -moz-transform: translate(-50%, -50%);
  -o-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  background: transparent;
  overflow: hidden;
  -webkit-transition: all 0.6s cubic-bezier(0.55, 0, 0.1, 1);
  -moz-transition: all 0.6s cubic-bezier(0.55, 0, 0.1, 1);
  -o-transition: all 0.6s cubic-bezier(0.55, 0, 0.1, 1);
  transition: all 0.6s cubic-bezier(0.55, 0, 0.1, 1);
  cursor: pointer;
  box-shadow: 0px 0px 0px #fff;
  -webkit-border-radius: 50px;
  -moz-border-radius: 50px;
  -o-border-radius: 50px;
  border-radius: 50px;
  border: #594A83 solid 8px;
  z-index: 0;
}
.two #button::after {
  position: absolute;
  content: "";
  top: 0px;
  left: 0px;
  width: 0%;
  height: 100%;
  background-image: -webkit-gradient(linear, 0 0, 100% 0, from(#fff), to(transparent));
  background-image: -webkit-linear-gradient(left, #fff, transparent);
  background-image: -moz-linear-gradient(left, #fff, transparent);
  background-image: -o-linear-gradient(left, #fff, transparent);
  z-index: -1;
  -webkit-transition: all 2s ease;
  -moz-transition: all 2s ease;
  -o-transition: all 2s ease;
  transition: all 2s ease;
}
.two #button:hover::after {
  width: 800%;
}
.two #button:hover {
  color: #505050;
  box-shadow: 0px 20px 8px rgba(0, 0, 0, 0.6);
}

.three {
  z-index: -1;
  top: 300px;
  left: 0;
  background: url(img/banner-bg.jpg) center center no-repeat;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
.three #button {
  width: 122px;
  padding: 16px;
  height: 50px;
  color: #f6f6f6;
  font-family: "Montserrat", sans-serif;
  font-size: 2.5em;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -moz-transform: translate(-50%, -50%);
  -o-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  background: transparent;
  -webkit-transition: all 0.6s cubic-bezier(0.55, 0, 0.1, 1);
  -moz-transition: all 0.6s cubic-bezier(0.55, 0, 0.1, 1);
  -o-transition: all 0.6s cubic-bezier(0.55, 0, 0.1, 1);
  transition: all 0.6s cubic-bezier(0.55, 0, 0.1, 1);
  cursor: pointer;
  box-shadow: 0px 0px 0px #fff;
  z-index: 0;
}
.three #button .ring {
  position: absolute;
  width: 20px;
  height: 20px;
  background: #fff;
  -webkit-border-radius: 50px;
  -moz-border-radius: 50px;
  -o-border-radius: 50px;
  border-radius: 50px;
  top: 40%;
  left: 45%;
  -webkit-transition: all 1s cubic-bezier(0.55, 0, 0.1, 1);
  -moz-transition: all 1s cubic-bezier(0.55, 0, 0.1, 1);
  -o-transition: all 1s cubic-bezier(0.55, 0, 0.1, 1);
  transition: all 1s cubic-bezier(0.55, 0, 0.1, 1);
  transform: perspective(500px) translate3d(0px, 0px, 0px);
  opacity: 0;
}
.three #button:hover .one {
  transform: perspective(500px) translate3d(-90px, -50px, 150px);
  opacity: 1;
}
.three #button:hover .two {
  transform: perspective(800px) translate3d(-130px, 50px, 180px);
  opacity: 0.6;
}
.three #button:hover .three {
  transform: perspective(800px) translate3d(130px, 50px, 30px);
  opacity: 0.2;
}
.three #button:hover .four {
  transform: perspective(800px) translate3d(130px, -120px, 80px);
  opacity: 0.9;
}
.three #button::after {
  position: absolute;
  top: -35px;
  left: 0;
  width: 150px;
  height: 150px;
  content: "";
  background: #fff;
  z-index: -1;
  transform: perspective(800px) scale(0) rotate(0deg);
  -webkit-transition: all 2s cubic-bezier(0.55, 0, 0.1, 1);
  -moz-transition: all 2s cubic-bezier(0.55, 0, 0.1, 1);
  -o-transition: all 2s cubic-bezier(0.55, 0, 0.1, 1);
  transition: all 2s cubic-bezier(0.55, 0, 0.1, 1);
}
.three #button:before {
  position: absolute;
  top: -40px;
  left: -6px;
  width: 160px;
  height: 160px;
  border: solid 1px #fff;
  content: "";
  background: transparent;
  z-index: -1;
  transform: perspective(800px) scale(0.4) rotate(0deg);
  -webkit-transition: all 2s cubic-bezier(0.55, 0, 0.1, 1);
  -moz-transition: all 2s cubic-bezier(0.55, 0, 0.1, 1);
  -o-transition: all 2s cubic-bezier(0.55, 0, 0.1, 1);
  transition: all 2s cubic-bezier(0.55, 0, 0.1, 1);
}
.three #button:hover::after {
  transform: perspective(800px) scale(1) rotate(600deg);
}
.three #button:hover::before {
  transform: perspective(800px) scale(1) rotate(-100deg);
}
.three #button:hover {
  color: #505050;
}

footer {
  position: absolute;
  top: 1190px;
  left: 0;
  color: #fff;
}
footer div {
  display: inline-block;
  margin-left: -4px;
  padding: 40px;
}
footer div:nth-child(1) {
  background: #000;
}
footer div:nth-child(2) {
  background: #303030;
}
footer div:nth-child(3) {
  background: #3B5998;
}
footer div:nth-child(4) {
  background: #B3339F;
}
footer a {
  color: #fff;
}
</style>
<body style="background-color: black">

<a href="login-trainer.php"><div class="section two">
   <div id="button" >
    Trainer
      <div class="ring one"></div>
      <div class="ring two"></div>
      <div class="ring three"></div>
      <div class="ring four"></div>
   </div>
   
</div>
</a>
<a href="login-joiner.php"><div class="section one">
   <div id="button">
    Joiner
      <div class="ring one"></div>
      <div class="ring two"></div>
      <div class="ring three"></div>
      <div class="ring four"></div>
   </div>
   
</div>
</a>

</body>
