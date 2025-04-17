<?php

// Класс заказа
class Order {
    public $order_number;
    public $products;
    public $total_price;

    public function __construct() {
        $this->products = [];
    }

    // Метод для клонирования заказа (прототип)
    public function clone() {
        return clone $this;
    }
}

// Пример использования
$prototype_order = new Order();
$prototype_order->order_number = 1001;
$prototype_order->products = ["Product A", "Product B", "Product C"];
$prototype_order->total_price = 150.00;

// Создаем новый заказ на основе прототипа
$order1 = $prototype_order->clone();
$order1->order_number = 1002;  // Изменяем номер заказа
$order1->total_price = 200.00;  // Изменяем общую сумму заказа

// Создаем еще один новый заказ на основе прототипа
$order2 = $prototype_order->clone();
$order2->order_number = 1003;  // Изменяем номер заказа
$order2->products[] = "Product D";  // Добавляем новый товар

// Выводим информацию о заказах
echo "Order 1:\n";
echo "Order Number: " . $order1->order_number . "\n";
echo "Products: " . implode(", ", $order1->products) . "\n";
echo "Total Price: " . $order1->total_price . "\n";

echo "\nOrder 2:\n";
echo "Order Number: " . $order2->order_number . "\n";
echo "Products: " . implode(", ", $order2->products) . "\n";
echo "Total Price: " . $order2->total_price . "\n";

?>