<?php

class TestController extends Controller
{

    public function actionWords()
    {

        $arr = ["ыв","салат", 'рана', "манка", "анар", "ласат",  "ор","тсала", "омбр","ро","каман","ро","ро","нара",'ро',"ромб", ];

        $counter = 0;

        for($j = 0; $j < count($arr) ; $j ++){
            for($i = $j+1; $i < count($arr); $i ++){
                if($this->getAbc($arr[$j]) === $this->getAbc($arr[$i])){
                    list($arr[$j +1],$arr[$i] ) = [$arr[$i ],$arr[$j + 1]  ];
                    break;
                }
            }
        }

        var_dump($arr);
        var_dump($counter);


    }
    public function actionDef()
    {
        $str = "abcdefgh";
        $arr = str_split($str);

        $count = count($arr);

        for($i = 0;$i <3; $i ++){
           $arr[$count + 1 ] = $arr[$i];
            $arr[$i] = $arr[$i +1];
            $count++;
            unset($arr[$i]);
        }
     var_dump( $arr)  ;
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