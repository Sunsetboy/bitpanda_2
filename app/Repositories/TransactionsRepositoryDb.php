<?php


namespace App\Repositories;

use Illuminate\Support\Facades\DB;

/**
 * Class for working with transactions data in stored in the database
 */
class TransactionsRepositoryDb implements TransactionsRepositoryInterface
{
    public function getList(): array
    {
        return DB::table('transactions')
            ->get()
            ->toArray();
    }
}
