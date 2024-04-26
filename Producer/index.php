<?php
session_start();
echo '

<!DOCTYPE html>
<html>

<head>
    <!-- Import Google Icon Font -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Import materialize.css -->
    <link type="text/css" rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"
        media="screen,projection" />

    <!-- Let browser know website is optimized for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
        ul.collection {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        li.collection-item {
            float: left;
        }

        li.collection-item a {
            display: block;
            text-align: center;
            padding: 5px 6px;
            text-decoration: none;
        }
    </style>
    <title>Message Form</title>
</head>

<body>
    <ul class="collection">
        <li class="collection-item"><a href="index.php">Send Message</a></li>
        <li class="collection-item"><a href="consumer.php">View Messages</a></li>
    </ul>';
if (isset($_SESSION['message'])) {
    echo '<div class="alert alert-success" role="alert">
    ' . $_SESSION['message'] . '</div>';
    unset($_SESSION['message']);
}
echo '<div class="container">
    <h2>Message Form</h2>

    <form action="send.php" method="post">
        <div class="input-field">
            <input id="email" type="text" name="email" class="validate">
            <label for="email">Message</label>
        </div>
        <button class="btn waves-effect waves-light" type="submit" name="action">Send message to kafka / pulsar with kafka protocol 
            <i class="material-icons right">send</i>
        </button>
    </form>
</div>

<!-- Import jQuery before materialize.js -->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>';
