<?php
$loginUrl = "http://seu-thingsboard-url.com/api/auth/login";

// Credenciais de login
$data = array(
    'username' => 'seu_usuario',
    'password' => 'sua_senha'
);

// Inicializando curl
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => $loginUrl,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => json_encode($data),
    CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json"
    ),
));

$response = curl_exec($curl);
curl_close($curl);

// Decodificar o token de autenticação
$authData = json_decode($response, true);
$authToken = $authData['token']; // Esse é o token que será utilizado nas requisições futuras

echo "Token de autenticação: $authToken";
?>
