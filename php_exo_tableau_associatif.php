<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - Exo 3 - tableau associatif</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    // Exercie 1 : Notes de Paul
    //    Question a
    $notes = [
        "maths" => [15, 17, 12],
        "français" => [14, 11],
        "sport" => [16, 18, 10],
        "anglais" => [13, 19]
    ];
    ?>
    <p>Les notes de Paul sont:</p>
    <?php

    //    Question b
    // à garder
    function affiche($notes)
    {
        foreach ($notes as $matiere => $note) {
            $derniereNote = array_pop($note);
            echo implode(', ', $note) . " et $derniereNote en $matiere. <br>";
        }
    }
    affiche($notes);
    echo "<hr>";
    //    Question b - 2eme solution

    function affiche2($notes)
    {
        $str = "Les notes de Paul :";
        foreach ($notes as $matiere => $values) {
            foreach ($values as $key => $value){
                if($key == count($values)-1){
                    $str.=$value."";
                }
                elseif ($key==count($values)-2){
                    $str.=$value." et ";
                }
                else {
                    $str.=$value.", ";
            }
        }
        $str.="en ".$matiere. "<br>";
    }
}
    affiche2($notes);


    //    Question c
    function moyenne($notes)
    {
        $moyenne = [];
        foreach ($notes as $matiere => $note) {
            $average =  array_sum($note) / count($note);
            $arrounditAverage =  ROUND($average, 1) . "<br>";
            $moyenne[$matiere] = $arrounditAverage;
        }
        return $moyenne;
    }

    function afficheMoyenne($moyennes)
    {
        print_r("[" . implode(", ", array_map(function ($v, $k) {
            return "'$k' => $v";
        }, $moyennes, array_keys($moyennes))) . "]");
        echo "<hr>";
    }
    afficheMoyenne(moyenne($notes));

    //    Question d
    function  moyenneTotal($notes)
    {
        $total = 0;
        foreach ($notes as $matiere => $note) {
            $matiereTotalNote = array_sum($note);
            $matiereAverage = $matiereTotalNote / count($note);
            $total += $matiereAverage;
            $totalAverage = $total / count($notes);
        }
        return $totalAverage;
    }
    $totalAverage = moyenneTotal($notes);
    echo "La moyenne totale est de " . ROUND($totalAverage, 1);
    echo "<hr>";


    // Exercie 2: JSON to HTML 
    $json = '{"a":"abeille","b":"banane","c":"chocolat","d":"dauphin", "e":"ecole"}';
    // Question a 
    $array = json_decode($json, true);
    print_r($array);
    echo "<hr>";

    // Question b
    function isExiste($array, $value)
    {
        if (in_array($value, $array, true)) {
            echo 'TRUE<br>';
        } else {
            echo 'FALSE<br>';
        }
    }
    isExiste($array, "abeille");
    isExiste($array, "abeill");
echo "<hr>";

    // Question b -2eme avec  (file_get_contents)   

    ?>

    <!-- Question c -->
    <table class="Ex2_quastionC">
        <tbody>
            <?php
            foreach ($array as $indice => $valeur) {
                echo "<tr>";
                echo "<td>$indice</td>";
                echo "<td>$valeur</td>";
                echo "<td>" . strtoupper($valeur) . "</td>";
                echo "<td>" . ucfirst($valeur) . "</td>";
                echo "<td>" . strlen($valeur) . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <hr>

    <!-- Exercie 3: Traitement d'URL -->
    <!-- Question a : -->
    <?php
    $url = "https://darkcity.fr/blog/2015/08/16/bac-a-sable-php/";
    function foo1($url)
    {
        $url0 = explode('//', $url);
        $url2 = array_pop($url0);
        $urlFinal = explode('/', $url2);
        $encore = array_pop($urlFinal);
        return ($urlFinal);
    }
    $array_1 = foo1($url);
    // $array_1= print_r(foo1($url));
    echo print_r($array_1);
    echo "<hr>";

    // Question b
    // $array_2= foo2($array_1);
    function foo2($array)
    {
        $resultat = [];
        foreach ($array as $value) {
            if (is_numeric($value)) {
                $resultat[] = $value . ' "int" ' . '<br>';
            } else {
                $resultat[] = $value . ' "string" ' . '<br>';
            }
        }
        return $resultat;
    }
    $array_2 = foo2($array_1);
    echo print_r($array_2);
    echo "<hr>";
    ?>


</body>

</html>