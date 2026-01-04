

    $('#login_button').on('click', function (e) {
        e.preventDefault();


        $usuario = $('#usuario_text').val();
        $senha = $('#senha_text').val();


        $.ajax({
            method: "POST",
            cache: false,
            url: "validar_usuario.php",
            data: {usuario: $usuario, senha: $senha},
            beforeSend: function (xhr) {
                $("#loader").show();
            }
        })
            .done(function (data) {
                $("#loader").fadeOut();
                data = data.trim(" ");
                if(data === 'true'){
                    window.location="home.php";
                }else{
                    toastr.warning("Password ou senha incorreto");
                  //  toast.warning("Password ou senha incorreto");
                }
  
            });

    });
