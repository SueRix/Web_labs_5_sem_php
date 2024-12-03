<?php
require_once 'BankAccount.php';
require_once 'SavingsAccount.php';

try {
    // Тестування BankAccount
    $account = new BankAccount("USD", 100);
    echo "Початковий баланс: " . $account->getBalance() . PHP_EOL;

    $account->deposit(50);
    echo "Баланс після поповнення: " . $account->getBalance() . PHP_EOL;

    $account->withdraw(30);
    echo "Баланс після зняття: " . $account->getBalance() . PHP_EOL;

    // Тестування SavingsAccount
    $savings = new SavingsAccount("EUR", 200);
    echo "Початковий баланс (накопичувальний рахунок): " . $savings->getBalance() . PHP_EOL;

    $savings->applyInterest();
    echo "Баланс після застосування відсотків: " . $savings->getBalance() . PHP_EOL;

    $savings->withdraw(50);
    echo "Баланс після зняття: " . $savings->getBalance() . PHP_EOL;

    // Тестування некоректних операцій
    $savings->withdraw(500); // Недостатньо коштів
} catch (Exception $e) {
    echo "Помилка: " . $e->getMessage() . PHP_EOL;
}

try {
    $invalidAccount = new BankAccount("USD", -10); // Некоректний початковий баланс
} catch (Exception $e) {
    echo "Помилка при створенні рахунку: " . $e->getMessage() . PHP_EOL;
}
?>
