<?php

if ($_POST['data'] !== '') {
    $index = str_replace(" ", "", $_POST["data"]);
    for ($i = 1; $i < 2; $i++) {
        $ch = curl_init();
        $data = [
            CURLOPT_URL => "http://www.baidu.com/s?wd={$index}&pn={$i}&rn=10",    //目标网址
            CURLOPT_SSL_VERIFYPEER=>0,
            CURLOPT_SSL_VERIFYHOST=>0,
            CURLOPT_HEADER => 1,
            CURLOPT_RETURNTRANSFER => 1,        //取消默认输出
        ];
        curl_setopt_array($ch, $data);
        $result = curl_exec($ch);
        curl_close($ch);
        $ptn = '/<h3 class="t"><a.*?href = "(.*?)".*?target="_blank".*?>(.*?)<\/a><\/h3>/s';
        preg_match_all($ptn, $result, $match);
        /*
       $metch[0]   全部
       $metch[1]   链接
       $metch[2]   标题
          */
        if(!empty($match[0])){
            foreach ($match[1] as $key => $value) {
                echo "<a class='btn btn-info' href='{$value}' target='_blank'>{$match[2][$key]}</a><br/><br/>";
            }
        }else{
           // echo "null";
        }


    }
}

		
	