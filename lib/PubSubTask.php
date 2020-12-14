<?php

class Order
{
	protected $number;

	private $event;

	public const EVENT_ON_SAVE = "onSave";

	public function __construct(Event $event)
	{
		$this->number = rand(10000, 20000);
		$this->event = $event;
	}

	public function save(): void
	{
		echo "Order number {$this->number} was saved\n";
		$this->event->dispatch(self::EVENT_ON_SAVE, $this);
	}

	public function getNumber(): string
	{
		return $this->number;
	}
}

class TelegramSender
{
	public function send($message): void
	{
		echo "Message was sent via telegram: {$message}\n";
	}
}

class EmailSender
{
	public function send($message): void
	{
		echo "Message was sent via e-mail: {$message}\n";
	}
}

class Event
{
    protected $subscribers = [];

    public function subscribe(string $eventType, callable $eventHandler): void
    {
        if (!isset($this->subscribers[$eventType]))
        {
            $this->subscribers[$eventType] = [];
        }
        $this->subscribers[$eventType][] = $eventHandler;
    }

    public function dispatch(string $eventType, $data): void
    {
        if (is_array($this->subscribers[$eventType]))
        {
            foreach($this->subscribers[$eventType] as $eventHandler)
            {
                $eventHandler($data);
            }
        }
    }
}

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

/*
 * Необходимо воспользоваться шаблоном проектирования "Издатель подписчик"
 * Чтобы при каждом сохранении заказа
 * $order->save();
 * сообщения об этом отправлялись через
 * TelegramSender и EmailSender
 */