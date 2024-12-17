<?php namespace ComBank\Transactions;

/**
 * Created by VS Code.
 * User: JPortugal
 * Date: 7/28/24
 * Time: 11:30 AM
 */

use ComBank\Bank\Contracts\BankAccountInterface;
use ComBank\Transactions\Contracts\BankTransactionInterface;

class DepositTransaction implements BankTransactionInterface
{
public float $deposit;
function __construct(float $deposit){
$this->deposit = $deposit;
}
function getDeposit(): float{
    return $this->deposit;
}
function getWithdraw(): float {   
    return 0;
}
}
