# Résolution : À l'aise



## Comprendre le chiffrement de Vigenère

Le chiffrement de Vigenère est une méthode de cryptographie polyalphabétique. Il utilise une clef de chiffrement pour décaler les lettres du message original.

###### Exemple avec HACKROPOLE :

| Texte clair   | H   | A   | C   | K   | R   | O   | P   | O   | L   | E   |
| ------------- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- |
| Clef          | K   | E   | Y   | K   | E   | Y   | K   | E   | Y   | K   |
| Décalage      | +10 | +4  | +24 | +10 | +4  | +24 | +10 | +4  | +24 | +10 |
| Texte chiffré | R   | E   | W   | U   | V   | E   | Z   | I   | D   | O   |

###### Explication :

La lettre **H** (7e lettre de l'alphabet) est décalée de 10 positions car **K** est la 10e lettre de l'alphabet, donnant **R**. ⤵

⚠ Dans le chiffrement de Vigenère, l'alphabet est **indexé à partir de 0**.



## Messsage a déchiffrer

Le message a déchiffrer dans le cadre de l'épreuve est le suivant :

> Gqfltwj emgj clgfv ! Aqltj rjqhjsksg ekxuaqs, ua xtwk n'feuguvwb gkwp xwj, ujts f'npxkqvjgw nw tjuwcz ugwygjtfkf qz uw efezg sqk gspwonu. Jgsfwb-aqmu f Pspygk nj 29 cntnn hqzt dg igtwy fw xtvjg rkkunqf.



## Script de déchiffrement en PHP

Voici le script que j'ai mis en oeuvre :

```php
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

echo decryptVigenere($ciphertext, $key);
```

###### Explication rapide :

- **Lignes 1-24**: Fonction `decryptVigenere` qui prend en entrée le texte chiffré et la clef, et retourne le texte déchiffré.

- **Lignes 8-21**: Boucle sur chaque caractère du texte chiffré. Si le caractère est dans l'alphabet, le déchiffrement est effectué. Sinon, le caractère est ajouté tel quel.
  
  **Le reste :** Explicit 😃
  
   

## Résultat du déchiffrement

Après exécution du script, voici le message déchiffré :

> BONJOUR CHER AGENT ! VOTRE PROCHAINE MISSION, SI VOUS L'ACCEPTEZ BIEN SUR, SERA D'INFILTRER LE RESEAU SOUTERRAIN OU SE CACHE NOS ENNEMIS. RENDEZ-VOUS A NANTES LE 29 AVRIL POUR LE DEBUT DE VOTRE MISSION.



## Conclusion ✅

Le flag pour cette épreuve est le nom de la ville mentionnée dans le message, soit **Nantes**.


