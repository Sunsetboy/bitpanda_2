<?php


namespace App\Repositories;

/**
 * Class for working with transactions data in stored in the CSV file
 */
class TransactionsRepositoryCSV implements TransactionsRepositoryInterface
{
    /**
     * Path to the file with data
     * @return string
     */
    private function getCSVpath(): string
    {
        return __DIR__ . '/../../database/csv/transactions.csv';
    }

    /**
     * @return array
     */
    public function getList(): array
    {
        $transactions = [];

        $row = 0;
        $keys = [];

        if (($handle = fopen($this->getCSVpath(), "r")) !== false) {
            while (($parsedString = fgetcsv($handle)) !== false) {
                if ($row == 0) {
                    // keys are in the first line of a file
                    $keys = $parsedString;
                } else {
                    $transactionData = [];
                    foreach ($parsedString as $key => $value) {
                        $transactionData[$keys[$key]] = $value;
                    }
                    $transactions[] = $transactionData;
                }
                $row++;
            }
            fclose($handle);
        }

        return $transactions;
    }
}
