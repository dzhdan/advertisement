<?php

class TestController extends Controller
{
    public function actionIndex()
    {
        $arr = [4, 8, 1, 7, 2];
        $g = count($arr);

        for($i = 0; $i < $g - 1; $i++){
            for($j = 0; $j < $g -$i- 1; $j++){
                if($arr[$j] > $arr[$j + 1]){
                    list($arr[$j],$arr[$j + 1] ) = [$arr[$j + 1], $arr[$j]];
                }
            }
        }

        var_dump($arr);

    }

    public function actionWords()
    {

        $arr = ["салат", 'рана', "манка", "анар", "ласат", "нара","ыв","ромб", "тсала", "омбр","каман"];

        for($j = 0; $j < count($arr) - 1 ; $j ++){
            for($i = $j+1; $i < count($arr) -1; $i ++){
                if($this->getAbc($arr[$j]) === $this->getAbc($arr[$i])){
                    list($arr[$j +1],$arr[$i] ) = [$arr[$i ],$arr[$j + 1]  ];
                    break;
                }
            }
        }

        var_dump($arr);

    }

    public function getAbc($word)
    {

        $rus_small = ["а","б","в","г","д","е","ё","ж","з","и","й","к","л","м","н","о",
            "п","р","с","т","у","ф","х","ц","ч","ш","щ","ъ","ы","ь","э","ю","я"];

        $word = mb_strtolower($word,'UTF-8');
        $wordArray  = preg_split('//u', $word, -1, PREG_SPLIT_NO_EMPTY);

        foreach($wordArray as $letter){
            for($i = 0; $i < count($rus_small)- 1 ;$i++){
                if($letter === $rus_small[$i]){
                    $f[] = $i;
                    break;
                }
            }
        }

        $flag = true;
        while ($flag){
            $flag = false;
            for($i = 0; $i < count($f) - 1; $i++){
                if($f[$i] > $f[$i + 1]){
                    list($f[$i], $f[$i + 1]) = [$f[$i + 1], $f[$i]];
                    $flag = true;
                }

            }
        }

        foreach($f as $value){
            $g[] = $rus_small[$value];
        }

        return implode($g) ;

    }


}