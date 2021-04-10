<?php
session_start(); 
function alert()
{ 
    if(isset($_SESSION['msg']) && $_SESSION['msg'] != ''){       
        $mensagem = explode('#',$_SESSION['msg']);
        unset($_SESSION['msg']);
        return '<div class="alert alert-'.$mensagem[1].'"><i class="fa fa-bullhorn  "></i> '.$mensagem[0].'</div>';
    }
}
