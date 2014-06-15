<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CP Titan</title>

    <!-- Bootstrap Core CSS -->
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"> -->
    {{HTML::style('css/bootstrap.min.css')}}
    {{HTML::style('css/scrolling-nav.css')}}

    <!-- Custom CSS -->
    <!-- <link href="css/scrolling-nav.css" rel="stylesheet" type="text/css"> -->

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

                    @if(Auth::check())
                    <li class="page-scroll">
                        <a href="#login">Homeworks</a>
                    </li>
                    <li class="page-scroll">
                        <a href="{{URL::to('logout')}}">Logout</a>
                    </li>
                    @else
                    <li class="page-scroll">
                        <a href="#login">Login</a>
                    </li>    
                    @endif
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
                    @if(Session::has('message'))
                        {{ Session::get('message') }}
                    @endif
                    @if($errors->has())
                      <div class="alert alert-danger">  
                      @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                      @endforeach
                      </div>
                    @endif
                    <div class="page-scroll">
                        <a class="btn btn-default" href="#login">Login</a>
                    </div>
                    <br>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                </div>
            </div>
        </div>
    </section>

    @if(!Auth::check())
    <section id="login" class="login-section">
        <div class="container">
            <div class="row login">
                <div class="col-sm-12">
                    <h1>Enter your credentials</h1>
                </div>

            </div>
            {{ Form::open(array('url'=>'user/login', 'method' => 'POST', 'class'=>'form-horizontal')) }}
                <div class="form-group">
                {{ Form::label('email', 'Email', array('class' => 'control-label col-sm-4')) }}
                    <div class="col-sm-4">
                    {{ Form::email('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address')) }}
                    </div>
                </div>
                <div class="form-group">
                {{ Form::label('password', 'Password', array('class' => 'control-label col-sm-4')) }}
                    <div class="col-sm-4">
                        {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
                    </div>   
                    <a style="margin-left: 410px; font-size: 12px; margin-top: 10px;" href="#registerModal" data-toggle="modal" data-target="#registerModal">Create New Account</a>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                    {{ Form::submit('Login', array('class'=>'btn btn-large btn-info')) }}
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </section>    
    @else
    <section id="login" class="intro-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1>You are logged in</h1>
                    <div class="page-scroll">
                        <a class="btn btn-default" href="{{URL::to('homeworks')}}">Go to Homeworks!</a>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </section>
    @endif

    <section id="about" class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>About Us</h1>
                </div>
                <br>
                <p>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
            </div>
        </div>
    </section>

    <section id="contact" class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Contact Us</h1>
                </div>
                <br>
                <p>Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>
            </div>
        </div>
    </section>

    <!-- Register Modal -->
    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="registerLabel">Please Register</h4>
          </div>
          <div class="modal-body">
            {{ Form::open(array('url'=>'user/register', 'method' => 'POST', 'class'=>'form-horizontal')) }}
                <div class="form-group">
                {{ Form::label('firstname', 'First Name', array('class' => 'control-label col-sm-4')) }}
                    <div class="col-sm-5">
                    {{ Form::text('firstname', null, array('class'=>'form-control', 'placeholder'=>'First Name')) }}
                    </div>
                </div>
                <div class="form-group">
                {{ Form::label('lastname', 'Last Name', array('class' => 'control-label col-sm-4')) }}
                    <div class="col-sm-5">
                    {{ Form::text('lastname', null, array('class'=>'form-control', 'placeholder'=>'Last Name')) }}
                    </div>
                </div>
                <div class="form-group">
                {{ Form::label('email', 'Email', array('class' => 'control-label col-sm-4')) }}
                    <div class="col-sm-5">
                    {{ Form::email('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address')) }}
                    </div>
                </div>
                <div class="form-group">
                {{ Form::label('password', 'Password', array('class' => 'control-label col-sm-4')) }}
                    <div class="col-sm-5">
                        {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
                    </div>   
                </div>
                <div class="form-group">
                    
                {{ Form::label('password_confirmation', 'Confirm Password', array('class' => 'control-label col-sm-4')) }}
                    <div class="col-sm-5">
                        {{ Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>'Retype Password')) }}
                    </div>   
                </div>
            </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Register</button>
            {{Form::close()}}  
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- /Register Modal -->

    <!-- Core JavaScript Files -->
    {{HTML::script('js/jquery-1.10.2.js')}}
    {{HTML::script('js/bootstrap.min.js')}}
    {{HTML::script('js/jquery.easing.min.js')}}

    <!-- Custom Theme JavaScript -->
    {{HTML::script('js/scrolling-nav.js')}}

</body>

</html>
