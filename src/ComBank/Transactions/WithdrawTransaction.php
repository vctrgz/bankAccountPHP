<?php namespace ComBank\Transactions;

/**
 * Created by VS Code.
 * User: JPortugal
 * Date: 7/28/24
 * Time: 1:22 PM
 */

use ComBank\Bank\Contracts\BankAccountInterface;
use ComBank\Exceptions\InvalidOverdraftFundsException;
use ComBank\Transactions\Contracts\BankTransactionInterface;

class WithdrawTransaction implements BankTransactionInterface
{
    public float $withdraw;
    function __construct(float $withdraw){
    $this->withdraw = $withdraw;
    }
    function getWithdraw(): float {
        return $this->withdraw;
    }
    function getDeposit(): float{
        return 0;
    }
    }
