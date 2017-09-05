<?php
    if ($_POST) {
        include('wrap.class.php');
        $wrap = new Wrap($_POST['string'], $_POST['length']);
        $wrapped = $wrap->wrapped;
        die(json_encode(compact('wrapped')));
    }
?><!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="author" content="Suhaimi Amir">

        <title>Wrap that string!</title>

        <!-- Bootstrap core CSS -->
        <link href="bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <style>
            body {
                padding-top: 54px;
            }
            @media (min-width: 992px) {
                body {
                    padding-top: 56px;
                }
            }

            #main-body {
                margin-top: 20px;
            }
        </style>
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
          <div class="container">
            <a class="navbar-brand" href="#">Wrap that string!</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          </div>
        </nav>

        <div class="container" id="main-body">
          <div class="row">
            <div class="col-lg-6">
                <form>
                    <div class="form-group" id="form-string">
                        <label>String</label>
                        <input name="string" type="text" class="form-control" value="testing test one two three four">
                    </div>

                    <div class="form-group" id="form-length">
                        <label>Length</label>
                        <input name="length" type="number" class="form-control" value="10">
                    </div>

                    <div class="form-group" style="display:none" id="form-wrapped">
                        <label>Wrapped!</label>
                        <textarea name="wrapped" class="form-control" rows="5" disabled></textarea>
                    </div>

                    <button id="wrap-it" class="btn btn-primary">Wrap!</button>
                </form>
            </div>
          </div>
        </div>

        <script src="jquery.min.js"></script>
        <script>
            $(function() {
                $('#wrap-it').click(function(e) {
                    e.preventDefault();
                    $.post('index.php', $('form').serialize(), function(data) {
                        data = JSON.parse(data);
                        $('textarea[name="wrapped"]').val(data.wrapped);
                        $('#form-wrapped').show();
                    });
                });
            });
        </script>
    </body>
</html>
