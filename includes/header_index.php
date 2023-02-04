<?php
include("connection.php");
include("functions.php");
?>


    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="images/google-play-logo.png" alt="" width="180px" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active" style="width: 100%;">
                        <form action="search.php" method="get">
                <div class="input-group">
                    <input type="text" name="str" class="form-control" placeholder="Search" />
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="submit">
                        <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                </form>
                    </li>  
                </ul>
                <span class="navbar-text">
                    <a href="login.php" class="nav-item nav-link" style="background-color: #7386d5; color: #fff; border-radius: 10px; text-align: center;">Login</a>
                </span>
            </div>
        </div>
</nav>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>