<?php namespace ComBank\Bank;

/**
 * Created by VS Code.
 * User: JPortugal
 * Date: 7/27/24
 * Time: 7:25 PM
 */

use ComBank\Exceptions\BankAccountException;
use ComBank\Exceptions\InvalidArgsException;
use ComBank\Exceptions\ZeroAmountException;
use ComBank\OverdraftStrategy\NoOverdraft;
use ComBank\Bank\Contracts\BankAccountInterface;
use ComBank\Exceptions\FailedTransactionException;
use ComBank\Exceptions\InvalidOverdraftFundsException;
use ComBank\OverdraftStrategy\Contracts\OverdraftInterface;
use ComBank\Support\Traits\AmountValidationTrait;
use ComBank\Transactions\Contracts\BankTransactionInterface;

class BankAccount implements BankAccountInterface
{
    public float $balance;
    public String $status;
    public OverdraftInterface $overdraft;
    function __construct(float $balance){
        $this->balance = $balance;
        $this->status = self::STATUS_OPEN;
    }
    function transaction (BankTransactionInterface $parametro) {
        $this->balance += $parametro->getDeposit();
        if ($this->balance - $parametro->getWithdraw() < $this->getOverdraft()->getOverdraft()) {
            echo "Error, cannot complete transaction because of amount is exceding overdraft";
        }else {
            $this->balance -= $parametro->getWithdraw();
        }
    }
    function isOpen() : bool {
        if ($this->status === self::STATUS_OPEN) {
            echo $this->status."<br>";
            return true;
        }else if ($this->status === self::STATUS_CLOSED) {
            echo $this->status."<br>";
            return false;
        }else {
            echo "Error with the account status<br>";
            return false;
        }
    }
    function reopenAccount () : void {
        if ($this->status === self::STATUS_OPEN) {
            echo "Account is already open<br>";
        }else if ($this->status === self::STATUS_CLOSED) {
            $this->status = self::STATUS_OPEN;
            echo $this->status."<br>";
        }
    }
    function closeAccount() : void {
        if ($this->status === self::STATUS_CLOSED) {
            echo "Account is already closed<br>";
        }else if ($this->status === self::STATUS_OPEN) {
            $this->status = self::STATUS_CLOSED;
            echo $this->status."<br>";
        }
    }
    function getBalance() : float {
        return $this->balance;
    }
    function setBalance(float $parametro) : void {
        $this->balance = $parametro;
    }
    function getOverdraft() : OverdraftInterface {
        return $this->overdraft;
    }
    function applyOverdraft(OverdraftInterface $parametro) : void {
        $this->overdraft = $parametro;
    }
}

