<?php

function decryptVigenere($ciphertext, $key) {
    $alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $decryptedText = "";
    $keyIndex = 0;
    $ciphertext = strtoupper($ciphertext);
    $key = strtoupper($key);

    for ($i = 0; $i < strlen($ciphertext); $i++) {
        $char = $ciphertext[$i];

        if (strpos($alphabet, $char) !== false) {
            $charIndex = strpos($alphabet, $char);
            $keyChar = $key[$keyIndex % strlen($key)];
            $keyIndex++;
            $keyCharIndex = strpos($alphabet, $keyChar);
            $decryptedCharIndex = ($charIndex - $keyCharIndex + strlen($alphabet)) % strlen($alphabet);
            $decryptedText .= $alphabet[$decryptedCharIndex];
        } else {
            $decryptedText .= $char;
        }
    }

    return $decryptedText;
}

$ciphertext = "Gqfltwj emgj clgfv ! Aqltj rjqhjsksg ekxuaqs, ua xtwk n'feuguvwb gkwp xwj, ujts f'npxkqvjgw nw tjuwcz ugwygjtfkf qz uw efezg sqk gspwonu. Jgsfwb-aqmu f Pspygk nj 29 cntnn hqzt dg igtwy fw xtvjg rkkunqf.";
$key = "FCSC";

$decryptedMessage = decryptVigenere($ciphertext, $key);
echo $decryptedMessage;
