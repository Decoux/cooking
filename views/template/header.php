<?php  ?>
<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= $path ?>/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= $path ?>/assets/css/normalize.css">
  <link rel="stylesheet" href="<?= $path ?>/assets/css/main.css">
</head>

<body>
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <?php if (!isset($_SESSION['id'])) { ?>
            <li class="nav-item active">
              <a class="nav-link" href="<?= $path ?>/login">Se connecter</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= $path ?>/register">Inscription<span class="sr-only">(current)</span></a>
            </li>
            <?php 
          } ?>
            <?php if(isset($_SESSION['id'])){ ?>
              <li class="nav-item">
              <a class="nav-link" href="<?= $path ?>/recipe">Les recettes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= $path ?>/register_recipe">Enregistrer une recette</a>
            </li>
            <div class="d-flex justify-content-center">
              <a href="<?= $path ?>/logout" class="btn btn-danger">Déconnexion</a>
            </div>
            <?php } ?>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
    </header>
