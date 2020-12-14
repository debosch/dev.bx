<?php

use \PHPUnit\Framework\TestCase;

require_once(__DIR__.'/../lib/PubSubTask.php');

class PubSubTaskTest extends TestCase
{
    public function testOrder()
    {
        $event = new Event();
        $order = new Order($event);
        $order->save();
        $orderNumber = $order->getNumber();
        self::expectOutputString("Order number {$orderNumber} was saved\n");
        self::assertEquals($orderNumber, $order->getNumber());
    }

    public function testTelegramSender()
    {
        $sender = new TelegramSender();
        $sender->send("testTelegramMessage");
        self::expectOutputString("Message was sent via telegram: testTelegramMessage\n");
    }

    public function testEmailSender()
    {
        $sender = new EmailSender();
        $sender->send("testEmailMessage");
        self::expectOutputString("Message was sent via e-mail: testEmailMessage\n");
    }

    public function testEvent()
    {
        $telegramSender = new TelegramSender();
        $emailSender = new EmailSender();

        $event = new Event();
        $event->subscribe(
            Order::EVENT_ON_SAVE,
            function(Order $order) use ($telegramSender, $emailSender)
            {
                $telegramSender->send('order №'.$order->getNumber()." saved");
                $emailSender->send('order №'.$order->getNumber()." saved");
            }
        );

        $order = new Order($event);
        $order->save();
        $orderNumber = $order->getNumber();
        self::expectOutputString(
            "Order number {$orderNumber} was saved\n".
            "Message was sent via telegram: order №{$orderNumber} saved\n".
            "Message was sent via e-mail: order №{$orderNumber} saved\n"
        );

    }
}
