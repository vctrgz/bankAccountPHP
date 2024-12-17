<?php namespace ComBank\Bank\Contracts;

/**
 * Created by VS Code.
 * User: JPortugal
 * Date: 7/27/24
 * Time: 7:26 PM
 */

use ComBank\Exceptions\BankAccountException;
use ComBank\Exceptions\FailedTransactionException;
use ComBank\OverdraftStrategy\Contracts\OverdraftInterface;
use ComBank\Transactions\Contracts\BankTransactionInterface;

interface BankAccountInterface
{
    const STATUS_OPEN = 'OPEN';
    const STATUS_CLOSED = 'CLOSED';
    const CURRENCY = '€';
    function transaction (BankTransactionInterface $parametro);
    function isOpen() : bool;
    function reopenAccount ();
    function closeAccount();
    function getBalance() : float;
    function getOverdraft() : OverdraftInterface;
    function applyOverdraft(OverdraftInterface $parametro);
    function setBalance(float $parametro);
}
