<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css')  }}">
    <style>
/*!
 * Start Bootstrap - Simple Sidebar (https://startbootstrap.com/templates/simple-sidebar)
 * Copyright 2013-2020 Start Bootstrap
 * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-simple-sidebar/blob/master/LICENSE)
 */

 #wrapper {
    overflow-x: hidden;
 }

#sidebar-wrapper {
  min-height: 100vh;
  margin-left: -15rem;
  -webkit-transition: margin .25s ease-out;
  -moz-transition: margin .25s ease-out;
  -o-transition: margin .25s ease-out;
  transition: margin .25s ease-out;
}

#sidebar-wrapper .sidebar-heading {
  padding: 0.875rem 1.25rem;
  font-size: 1.2rem;
}

#sidebar-wrapper .list-group {
  width: 15rem;
}

#page-content-wrapper {
  min-width: 100vw;
}

#wrapper.toggled #sidebar-wrapper {
  margin-left: 0;
}

@media (min-width: 768px) {
  #sidebar-wrapper {
    margin-left: 0;
  }

  #page-content-wrapper {
    min-width: 0;
    width: 100%;
  }

  #wrapper.toggled #sidebar-wrapper {
    margin-left: -15rem;
  }
}

        a:hover{
            text-decoration: none;
        }

    .vertical-nav {
        z-index: 100000;
        top: 55px !important;
        min-width: 17rem;
        width: 17rem;
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.1);
        transition: all 0.4s;
    }

    .page-content {
        width: calc(100% - 17rem);
        margin-left: 17rem;
        transition: all 0.4s;
    }

    /* for toggle behavior */

    #sidebar.active {
        margin-left: -17rem;
    }

    #content.active {
        width: 100%;
        margin: 0;
    }

    /*image*/




    .texts {
        margin-left: 10px;
        margin-top: 8px;
        letter-spacing: 2px;
        font-size: 70%;
    }

    .imgnb {
        width: 30px;
        margin: 0px;
        padding-bottom: 10px;

    }

    @media (max-width: 768px) {
        #sidebar {

            margin-left: -17rem;
        }

        #sidebar.active {
            margin-left: 0;
        }

        #content {
            width: 100%;
            margin: 0;
        }

        #content.active {
            margin-left: 17rem;
            width: calc(100% - 17rem);
        }

        .dropbutton {
            border: none !important;
        }
    }

    </style>


</head>
<body>
    <div class="container-fluid">
                @include('admin.includes.header')
    </div>












    <script src="{{ asset('js/app.js')  }}"> </script>
</body>
</html>
