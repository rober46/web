<?php

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class ChatbotApiTest extends TestCase
{
    private $client;

    protected function setUp(): void
    {
        $this->client = new Client(['base_uri' => 'http://localhost/representaciones_guess_eirl/']);
    }

    public function testChatbotApiReturnsValidUrl()
    {
        // Realiza una solicitud POST al script chatbot.php
        $response = $this->client->post('controlador/chatbot_test.php');

        // Verifica que el código de estado HTTP sea 200
        $this->assertEquals(200, $response->getStatusCode(), 'La solicitud no fue exitosa.');

        // Obtiene el cuerpo de la respuesta
        $body = $response->getBody(); // Convierte el cuerpo de la respuesta a un string

        // Verifica que la URL devuelta no esté vacía
        $this->assertNotEmpty($body, 'La API devolvió una URL vacía.');

        // Muestra la respuesta en la consola
        echo "Respuesta de la API: [" . $body . "]\n";
    }
}
