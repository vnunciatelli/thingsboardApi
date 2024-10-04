<?php

// URL da API do ThingsBoard
$thingsboardUrl = "http://seu-thingsboard-url.com/api/plugins/telemetry/DEVICE/{deviceId}/values/timeseries";

// Token de autenticação (Bearer Token)
$authToken = 'Bearer seu_token_de_autenticacao';

// Device ID (substitua pelo ID real do dispositivo)
$deviceId = "seu_device_id";

// Inicializando a requisição curl
$curl = curl_init();

// Configurando as opções da requisição
curl_setopt_array($curl, array(
    CURLOPT_URL => str_replace("{deviceId}", $deviceId, $thingsboardUrl), // Substitui {deviceId} pela variável real
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json",
        "X-Authorization: $authToken" // Cabeçalho de autorização
    ),
));

// Executando a requisição e obtendo a resposta
$response = curl_exec($curl);

// Verificando se houve erros
if(curl_errno($curl)) {
    echo 'Erro: ' . curl_error($curl);
} else {
    // Exibindo a resposta
    $telemetryData = json_decode($response, true);
    print_r($telemetryData); // Mostra os dados de telemetria
}

// Fechando a conexão curl
curl_close($curl);
?>
