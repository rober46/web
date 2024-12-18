<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class RegistrarClienteTest extends TestCase
{
    private $client;

    protected function setUp(): void
    {
        $this->client = new Client(['base_uri' => 'http://localhost/representaciones_guess_eirl/']);
    }

    public function testSuccessfulClientRegistration()
    {
        // Simula el envío de un formulario con datos correctos
        $response = $this->client->post('controlador/controlador_registrar_cliente.php', [
            'form_params' => [
                'btnregistrar' => true,
                'txtnombre' => 'Prueba Cliente' . time(),
                'txtcorreo' => uniqid() . '@example.com',
                'txttelefono' => '987654321',
                'txtdireccion' => 'Calle Falsa 123',
                'txtfecharegistro' => '2024-01-01 00:00:00',
            ],
        ]);

        $body = (string) $response->getBody();

        // Verifica que el cuerpo de la respuesta contiene el texto esperado
        $this->assertStringContainsString('El cliente se ha registrado correctamente', $body, 'El registro no fue exitoso.');
    }
}
