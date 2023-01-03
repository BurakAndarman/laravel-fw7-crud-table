<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, viewport-fit=cover">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#2196f3">
    <title>Öğrenci Uygulaması</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/framework7@7.0.8/framework7-bundle.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/framework7-icons@5.0.5/css/framework7-icons.css">
    <style>
      .search-button{
        margin-top:1.5em;
      }
      .input{
        width:130px;
      }
      .page-number{
        font-size:medium;
        margin:0 4px;
      }
      .page-links{
        font-size:20px;
      }
      .current-page{
        font-weight:bold;
      }
    </style>
  </head>
  <body>
    <div id="app">
      <div class="view view-main display-flex align-items-center flex-direction-column margin-top">
          @yield('students')
      </div>
    </div>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/framework7@7.0.8/framework7-bundle.min.js"></script>
    <script>
        var app = new Framework7({
        el: '#app',
        name: 'Öğrenci Uygulaması'
        });    
        var mainView = app.views.create('.view-main');
    </script>
  </body>
</html>