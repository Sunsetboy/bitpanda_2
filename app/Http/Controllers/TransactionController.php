<?php

namespace App\Http\Controllers;

use App\Repositories\TransactionsRepository;
use App\Repositories\TransactionsRepositoryCSV;
use App\Repositories\TransactionsRepositoryDb;

class TransactionController extends Controller
{
    /**
     * Returns a list of transactions
     */
    public function getList()
    {
        // could be done with dependency injection
        $transactionsRepository = new TransactionsRepository([
            new TransactionsRepositoryDb(),
            new TransactionsRepositoryCSV(),
        ]);

        $transactions = $transactionsRepository->getList();

        return response()->json($transactions);
    }
}
