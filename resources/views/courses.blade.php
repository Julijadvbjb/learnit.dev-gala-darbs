<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Learn It</title>
</head>

<body>
<nav class="navbar">
        <div class="navbar__container">
            <a href="#home" id="navbar__logo"> Learn:It </a>
            <div class="navbar__toggle" id="mobile-menu">
              <span class="bar"></span>
              <span class="bar"></span>
              <span class="bar"></span>
            </div>
            <ul class="navbar__menu">
                <li class="navbar__item">
                    <a href="#home" class="navbar__links"  id="home-page">HOME</a>
                </li>
                <li class="navbar__item">
                    <a href="#about" class="navbar__links"  id="about-page">ABOUT US</a>
                </li>
                <li class="navbar__item">
                    <a href="#courses" class="navbar__links"  id="course--page">COURSES</a>
                </li>
                <li class="navbar__btn">
                    <a href="#sign-up" class="button"  id="signup">SIGN UP</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="hero" id="home">
        <div class="hero__container">
            <h1 class="hero__heading">Learn:<span id="learn"> It </span></h1>
        </div>
    </div>
    <div class="main" id="about">
        <div class="main__container">
            <div class="main__img--container">
                 <div class="main__img--card"> <img src="https://i.pinimg.com/originals/ee/14/96/ee149627f473d3e788d5f8d8ca057645.jpg" alt="Learn it Poster" style="width:550px;height:470px;" class="responsive"></div> 
            </div>
            <div class="main__content">
                <h1><i> Learn anything, learn now !</i></h1>
                <h2>Learn:It </h2>
                  <p class="text"><STRONG>Learn: It</STRONG> is free learning platform with many courses on many topics. Want to level-up your skills and become better? Join us and learn anything for free!<br><br>
               
                    <!-- <span class="moreText"> Hunting for sport is child’s play. This is a different kind of game, one with high stakes and even higher rewards. You will face creatures that want to gorge themselves on your flesh and devour your soul.
                    Everything and everyone is against you—even the earth itself. Make one mistake, and you will die in filth, forgotten. Succeed, and the bounty and the glory will be immense.
                    </span> </p> -->
                    <!-- <button class="read-more-btn">Read more</button> -->
            </div>
        </div>
    </div>
    <h1>Courses</h1>
    @if (count($courses) == 0)
        <p class='error'>There are no available courses!</p>
    @else
        <ul>

            @foreach ($courses as $course)
                <li>
                    {{ $course->name }}
                </li>
            @endforeach

        </ul>
    @endif
</body>

</html>