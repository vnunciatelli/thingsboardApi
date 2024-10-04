Para ler informações de um dispositivo no ThingsBoard pela API de integração, você pode utilizar a API REST do ThingsBoard para acessar dados de telemetria ou atributos do dispositivo. Aqui está um exemplo de como fazer isso usando PHP, onde o código obtém as últimas informações de telemetria de um dispositivo específico.

Passos para rodar o código:
Token de Autenticação: Antes de executar, você precisa obter o token de autenticação (Bearer Token) da API ThingsBoard. Esse token pode ser obtido através do login API, enviando um POST com as credenciais do usuário.
ID do Dispositivo: Substitua {deviceId} pelo ID do dispositivo que você quer consultar.
URL do ThingsBoard: Troque http://seu-thingsboard-url.com pelo seu domínio do ThingsBoard.

Para filtrar por variáveis específicas e por um intervalo de datas na API do ThingsBoard, você pode fazer uma requisição de telemetria com parâmetros adicionais de chaves (keys) e intervalo de tempo. A API aceita parâmetros startTs (timestamp de início) e endTs (timestamp de fim), além de permitir que você especifique as chaves de telemetria que deseja consultar.

Explicação dos parâmetros:
keys: São as variáveis de telemetria que você deseja consultar. No exemplo, estou filtrando as variáveis temperature e humidity, mas você pode adicionar as chaves de qualquer variável que seu dispositivo enviar para o ThingsBoard.

startTs e endTs: Definem o intervalo de tempo em milissegundos desde 1970-01-01 (timestamp Unix). Utilize a função strtotime() do PHP para converter datas no formato Y-m-d H:i:s para esse formato de timestamp, multiplicando por 1000 para converter para milissegundos (já que a API espera esse formato).

Estrutura da URL gerada:
A URL gerada para a requisição será algo como:

http://seu-thingsboard-url.com/api/plugins/telemetry/DEVICE/seu_device_id/values/timeseries?keys=temperature,humidity&startTs=1696118400000&endTs=1696357199000

Exemplo de retorno:
A resposta que você receberá será um JSON com as séries temporais das variáveis especificadas. Exemplo:

{
  "temperature": [
    {
      "ts": 1696118400000,
      "value": "22.5"
    },
    {
      "ts": 1696118500000,
      "value": "22.7"
    }
  ],
  "humidity": [
    {
      "ts": 1696118400000,
      "value": "55"
    },
    {
      "ts": 1696118500000,
      "value": "54.8"
    }
  ]
}

Considerações:
Limites de consulta: A ThingsBoard pode impor limites de dados retornados, como número de registros ou intervalo máximo de tempo. Verifique a documentação da sua versão do ThingsBoard para ajustar conforme necessário.
Múltiplas variáveis: Se o dispositivo enviar muitas variáveis de telemetria, você pode adicionar mais chaves separadas por vírgula no parâmetro keys.
