<?php


namespace App\Repositories;


class TransactionsRepository
{
    /** @var TransactionsRepositoryInterface[] */
    private $repositories;

    public function __construct(array $repositories)
    {
        $this->repositories = $repositories;
    }

    /**
     * Returns a combined array of transactions
     * @return array
     */
    public function getList(): array
    {
        $transactions = [];

        foreach ($this->repositories as $repository) {
            $transactions = array_merge($transactions, $repository->getList());
        }

        return $transactions;
    }
}
