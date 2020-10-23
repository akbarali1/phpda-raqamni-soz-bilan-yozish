<?php
class Summa {
    public function convertNumber($number) {
        list($integer, $fraction) = explode(".", (string)$number);
        $output = "";
        if ($integer{0} == "-") {
            $output = "negative ";
            $integer = ltrim($integer, "-");
        } else if ($integer{0} == "+") {
            $output = "positive ";
            $integer = ltrim($integer, "+");
        }
        if ($integer{0} == "0") {
            $output.= "zero";
        } else {
            $integer = str_pad($integer, 36, "0", STR_PAD_LEFT);
            $group = rtrim(chunk_split($integer, 3, " "), " ");
            $groups = explode(" ", $group);
            $groups2 = array();
            foreach ($groups as $g) {
                $groups2[] = convertThreeDigit($g{0}, $g{1}, $g{2});
            }
            for ($z = 0;$z < count($groups2);$z++) {
                if ($groups2[$z] != "") {
                    $output.= $groups2[$z] . convertGroup(11 - $z) . ($z < 11 && !array_search('', array_slice($groups2, $z + 1, -1)) && $groups2[11] != '' && $groups[11] {
                        0
                    } == '0' ? " and " : ", ");
                }
            }
            $output = rtrim($output, ", ");
        }
        if ($fraction > 0) {
            $output.= " point";
            for ($i = 0;$i < strlen($fraction);$i++) {
                $output.= " " . convertDigit($fraction{$i});
            }
        }
        return kichkiril($output, utf8);
    }
}
function convertGroup($index) {
    switch ($index) {
        case 11:
            return " миллиард";
        case 10:
            return " nonillion";
        case 9:
            return " саккиз миллион";
        case 8:
            return " septillion";
        case 7:
            return " sextillion";
        case 6:
            return " quintrillion";
        case 5:
            return " квадриллион";
        case 4:
            return " триллион";
        case 3:
            return " миллиард";
        case 2:
            return " миллион";
        case 1:
            return " минг";
        case 0:
            return "";
    }
}
function convertThreeDigit($digit1, $digit2, $digit3) {
    $buffer = "";
    if ($digit1 == "0" && $digit2 == "0" && $digit3 == "0") {
        return "";
    }
    if ($digit1 != "0") {
        $buffer.= convertDigit($digit1) . " юз";
        if ($digit2 != "0" || $digit3 != "0") {
            $buffer.= ", ";
        }
    }
    if ($digit2 != "0") {
        $buffer.= convertTwoDigit($digit2, $digit3);
    } else if ($digit3 != "0") {
        $buffer.= convertDigit($digit3);
    }
    return $buffer;
}
function convertTwoDigit($digit1, $digit2) {
    if ($digit2 == "0") {
        switch ($digit1) {
            case "1":
                return "ўн";
            case "2":
                return "йигирма";
            case "3":
                return "ўттиз";
            case "4":
                return "қирқ";
            case "5":
                return "эллик";
            case "6":
                return "олтмиш";
            case "7":
                return "етмиш";
            case "8":
                return "саксон";
            case "9":
                return "тўқсон";
        }
    } else if ($digit1 == "1") {
        switch ($digit2) {
            case "1":
                return "ўн бир";
            case "2":
                return "ўн икки";
            case "3":
                return "ўнг уч";
            case "4":
                return "ўн тўрт";
            case "5":
                return "ўн беш";
            case "6":
                return "ўн олти ";
            case "7":
                return "ўн етти";
            case "8":
                return "ўн саккиз";
            case "9":
                return "ўн тўққиз";
        }
    } else {
        $temp = convertDigit($digit2);
        switch ($digit1) {
            case "2":
                return "йигирма $temp";
            case "3":
                return "ўттиз $temp";
            case "4":
                return "қирқ $temp";
            case "5":
                return "эллик $temp";
            case "6":
                return "олтмиш $temp";
            case "7":
                return "етмиш $temp";
            case "8":
                return "саксон $temp";
            case "9":
                return "тўқсон $temp";
        }
    }
}
function convertDigit($digit) {
    switch ($digit) {
        case "0":
            return "нол";
        case "1":
            return "бир";
        case "2":
            return "икки";
        case "3":
            return "уч";
        case "4":
            return "тўрт";
        case "5":
            return "беш";
        case "6":
            return "олти";
        case "7":
            return "етти";
        case "8":
            return "саккиз";
        case "9":
            return "тўққиз";
    }
}
function kichkiril($string, $encoding) {
    $strlen = mb_strlen($string, $encoding);
    $firstChar = mb_substr($string, 0, 1, $encoding);
    $then = mb_substr($string, 1, $strlen - 1, $encoding);
    return mb_strtoupper($firstChar, $encoding) . $then;
}
