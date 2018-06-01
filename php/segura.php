<?php


    // Verificar se foi enviando dados via POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $texto = filter_input(INPUT_POST, 'texto');

        if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "c" && $texto != "") {
            echo Encriptar($texto, "123456");

        } else if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "d" && $texto != "") {
            echo Desencriptar($texto, "123456");
        } else {
            echo "Nada Critografado...";
        }

    }

    function Randomizar($iv_len)
    {
        $iv = '';
        while ($iv_len-- > 0) {
            $iv .= chr(mt_rand() & 0xff);
        }
        return $iv;
    }
    
    function Encriptar($texto, $senha, $iv_len = 16)
    {
        $texto .= "x13";
        $n = strlen($texto);
        if ($n % 16) $texto .= str_repeat("", 16 - ($n % 16));
        $i = 0;
        $Enc_Texto = Randomizar($iv_len);
        $iv = substr($senha ^ $Enc_Texto, 0, 512);
        while ($i < $n) {
            $Bloco = substr($texto, $i, 16) ^ pack('H*', md5($iv));
            $Enc_Texto .= $Bloco;
            $iv = substr($Bloco . $iv, 0, 512) ^ $senha;
            $i += 16;
        }
        return base64_encode($Enc_Texto);
    }
    
    function Desencriptar($Enc_Texto, $senha, $iv_len = 16)
    {
        $Enc_Texto = base64_decode($Enc_Texto);
        $n = strlen($Enc_Texto);
        $i = $iv_len;
        $texto = '';
        $iv = substr($senha ^ substr($Enc_Texto, 0, $iv_len), 0, 512);
        while ($i < $n) {
            $Bloco = substr($Enc_Texto, $i, 16);
            $texto .= $Bloco ^ pack('H*', md5($iv));
            $iv = substr($Bloco . $iv, 0, 512) ^ $senha;
            $i += 16;
        }
        return preg_replace('/x13/', '', $texto);
    }
 
?>