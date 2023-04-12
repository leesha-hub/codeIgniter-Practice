<?php
header("Content-Type: text/html; charset=UTF-8");

$connect = "newcas_npine_com";
$connect_sphinx = "ihcas_rt_index";

$imagehub_index_sphinx = "ihcas_rt_index";
$imagehub_index_sphinx_table = "tbl_ImageKeyword_Sphinx";

$result111 = mysql_query(" SELECT nImageNo FROM sphinx_db_update1 ORDER BY nSeqNo DESC ", $connect);

while($rows = mysql_fetch_array($result111)) {

    $nImageNo = $rows[nImageNo];
    echo "aaa :$nImageNo:bb \r\n"."</br>";

    //db sphinx
    $result = mysql_query("
         SELECT
            b.nSeqNo as  nImageNo,  
            b.nImageType, b.vcAdminCode, b.emIsAdultContent, b.nAuthorNo, b.nModelCheck,
            b.dtPublicDate,  b.IHdtPublicDate , b.nRegDate,  b.nModifyDate, b.nLicenseStartDate,  b.nLicenseEndDate ,
            b.emPortraitRight, b.emCopyRight,  b.emProperty,  b.emDelFlags, b.vcPortraitRightCode , b.vcPropertyCode ,

            c.random_nScore, c.real_count
         FROM  
            tbl_Image as b 
             
            left join search_score.new_score_random as c on c.nImageNo=  b.nSeqNo
            where b.nSeqNo ='$nImageNo' ", $connect);

    echo "result Start :: "."</br>";
    echo "<pre>";
    // var_dump(mysql_fetch_array($result));
    echo "</pre>";
    echo "result End :: "."</br>";

    while ($row = mysql_fetch_array($result)) {

        echo "1111111111111111"."</br>";
        //exit;

        $allCategoryNo = "";
        $txKeyword = "";
        $stxKeyword = "";

        $conceptKeyword = "";
        $peopleKeyword = "";
        $styleKeyword = "";
        $etcKeyword = "";

        $concept_keyword = "";
        $people_keyword = "";
        $style_keyword = "";
        $etc_keyword = "";

        $emContentsState = "0";
        $IHemContentsState = "0";

        $emIsPublic = "0";
        $IHemIsPublic = "0";
        $nMemberPrev = "";
        $vcPortraitRightCode = "";
        $vcPropertyCode = "";

        $IHnContentsLevel = "0";
        $nContentsLevel = "0";


        $nImageNo = $row['nImageNo'];
        $nImageType = $row['nImageType'];
        $vcAdminCode = $row['vcAdminCode'];
        $emIsAdultContent = $row['emIsAdultContent'];
        $nAuthorNo = $row['nAuthorNo'];
        $nModelCheck = $row['nModelCheck'];

        $vcPortraitRightCode_row = $row['vcPortraitRightCode'];
        $vcPropertyCode_row = $row['vcPropertyCode'];

        $vcPortraitRightCodeTemp = explode(',', $vcPortraitRightCode_row);
        foreach ($vcPortraitRightCodeTemp as $index => $word) {
            if ($word != '') {
                $vcPortraitRightCode .= trim($word) . ' ';
            }
        }

        $vcPropertyCodeTemp = explode(',', $vcPropertyCode_row);
        foreach ($vcPropertyCodeTemp as $index => $word) {
            if ($word != '') {
                $vcPropertyCode .= trim($word) . ' ';
            }
        }


        if ($row['dtPublicDate'] != '0000-00-00') {
            $dtPublicDate = str_replace('-', '', $row['dtPublicDate']);
        } else {
            $dtPublicDate = 0;
        }
        if ($row['IHdtPublicDate'] > 0 || $row['IHdtPublicDate'] != '0000-00-00') {
            $IHdtPublicDate = str_replace('-', '', $row['IHdtPublicDate']);
        } else {
            $IHdtPublicDate = 0;
        }

        echo "dtPublicDate :: ".$dtPublicDate."</br>";
        echo "IHdtPublicDate :: ".$IHdtPublicDate."</br>";
        echo "2222222222222222"."</br>";

        if ($row['nRegDate'] > 0) {
            $nRegDate = gmdate(Ymd, $row['nRegDate']);
        } else {
            $nRegDate = 0;
        }

        echo "nRegDate :: ".$nRegDate."</br>";

        if ($row['nModifyDate'] > 0) {
            $nModifyDate = gmdate(Ymd, $row['nModifyDate']);
        } else {
            $nModifyDate = 0;
        }

        echo "nModifyDate :: ".$nModifyDate."</br>";

        if ($row['nLicenseStartDate'] > 0) {
            $nLicenseStartDate = gmdate(Ymd, $row['nLicenseStartDate']);
        } else {
            $nLicenseStartDate = 0;
        }

        echo "nLicenseStartDate :: ".$nLicenseStartDate."</br>";

        if ($row['nLicenseEndDate'] > 0) {
            $nLicenseEndDate = gmdate(Ymd, $row['nLicenseEndDate']);
        } else {
            $nLicenseEndDate = 0;
        }

        echo "nLicenseEndDate :: ".$nLicenseEndDate."</br>";

        if ($row['emPortraitRight'] == "Y") {
            $emPortraitRight = 1;
        } else if ($row['emPortraitRight'] == "N") {
            $emPortraitRight = 2;
        } else if ($row['emPortraitRight'] == "NA") {
            $emPortraitRight = 3;
        }

        echo "emPortraitRight :: ".$emPortraitRight."</br>";

        if ($row['emCopyRight'] == "Y") {
            $emCopyRight = 1;
        } else if ($row['emCopyRight'] == "N") {
            $emCopyRight = 2;
        } else if ($row['emCopyRight'] == "NA") {
            $emCopyRight = 3;
        }

        echo "emCopyRight :: ".$emCopyRight."</br>";
        // exit;

        if ($row['emProperty'] == "Y") {
            $emProperty = 1;
        } else if ($row['emProperty'] == "N") {
            $emProperty = 2;
        } else if ($row['emProperty'] == "NA") {
            $emProperty = 3;
        }

        echo "emProperty :: ".$emProperty."</br>";

        if ($row['emDelFlags'] == "Y") {
            $emDelFlags = 1;
        } else if ($row['emDelFlags'] == "N") {
            $emDelFlags = 2;
        }

        echo "emDelFlags :: ".$emDelFlags."</br>";
        //exit;

        $nScore = $row['random_nScore'];
        $real_count = $row['real_count'];

        echo "random_nScore :: ".$nScore."</br>";
        echo "real_count :: ".$real_count."</br>";
        // exit;

        if ($emIsAdultContent == "Y") {
            $emIsAdultContent = 1;
        } else if ($emIsAdultContent == "N") {
            $emIsAdultContent = 2;
        } else {
            $emIsAdultContent = 0;
        }

        echo "emIsAdultContent :: ".$emIsAdultContent."</br>";
        // exit;

        //keyword

        $result1 = mysql_query("
         select nKeywordNo from tbl_NewMapperImageKeyword 
         where  nImageNo= '$nImageNo'
            ", $connect);
        while ($rows = mysql_fetch_array($result1)) {

            $NewMapperImageKeyword = explode(',', $rows[nKeywordNo]);


            $NewMapper_nKeywordNo = array_unique($NewMapperImageKeyword);

            foreach ($NewMapper_nKeywordNo as $t) {
                if ($t != '') {
                    $save_NewMapper_nKeywordNo .= $t . ',';
                }
            }

            echo "save_NewMapper_nKeywordNo :: ".$save_NewMapper_nKeywordNo."</br>";
            //exit;

            mysql_query("
            update tbl_NewMapperImageKeyword  set nKeywordNo ='$save_NewMapper_nKeywordNo' 
            where  nImageNo= '$nImageNo'
               ", $connect);

            $NewMapper_nKeywordNo = "";
            $save_NewMapper_nKeywordNo = "";


            $rows[nKeywordNo] = substr_replace(trim($rows[nKeywordNo]), '', -1);
            echo "rows[nKeywordNo] :: ".$rows[nKeywordNo]."</br>";
            //exit;


            $result2 = mysql_query(" SELECT
                        vcKeyword, vcUnisonwordVal 
                     FROM
                          tbl_Keyword AS b   
                        INNER JOIN tbl_KeywordGroupInfo AS g ON (g.nKeywordNo = b.nSeqNo AND g.emDelFlags='N' AND g.emStatus IN ('','D','U'))
                         LEFT JOIN tbl_Unisonword AS c ON (c.nKeywordNo = b.nSeqNo)
                     WHERE
                         b.nSeqNo  IN ($rows[nKeywordNo])
                        GROUP BY b.nSeqNo  ", $connect);

            while ($rows2 = mysql_fetch_array($result2)) {

                $stxKeyword[] .= $rows2['vcKeyword'] . ($rows2['vcUnisonwordVal'] ? '_' . $rows2['vcUnisonwordVal'] : '');

            }

            echo "stxKeyword Start :: "."</br>";
            echo "<pre>";
            var_dump($stxKeyword);
            echo "stxKeyword End :: "."</br>";

            $result2 = mysql_query("
                   select   b.vcKeyword , c.vcUnisonwordVal
                              from tbl_KeywordGroupInfo as d
                              inner join tbl_KeywordGroup as a on (d.nKeywordNo = a.nGroupKeywordNo and a.emDelFlags = 'N' and a.nType = 1)
                              inner join tbl_Keyword as b on (a.nKeywordNo = b.nSeqNo and b.nLanguage = 1)
                              left join tbl_Unisonword as c on (c.nKeywordNo = b.nSeqNo)
                              where d.nKeywordNo in ($rows[nKeywordNo]) and d.emDelFlags='N' and d.emStatus in ('','D','U')
                              group by a.nKeywordNo

                  ", $connect);

            while ($rows2 = mysql_fetch_array($result2)) {
                $stxKeyword[] .= $rows2['vcKeyword'] . ($rows2['vcUnisonwordVal'] ? '_' . $rows2['vcUnisonwordVal'] : '');
            }

            echo "stxKeyword2 Start :: "."</br>";
            echo "<pre>";
            var_dump($stxKeyword);
            echo "stxKeyword2 End :: "."</br>";

            //exit;

            foreach ($NewMapperImageKeyword as $sno) {
                if ($sno != '') {

                    $query = " 
                 
                     SELECT   TK.vcKeyword,   TKC.nParentTab , TU.vcUnisonwordVal

                     FROM tbl_Keyword as TK

                      LEFT JOIN tbl_Unisonword as TU ON TU.nKeywordNo = TK.nSeqNo 

                     INNER JOIN tbl_KeywordGroupInfo as TKGI ON TKGI.nKeywordNo = TK.nSeqNo and TKGI.emDelFlags='N' 
                           and TKGI.emStatus in ('','U','D') 

                     LEFT JOIN tbl_KeywordClassification as TKC ON TKC.nSeqNo = TKGI.nClassificationNo and TKC.emDelFlags='N' and TKC.emIsOpen = 'Y'

                      WHERE TK.nSeqNo IN ('$sno ')
                 
                    ";

                }
                $result3 = mysql_query(" $query ", $connect);
                while ($rows3 = mysql_fetch_array($result3)) {

                    $stxKeyword[] .= $rows3['vcKeyword'] . ($rows3['vcUnisonwordVal'] ? '_' . $rows3['vcUnisonwordVal'] : '');


                    //1.컨셉 2.인물 3.스타일 4.주제

                    if ($rows3[nParentTab] == 1) {


                        $concept_keyword[] .= $rows3['vcKeyword'] . ($rows3['vcUnisonwordVal'] ? '_' . $rows3['vcUnisonwordVal'] : '');


                    } else if ($rows3[nParentTab] == 2) {


                        $people_keyword[] .= $rows3['vcKeyword'] . ($rows3['vcUnisonwordVal'] ? '_' . $rows3['vcUnisonwordVal'] : '');


                    } else if ($rows3[nParentTab] == 3) {


                        $style_keyword[] .= $rows3['vcKeyword'] . ($rows3['vcUnisonwordVal'] ? '_' . $rows3['vcUnisonwordVal'] : '');

                    } else {


                        $etc_keyword[] .= $rows3['vcKeyword'] . ($rows3['vcUnisonwordVal'] ? '_' . $rows3['vcUnisonwordVal'] : '');

                    }

                }
            }

        }


        $ltxKeyword = array_unique($stxKeyword);
        foreach ($ltxKeyword as $t) {
            $txKeyword .= $t . ' ';
        }

        $lconcept_keyword = array_unique($concept_keyword);
        foreach ($lconcept_keyword as $t) {
            $conceptKeyword .= $t . ' ';
        }
        $lpeople_keyword = array_unique($people_keyword);
        foreach ($lpeople_keyword as $t) {
            $peopleKeyword .= $t . ' ';
        }
        $lstyle_keyword = array_unique($style_keyword);
        foreach ($lstyle_keyword as $t) {
            $styleKeyword .= $t . ' ';
        }
        $letc_keyword = array_unique($etc_keyword);
        foreach ($letc_keyword as $t) {
            $etcKeyword .= $t . ' ';
        }

        echo "txKeyword :: ".$txKeyword."</br>";
        echo "conceptKeyword :: ".$conceptKeyword."</br>";
        echo "peopleKeyword :: ".$peopleKeyword."</br>";
        echo "styleKeyword :: ".$styleKeyword."</br>";
        echo "etcKeyword :: ".$etcKeyword."</br>";

        //exit;

        $nMemberPrev = "";

        $ICFLAG = 0;
        $IHFLAG = 0;

        $result22 = mysql_query("
               select * from tbl_MapperSiteImage
                 where  nImageNo= '$nImageNo' 
               ", $connect);

        while ($array2 = mysql_fetch_array($result22)) {
            if ($array2[nSiteNo] == 1) {
                $ICFLAG = 1;
                $emContentsState = $array2['emContentsState'];
                $ic_nMemberPrev = $array2['nMemberPrev'];
                $emIsPublic = $array2['emIsPublic'];

                if ($emIsPublic == "Y") {
                    $emIsPublic = 1;
                } else if ($emIsPublic == "N") {
                    $emIsPublic = 2;
                } else {
                    $emIsPublic = 0;
                }

                $txKeyword = $txKeyword . ' 아이클릭아트';
                $nContentsLevel = $array2['nContentsLevel'];

            } else if ($array2[nSiteNo] == 2) {
                $IHFLAG = 1;
                $IHemContentsState = $array2['emContentsState'];
                $ih_nMemberPrev = $array2['nMemberPrev'];
                $IHemIsPublic = $array2['emIsPublic'];
                if ($IHemIsPublic == "Y") {
                    $IHemIsPublic = 1;
                } else if ($IHemIsPublic == "N") {
                    $IHemIsPublic = 2;
                } else {
                    $IHemIsPublic = 0;
                }
                $txKeyword = $txKeyword . ' 이미지허브';
                $IHnContentsLevel = $array2['nContentsLevel'];
            }
            $seServiceType = str_replace(',', ' ', $array2['seServiceType']);

            $nFree = $array2['nFree'];

            if ($ic_nMemberPrev != '') {
                $s_nMemberPrev = $ic_nMemberPrev;
            } else {
                $s_nMemberPrev = $ih_nMemberPrev;
            }

        }

        if ($s_nMemberPrev == 1) {
            $nMemberPrev = "1";
        } else {
            $list_memberPrev = array('2', '5', '7', '11', '13');
            foreach ($list_memberPrev as $m) {
                if ($s_nMemberPrev % $m == 0) {
                    $nMemberPrev .= $m . ' ';
                }
            }
            $nMemberPrev = trim($nMemberPrev);
        }


        $txKeyword = $txKeyword . ' 카스엔파인';
        $txKeyword = $txKeyword . ' ' . $nImageNo;

        $ic_nMemberPrev = "";
        $ih_nMemberPrev = "";

        $resulting = mysql_query("select nCategoryNo from tbl_MapperSiteCategory where nImageNo = '$nImageNo' ", $connect);

        while ($array = mysql_fetch_array($resulting)) {


            $nCategoryNo = $array[nCategoryNo];
            $allCategoryNo .= $nCategoryNo;

            $array1 = mysql_fetch_array(mysql_query("select nSeqNo , nParentCategory
                  from tbl_DirectoryCategory where nSeqNo = '$nCategoryNo' 
                ", $connect));

            if ($array1[nSeqNo] != $array1[nParentCategory] && $array1[nParentCategory] != '0') {

                $nParentCategory = $array1[nParentCategory];
                $allCategoryNo .= ' ' . $nParentCategory;

                for ($K = 1; $K <= 5; $K++) {
                    $array1 = mysql_fetch_array(mysql_query("select nSeqNo , nParentCategory
                     from tbl_DirectoryCategory where nSeqNo = '$nParentCategory' 
                   ", $connect));

                    if ($array1[nSeqNo] != $array1[nParentCategory] && $array1[nParentCategory] != '0') {
                        $nParentCategory = $array1[nParentCategory];
                        $allCategoryNo .= ' ' . $nParentCategory;

                    }
                }
            }


        }

        $SetImageFlag = 0;
        $check_keyword = array('문서템플릿', '북커버', '브로슈어', '파워포인트');
        $temp_txKeyword = explode(' ', $txKeyword);
        foreach ($temp_txKeyword as $t) {
            if (in_array($t, $check_keyword) && $nImageType == 4) {
                $SetImageFlag = 1;
            }
        }

        $SetBeautyFlag = 0;
        $check_beauty_keyword = array('의료성형뷰티');
        $temp_txKeyword = explode(' ', $txKeyword);
        foreach ($temp_txKeyword as $t) {
            if (in_array($t, $check_beauty_keyword)) {
                $SetBeautyFlag = 1;
            }
        }

        if ($nImageType == "4") {

            $vcSavePath_num = ceil($nImageNo / 10000) * 10000;
            $vcSaveName = $nImageNo . '.mp4';

            $thumb10_mp4 = '/files/contents_data/thumb/Thumb10/' . $vcSavePath_num . '/' . $vcSaveName;
            $thumb11_mp4 = '/files/contents_data/thumb/Thumb11/' . $vcSavePath_num . '/' . $vcSaveName;


            if (file_exists($thumb10_mp4) && file_exists($thumb11_mp4)) {
                $SetImageFlag = 2;
            }
        }

        if ($nImageType == "12" || $nImageType == "13") {
            $SetImageFlag = 2;
        }
        echo "$nImageType: $thumb10_mp4 :$SetImageFlag :SetImageFlag";

//echo "aa:$s_nMemberPrev:$nMemberPrev:<br> ";

        echo "bbb:$row[nImageNo]: $i   \r\n";
        //echo "$row[nImageNo]: $i | $allCategoryNo | $ICFLAG | $IHFLAG :$txKeyword \r\n";


        //echo "$conceptKeyword    | $peopleKeyword | $styleKeyword | $etcKeyword \r\n";


        mysql_query("delete from $imagehub_index_sphinx_table where nImageNo='$nImageNo'   ", $connect);


        mysql_query("insert into $imagehub_index_sphinx_table
            (nImageNo ,    nImageType , SetImageFlag,   nMemberPrev , vcPortraitRightCode , vcPropertyCode ,  emContentsState , IHemContentsState , nAuthorNo , 
             emIsAdultContent , ICFLAG , IHFLAG,  vcAdminCode , category , txKeyword , conceptKeyword , peopleKeyword , styleKeyword , etcKeyword, seServiceType , emIsPublic, 
            IHemIsPublic, emDelFlags,  nContentsLevel  , IHnContentsLevel , nScore, real_count , emPortraitRight , emCopyRight , emProperty , nModelCheck ,
            dtPublicDate , IHdtPublicDate , nRegDate , nModifyDate , nLicenseStartDate , nLicenseEndDate ,nFree , SetBeautyFlag
            
            )

            values
            ('$nImageNo', '$nImageType',   '$SetImageFlag', '$nMemberPrev', '$vcPortraitRightCode' , '$vcPropertyCode' ,'$emContentsState',  '$IHemContentsState', '$nAuthorNo', '$emIsAdultContent',   '$ICFLAG' , '$IHFLAG',   '$vcAdminCode', '$allCategoryNo', '$txKeyword' , '$conceptKeyword' , '$peopleKeyword' , '$styleKeyword' , '$etcKeyword', '$seServiceType' , '$emIsPublic' ,   '$IHemIsPublic', '$emDelFlags', '$nContentsLevel' , '$IHnContentsLevel' , '$nScore' ,'$real_count' ,'$emPortraitRight' , '$emCopyRight' , '$emProperty' ,'$nModelCheck' , '$dtPublicDate' , '$IHdtPublicDate' , '$nRegDate' , '$nModifyDate' , '$nLicenseStartDate' , '$nLicenseEndDate' ,'$nFree'
            ,'$SetBeautyFlag'
            )
            
            ", $connect);


        $allCategoryNo = "";
        $txKeyword = "";
        $stxKeyword = "";

        $conceptKeyword = "";
        $peopleKeyword = "";
        $styleKeyword = "";
        $etcKeyword = "";

        $concept_keyword = "";
        $people_keyword = "";
        $style_keyword = "";
        $etc_keyword = "";

        $emContentsState = "0";
        $IHemContentsState = "0";

        $emIsPublic = "0";
        $IHemIsPublic = "0";
        $nMemberPrev = "";
        $vcPortraitRightCode = "";
        $vcPropertyCode = "";

        $IHnContentsLevel = "0";
        $nContentsLevel = "0";

    }


    echo 33333333333333333333;
    //db sphinx

//sphinx

    $result = mysql_query("
         SELECT
            *
         FROM  
          $imagehub_index_sphinx_table
          
          where   nImageNo='$nImageNo'      ", $connect);

    while ($row = mysql_fetch_array($result)) {

        echo 444444444444444444444444; exit;

        $nImageNo = $row['nImageNo'];
        $nImageType = $row['nImageType'];
        $SetImageFlag = $row['SetImageFlag'];
        $nMemberPrev = $row['nMemberPrev'];
        $vcPortraitRightCode = $row['vcPortraitRightCode'];
        $vcPropertyCode = $row['vcPropertyCode'];


        $emContentsState = $row['emContentsState'];
        $IHemContentsState = $row['IHemContentsState'];
        $nAuthorNo = $row['nAuthorNo'];
        $emIsAdultContent = $row['emIsAdultContent'];
        $ICFLAG = $row['ICFLAG'];
        $IHFLAG = $row['IHFLAG'];
        $vcAdminCode = $row['vcAdminCode'];
        $category = $row['category'];
        $txKeyword = $row['txKeyword'];
        $conceptKeyword = $row['conceptKeyword'];
        $peopleKeyword = $row['peopleKeyword'];
        $styleKeyword = $row['styleKeyword'];
        $etcKeyword = $row['etcKeyword'];
        $seServiceType = $row['seServiceType'];
        $emIsPublic = $row['emIsPublic'];
        $IHemIsPublic = $row['IHemIsPublic'];
        $emDelFlags = $row['emDelFlags'];
        $nContentsLevel = $row['nContentsLevel'];
        $IHnContentsLevel = $row['IHnContentsLevel'];


        $nScore = $row['nScore'];
        $real_count = $row['real_count'];
        $emPortraitRight = $row['emPortraitRight'];
        $emCopyRight = $row['emCopyRight'];
        $emProperty = $row['emProperty'];
        $nModelCheck = $row['nModelCheck'];
        $dtPublicDate = $row['dtPublicDate'];
        $IHdtPublicDate = $row['IHdtPublicDate'];
        $nRegDate = $row['nRegDate'];
        $nModifyDate = $row['nModifyDate'];
        $nLicenseStartDate = $row['nLicenseStartDate'];
        $nLicenseEndDate = $row['nLicenseEndDate'];
        $nFree = $row['nFree'];


        echo "$nImageNo \r\n";

        mysql_query("delete from    $imagehub_index_sphinx where id=$nImageNo   ", $connect_sphinx);

        mysql_query("insert into  $imagehub_index_sphinx
            (id ,
            category, 
            txKeyword, 
            
            vcAdminCode, 
            nMemberPrev, 
            vcPortraitRightCode,
            vcPropertyCode,
            conceptKeyword,
            peopleKeyword,
            styleKeyword,
            etcKeyword,
            nImageType, 
         
            emIsAdultContent, 
            SetImageFlag, 
            emContentsState, 
            IHemContentsState, 
            ICFLAG, 
            IHFLAG, 
            nAuthorNo, 
            emIsPublic, 
            IHemIsPublic, 
            emDelFlags,
            nContentsLevel, 
            IHnContentsLevel,
            emPortraitRight, 
            emCopyRight, 
            emProperty, 
            nModelCheck, 
            nImageNo, 
            nScore, 
            real_count, 
            dtPublicDate, 
            IHdtPublicDate, 
            nRegDate, 
            nModifyDate, 
            nLicenseStartDate, 
            nLicenseEndDate, 
            seServiceType ,
            nFree )

         values
            ('$nImageNo' ,
            '$category', 
            '$txKeyword', 
            
            '$vcAdminCode', 
            '$nMemberPrev', 
            '$vcPortraitRightCode',
            '$vcPropertyCode',
            '$conceptKeyword',
            '$peopleKeyword',
            '$styleKeyword',
            '$etcKeyword',
            '$nImageType', 
         
            '$emIsAdultContent', 
            '$SetImageFlag', 
            '$emContentsState', 
            '$IHemContentsState', 
            '$ICFLAG', 
            '$IHFLAG', 
            '$nAuthorNo', 
            '$emIsPublic', 
            '$IHemIsPublic', 
            '$emDelFlags',
            '$nContentsLevel', 
            '$IHnContentsLevel',
            '$emPortraitRight', 
            '$emCopyRight', 
            '$emProperty', 
            '$nModelCheck', 
            '$nImageNo', 
            '$nScore', 
            '$real_count', 
            '$dtPublicDate', 
            '$IHdtPublicDate', 
            '$nRegDate', 
            '$nModifyDate', 
            '$nLicenseStartDate', 
            '$nLicenseEndDate', 
            '$seServiceType' ,
            '$nFree' )

            "

            , $connect_sphinx);


    }
//sphinx


    mysql_query(" delete from   sphinx_db_update  where   nImageNo='$nImageNo'   ", $connect);

}
?>