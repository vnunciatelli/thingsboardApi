<?php

// Configurações da URL do ThingsBoard e deviceId
$thingsboardUrl = "http://seu-thingsboard-url.com/api/plugins/telemetry/DEVICE/{deviceId}/values/timeseries";

// Token de autenticação (Bearer Token)
$authToken = 'Bearer seu_token_de_autenticacao';

// Device ID (substitua pelo ID real do dispositivo)
$deviceId = "seu_device_id";

// Variáveis específicas que você deseja consultar (por exemplo, "temperature" e "humidity")
$keys = "temperature,humidity";

// Defina o intervalo de tempo (timestamps em milissegundos)
$startTs = strtotime('2024-10-01 00:00:00') * 1000; // Exemplo de data de início
$endTs = strtotime('2024-10-03 23:59:59') * 1000;   // Exemplo de data de fim

// Monta a URL com os parâmetros (chaves e intervalo de tempo)
$urlWithParams = str_replace("{deviceId}", $deviceId, $thingsboardUrl) . "?keys=$keys&startTs=$startTs&endTs=$endTs";

// Inicializando a requisição curl
$curl = curl_init();

// Configurando as opções da requisição
curl_setopt_array($curl, array(
    CURLOPT_URL => $urlWithParams,
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
    print_r($telemetryData); // Mostra os dados de telemetria filtrados
}

// Fechando a conexão curl
curl_close($curl);
?>
