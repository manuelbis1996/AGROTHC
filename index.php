    <?php include("template/header.php"); ?>
    
    <style>
    body {
            background-color: #f8f9fa;
        }
        .jumbotron {
            background-color: #e9ecef;
            padding: 2rem;
        }
    </style>
</head>
<body>
    
    <div class="container mt-5">
        <div class="jumbotron text-center">
            <h1 class="display-4">¡Bienvenido al sistema!</h1>
            <p class="lead">Usuario : <?php echo $_SESSION["usuario"]; ?></p>
        </div>
    </div>


    <?php include("template/footer.php"); ?>