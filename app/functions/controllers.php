<?php
require BASE . '/app/functions/cart.php';
require BASE . '/app/functions/mail.php';
require BASE . '/app/functions/redirect.php';

$inc = $_REQUEST['inc'] ?? 'home';

return match ($inc) {
    'home' => function () {
        // session_destroy();
        $data = get('products');
        return ['products' => $data, 'title' => 'Home'];
    },
    'details' => function () {
        $id = strip_tags(($_GET['id']));

        where('id', '=', $id);
        $product = first('products');

        return ['product' => $product];
    },
    'get-products' => function () {
        echo json_encode(getCart());
    },
    'add-to-cart' => function () {
        $product = json_decode(file_get_contents("php://input"));
        addToCart($product->id);

        echo json_encode(getCart());
    },
    'contact' => function () {
        var_dump('contact');
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
    default => function () {
    }
};
