<?php

declare(strict_types = 1);

// Your Code
function getTransactionFiles(string $dirPath): array
{
    $files = [];

    foreach (scandir($dirPath) as $file) {
        if (is_dir($file)) {
            continue;
        }
        $files[] = $dirPath . $file;
    }
    return $files;
}

function getTransactions(string $fileName): array
{
    if (!file_exists($fileName)) {
        trigger_error("File not found: " . $fileName, E_USER_ERROR);
    }
    $file = fopen($fileName, "r");
    fgetcsv($file);

    $transactions = [];
    while(($transaction = fgetcsv($file)) !== false) {
        $transactions[] = extractTransaction($transaction);
    }
    return $transactions;
}

function extractTransaction(array $transactionRow): array
{
    $date = $transactionRow[0] ?? null;
    $checkNumber = $transactionRow[1] ?? null;
    $description = $transactionRow[2] ?? null;
    $amount = $transactionRow[3] ?? null;
    $amount = (float) str_replace(['$',','], '', $amount);
    return[
        'date' => $date,
        'checkNumber' => $checkNumber,
        'description' => $description,
        'amount' => $amount,
    ];
}

function calculateTotals(array $transactions): array
{
    $totals = ['netTotal' => 0, 'totalIncome' => 0, 'totalExpense' => 0 ];
    foreach ($transactions as $transaction) {
        $totals['netTotal'] += $transaction['amount'];
        if ($transaction['amount'] >= 0){
            $totals['totalIncome'] += $transaction['amount'];
        } else {
            $totals['totalExpense'] += $transaction['amount'];
        }
    }

    return $totals;
}