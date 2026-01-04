</div>



<script type="text/javascript" src="../js/jquery.js"></script>
<link rel="stylesheet" href="../css/bootstrap.min.css?ver=1<?php echo date('l jS \of F Y h:i:s A'); ?>">

<script type="text/javascript" src="../js/bootstrap.min.js"></script>


<link rel="stylesheet" href="../css/effects.css?ver=1<?php echo date('l jS \of F Y h:i:s A'); ?>">

<link rel="stylesheet" href="../css/normalize.css?ver=1<?php echo date('l jS \of F Y h:i:s A'); ?>">
<link rel="stylesheet" href="../css/styles.css?ver=1<?php echo date('l jS \of F Y h:i:s A'); ?>">
<link rel="stylesheet" href="../css/toastr.css?ver=1<?php echo date('l jS \of F Y h:i:s A'); ?>">
<script type="text/javascript" src="../js/toastr.min.js"></script>


<script>

    $(document).ready(function () {
        $("#loader").fadeOut();

        $("#alertacontato").hide();

    });

    $('#enviar_msg').on('click', function (e) {
        e.preventDefault();


        $nome = $('#nome').val();
        $telefone = $('#telephone').val();
        $email = $('#exampleInputEmail').val();
        $msg = $('#description').val();

        console.log($nome);


        $.ajax({
            method: "POST",
            url: "send.php",
            data: {nome: $nome, telefone: $telefone, email: $email, msg: $msg},
            beforeSend: function (xhr) {
                $("#loader").show();
                $("#exampleModalCenter").fadeOut();
            }
        })
            .done(function (data) {

                $("#alertacontato").show();
                $("#loader").fadeOut();

                var delay = 1000;
                setTimeout(function () {
                    // your code
                }, delay);
                // window.location="home.php";
            });

    });


</script>


</body>

</html>