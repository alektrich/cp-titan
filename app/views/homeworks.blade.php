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
                    <li class="page-scroll">
                        <a href="{{URL::to('/')}}">Home</a>
                    </li>
                    <li class="page-scroll">
                        <a href="{{URL::to('logout')}}">Logout</a>
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
                    <h1>Homeworks</h1>
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
                        <a class="btn btn-default btn-success" href="#homeworkModal" data-toggle="modal" data-target="#homeworkModal"><i class="glyphicon glyphicon-plus"></i> Add New Homework</a>
                    </div>
                    <br>
                    @if(isset($homeworks) && !empty($homeworks))
                        {{-- */$i=1;/* --}}
                        <div class="panel-group" id="accordion">
                        @foreach($homeworks as $homework)
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse-{{$homework->id}}">
                                  <strong>{{'#'.$i.') '.$homework->title}}</strong>
                                </a>
                              </h4>
                            </div>
                            <div id="collapse-{{$homework->id}}" class="panel-collapse collapse">
                              <div class="panel-body">
                                {{$homework->text}}
                              </div>
                              <p style="margin-left:15px;"><i>Posted at: {{$homework->created_at}}</i></p>
                            </div>
                          </div>
                          {{-- */$i++;/* --}}
                        @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Homework Modal -->
    <div class="modal fade" id="homeworkModal" tabindex="-1" role="dialog" aria-labelledby="homeworkLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="homeworkLabel">Add Homework</h4>
          </div>
          <div class="modal-body">
            {{ Form::open(array('url'=>'homeworks', 'method' => 'POST', 'class'=>'form-horizontal')) }}
                <div class="form-group">
                {{ Form::label('title', 'Homework title', array('class' => 'control-label col-sm-4')) }}
                    <div class="col-sm-5">
                    {{ Form::text('title', null, array('class'=>'form-control', 'placeholder'=>'Enter homework title')) }}
                    </div>
                </div>
                <div class="form-group">
                {{ Form::label('text', 'Text', array('class' => 'control-label col-sm-4')) }}
                    <div class="col-sm-5">
                    {{ Form::textarea('text', null, array('class'=>'form-control', 'placeholder'=>'Enter homework text')) }}
                    </div>
                </div>
            </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Post Homework</button>
            {{Form::close()}}  
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- /Homework Modal -->



    <!-- Core JavaScript Files -->
    {{HTML::script('js/jquery-1.10.2.js')}}
    {{HTML::script('js/bootstrap.min.js')}}
    {{HTML::script('js/jquery.easing.min.js')}}

    <!-- Custom Theme JavaScript -->
    {{HTML::script('js/scrolling-nav.js')}}

</body>

</html>
