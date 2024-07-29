<?php

return match ($inc) {
    'add-to-cart' => function () {
        $product = json_decode(file_get_contents("php://input"));
        addToCart($product->id);

        echo json_encode(getCart());
    },
    'send-contact' => function () {
        $name = strip_tags($_POST['name']);
        $email = strip_tags($_POST['email']);
        $subject = strip_tags($_POST['subject']);
        $message = strip_tags($_POST['message']);

        $sent = send($email, 'guilherme.sousa009@hotmail.com', $name, $subject, $message);

        if($sent){
            setFlash('mail', 'Email enviado com sucesso', 'color:green');
            return redirect('?inc=contact');
        }
        setFlash('mail', 'Ocorreu um erro ao enviar e-mail','color:red');
        return redirect('?inc=contact');
    },
    'login' => function(){
        var_dump('login');
    },
    default => function () {
    }
};
