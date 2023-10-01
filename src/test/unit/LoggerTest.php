<?php

use PHPUnit\Framework\TestCase;
use twid\logger\Logger;

class LoggerTest extends TestCase
{
    /** @var Logger */
    private $logger;

    protected function setUp(): void
    {
        parent::setUp();
        echo $this->app->basePath();
        $this->logger = new Logger('test-channel');
    }

    /** @test */
    public function it_logs_a_message()
    {
        $result = $this->logger->log('Test message', ['key' => 'value']);

        $this->assertTrue($result);
        // Add more assertions based on your package's behavior
    }

    /** @test */
    public function it_throws_exception_if_channel_configuration_not_found()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Channel configuration for 'nonexistent-channel' not found. Please check logging.php");

        new Logger('nonexistent-channel');
    }

    /** @test */
    public function it_masks_sensitive_fields()
    {
        $data = ['password' => 'secret', 'credit_card' => '1234567890123456'];
        $maskedData = $this->logger->maskFields($data);

        $this->assertEquals(['password' => '********', 'credit_card' => '************3456'], $maskedData);
    }

    /** @test */
    public function it_retrieves_metadata_from_request()
    {
        // Mocking $_REQUEST for testing
        $_REQUEST = ['user_id' => 123, 'ip_address' => '127.0.0.1'];

        $metadata = $this->logger->metadata();

        $this->assertEquals(['user_id' => 123, 'ip_address' => '127.0.0.1'], $metadata);
    }

    /** @test */
    public function it_logs_with_metadata()
    {
        // Mocking $_REQUEST for testing
        $_REQUEST = ['user_id' => 123, 'ip_address' => '127.0.0.1'];

        $result = $this->logger->log('Test message with metadata');

        $this->assertTrue($result);
        // Add more assertions based on your package's behavior
    }

    // Add more test methods for other functionalities

    protected function tearDown(): void
    {
        // Add any cleanup code here
        parent::tearDown();
    }
}
