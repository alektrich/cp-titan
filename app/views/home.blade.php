<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CP Titan</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="css/scrolling-nav.css" rel="stylesheet" type="text/css">

</head>

<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <nav class="navbar navbar-default navbar-fixed-top cp-navigation" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#page-top">CP TITAN</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="#login">Login</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#about">About</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <section id="intro" class="intro-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>CP TITAN</h1>
                    <div class="page-scroll">
                        <a class="btn btn-default" href="#login">Login as Teacher</a>
                    </div>
                    <br>
                    <p>CloudPlus Titan - a few words about the project goes here.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="login" class="login-section">
        <div class="container">
            <div class="row login">
                <div class="col-sm-12">
                    <h1>Enter your credentials</h1>
                </div>

            </div>
            {{ Form::open(array('url'=>'dashboard', 'method' => 'POST', 'class'=>'form-horizontal')) }}
                <div class="form-group">
                {{ Form::label('email', 'Email', array('class' => 'control-label col-sm-4')) }}
                    <div class="col-sm-4">
                    {{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address')) }}
                    </div>
                </div>
                <div class="form-group">
                {{ Form::label('password', 'Password', array('class' => 'control-label col-sm-4')) }}
                    <div class="col-sm-4">
                        {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
                    </div>   
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                    {{ Form::submit('Login', array('class'=>'btn btn-large btn-info'))}}
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </section>

    <section id="about" class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>About Us</h1>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Contact Us</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Core JavaScript Files -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/scrolling-nav.js"></script>

</body>

</html>
