<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Web3\Web3;


class Web3Controller extends Controller
{
    //
    public $rpc_url = "https://mainnet.infura.io/v3/5f464cf7a2014203a4176d921a79279d";
    public $web3;
    public function __construct(){
        $this->web3 = new Web3($this->rpc_url);
    }

    public function FrontendWalletConnect(){
        //$accounts =  $web3->eth()->accounts();
        return view('frontend');

        //return view($this->web3);
    }

    public function GetBalance(Request $request){
        $account = $request->get('wallet');
         $balance = $this->web3->eth()->getBalance($account)->toEth();
        return view('backend', ['balance' => $balance]);
    }

    public function BackendWalletConnect(){
        return view('backend',['balance' => 0]);
    }
}
