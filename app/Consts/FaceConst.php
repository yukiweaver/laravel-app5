<?php

namespace App\Consts;

class FaceConst
{
  const ENDPOINT = 'https://yuki.cognitiveservices.azure.com/';
  const KEY = '1d4d601d6fae4d18953517dff692454e';
  const PERSON_GROUP_ID = 'mycoworker';
  const ACTRESS_LIST = [
    [
      'name'        => '成瀬心美',
      'image'       => 'https://imgc.eximg.jp/i=https%253A%252F%252Fs.eximg.jp%252Fexnews%252Ffeed%252FSirabee%252FSirabee_8600_1.jpg',
      'person_id'   => '1c5cd8be-17f5-4a98-8143-ebf02e3355a2',
    ],
    [
      'name'        => '三上悠亜',
      'image'       => 'https://blogimg.goo.ne.jp/user_image/0f/1b/0200525e837bd1b1e794bddabf8313f8.jpg',
      'person_id'   => 'cccbd305-f157-4aeb-9ee5-40a9803b26d2',
    ],
    [
      'name'        => '明日花キララ',
      'image'       => 'https://ogre.natalie.mu/media/news/owarai/2015/0926/MUSCATS34.jpg',
      'person_id'   => '30af7176-af32-4db3-8dff-7552df1ed9cd',
    ],
    [
      'name'        => '深田えいみ',
      'image'       => 'https://2ch.omorovie.com/wp-content/uploads/sites/2/2019/10/O8HrOL2MSuHZG6WI.jpg',
      'person_id'   => '3fb78eb0-e646-4d6d-bfb4-efb4ef94e0be',
    ],
    [
      'name'        => '麻美ゆま',
      'image'       => 'https://www.s1s1s1.com/contents/actress/15365/15365.jpg',
      'person_id'   => '50825ecd-8b37-4e07-918a-fd1b1cfd2d99',
    ],
    [
      'name'        => '紗倉まな',
      'image'       => 'https://images-na.ssl-images-amazon.com/images/I/41vhH3nYNPL.jpg',
      'person_id'   => 'd171df54-1777-44ed-9a9e-6a6714c4ff52',
    ],
    [
      'name'        => '葵つかさ',
      'image'       => 'https://images.merumo.ne.jp/008/652/388/8652388_src_0.jpg',
      'person_id'   => '01d32409-ec3a-4eed-9b83-10c508746bef',
    ],
    [
      'name'        => '松下紗栄子',
      'image'       => 'https://i.pinimg.com/474x/29/92/05/299205d5af1438045829fb6dd4b05876.jpg',
      'person_id'   => 'e6a9df47-0d05-4ded-9b6a-ff28a2de26b4',
    ],
    [
      'name'        => '高橋しょう子',
      'image'       => 'https://i.pinimg.com/originals/04/16/36/041636f9c9a5d28306b83763e870817f.jpg',
      'person_id'   => '946916d1-89ef-4c70-a4cf-37a5d18dfee3',
    ],
    [
      'name'        => '波多野結衣',
      'image'       => 'https://pbs.twimg.com/media/D6Qti9pUcAIVDiO.jpg',
      'person_id'   => 'c23b0f04-ac7b-4c22-861b-44cb1ee60183',
    ],
    [
      'name'        => '桜空もも',
      'image'       => 'https://img.sirabee.com/wp-content/uploads/2018/04/sirabee20180407sakuramomo9.jpg',
      'person_id'   => '8a873aba-930a-4722-8703-bb2618d50dd7',
    ],
    [
      'name'        => '橋下ありな',
      'image'       => 'https://pbs.twimg.com/media/DkrOcZ5U4AA9gk6.jpg',
      'person_id'   => 'cc00f386-3504-491f-9974-daf4be0eae83',
    ],
    [
      'name'        => '鈴村あいり',
      'image'       => 'https://d2dcan0armyq93.cloudfront.net/photo/odai/600/e8712c287840680b9452ad4a7427af2c_600.jpg',
      'person_id'   => '28ce2c91-0ae9-4db2-aafa-afe49d943820',
    ],
    [
      'name'        => '桃乃木かな',
      'image'       => 'https://hominis.media/2018/12/images/mikami%26momonogi0003.jpg',
      'person_id'   => '3431fb31-dac4-44ab-bdb1-d4df8ab2a4dd',
    ],
    [
      'name'        => '君島みお',
      'image'       => 'https://pbs.twimg.com/media/D-sm0Y-VUAAROE0.jpg',
      'person_id'   => '6583acd7-6ecb-4b8f-8ebb-70c3ebea5d57',
    ],
    [
      'name'        => '上原亜衣',
      'image'       => 'https://pbs.twimg.com/media/Cbe3yecVIAAfcpw.jpg',
      'person_id'   => '21297ccc-a11e-4ec2-b2a0-bac85ff1dee4',
    ],
    [
      'name'        => 'JULIA',
      'image'       => 'https://pbs.twimg.com/profile_images/1053135247544471552/nbNsJPiN.jpg',
      'person_id'   => '401dde21-dcc3-4a3b-8a62-884d3f9a51b2',
    ],
    [
      'name'        => '天使もえ',
      'image'       => 'https://www.s1s1s1.com/contents/actress/1025419/1025419.jpg',
      'person_id'   => '74c99700-6996-4b51-9212-c1865264dfc4',
    ],
    [
      'name'        => '伊藤舞雪',
      'image'       => 'https://stat.ameba.jp/user_images/20191104/10/yoshikunyazo/ab/63/j/o0800116214631174143.jpg',
      'person_id'   => '4723f608-75aa-491c-9c8f-762210a0ed84',
    ],
    [
      'name'        => '吉沢明歩',
      'image'       => 'https://radio-chronicle.com/podcast/22/wp-content/uploads/powerpress/22_yoshizawa.jpg',
      'person_id'   => 'c253819d-88c2-4523-b407-06f4620617a8',
    ],
    [
      'name'        => '蓮実クレア',
      'image'       => 'https://i.pinimg.com/originals/f4/d3/2a/f4d32a46aa59b2b493a3d3c29484830e.jpg',
      'person_id'   => 'f582baac-9b3c-4700-9e8b-4d6baa1e22b1',
    ],
    [
      'name'        => 'あやみ旬果',
      'image'       => 'https://data.smart-flash.jp/wp-content/uploads/2019/01/24154952/ayami_1.jpg',
      'person_id'   => '7fbe5f6d-0cdc-45ed-a9e7-2e8a683d791b',
    ],
    [
      'name'        => '石原莉奈',
      'image'       => 'https://i.pinimg.com/originals/30/f4/86/30f4869d100ec8bec60bf19569a2ce2d.jpg',
      'person_id'   => '09792a0b-0b88-4b70-9e37-796cf55a59fe',
    ],
    [
      'name'        => '小島みなみ',
      'image'       => 'https://scdn.line-apps.com/stf/linenews-issue-830/item-2184844/6f535b32342e1f68ff0d14c35305929640d466cd.jpeg',
      'person_id'   => '0591385c-2979-4c34-aa44-0399c1951064',
    ],
    [
      'name'        => '相沢みなみ',
      'image'       => 'https://livedoor.blogimg.jp/orustak/imgs/f/7/f7ce8f8d.jpg',
      'person_id'   => '10aeced9-a08e-4e18-99d3-37e2848042ad',
    ],
    [
      'name'        => '風間ゆみ',
      'image'       => 'https://i.pinimg.com/originals/00/88/ad/0088ad3702cb414446ef33031abd0749.jpg',
      'person_id'   => '99f20496-387d-4435-879e-4f342efa3bdf',
    ],
    [
      'name'        => '希崎ジェシカ',
      'image'       => 'https://t.livepocket.jp/image/ncoaGxSuTdZfcmsR8VDNeVbPPK8CmQ0iyDzu42E624eIHHiWW00RNaDtcZqDwNGu',
      'person_id'   => '4ce115a0-4927-4023-9705-e4b92b7df19a',
    ],
    [
      'name'        => '白石茉莉奈',
      'image'       => 'https://m.media-amazon.com/images/I/91VQN3zrrJL._SS500_.jpg',
      'person_id'   => 'a684d697-ae7c-47be-a73c-f39a9c5ce64b',
    ],
    [
      'name'        => '水野朝陽',
      'image'       => 'https://i.pinimg.com/originals/2f/48/6d/2f486d9d66e47fd077591ee9e9fa93e9.jpg',
      'person_id'   => 'fad99111-2262-4bd5-9f32-710f34bd0639',
    ],
    [
      'name'        => 'Rio',
      'image'       => 'https://eakindo.com/upload/save_image/04161658_5711f0ac5a4db.jpg',
      'person_id'   => '0a36cecc-2553-4e57-88e0-cf63ac86a95b',
    ],
    [
      'name'        => 'AIKA',
      'image'       => 'https://i.pinimg.com/originals/4f/c7/a7/4fc7a7c8a177fd62a8259500a9440464.jpg',
      'person_id'   => 'b85c8ebe-772f-4b07-9b89-05b20796f12c',
    ],
    [
      'name'        => '美谷朱里',
      'image'       => 'https://d2dcan0armyq93.cloudfront.net/photo/odai/600/cd20a156aab6766298f79479ab0b6002_600.jpg',
      'person_id'   => 'eea45fc0-b6a8-4bfa-876d-73dc78031559',
    ],
    [
      'name'        => '松永さな',
      'image'       => 'https://i.pinimg.com/564x/5f/59/41/5f594195d1f0f8f0071c9240c0e243a4.jpg',
      'person_id'   => '54c2e971-08d2-40d4-b46a-dab9585458f3',
    ],
    [
      'name'        => '松岡ちな',
      'image'       => 'https://i.pinimg.com/originals/53/ba/90/53ba902cc186bfa7fa82dbc396ae3a5c.jpg',
      'person_id'   => 'bdda44b2-924c-4cad-99a1-83ed372d5a00',
    ],
    [
      'name'        => '宇都宮しをん',
      'image'       => 'https://i.pinimg.com/originals/dc/cc/cf/dccccf0822e70ca803ee37784bf5bcc9.jpg',
      'person_id'   => 'b84f3c8a-9838-4d5c-9ddb-65b1ec68c74e',
    ],
    [
      'name'        => '天海つばさ',
      'image'       => 'https://i.pinimg.com/originals/c5/79/fb/c579fb2a750dc1d3443f37293f7f5f74.png',
      'person_id'   => '3eec38c4-803e-4815-a369-799828c1ea73',
    ],
    [
      'name'        => '吉川あいみ',
      'image'       => 'https://img.sokmil.com/image/product/pef_bau0519_01.jpg',
      'person_id'   => 'f04012d1-5039-4685-822f-46ef69fec6dc',
    ],
    [
      'name'        => '夢乃あいか',
      'image'       => 'https://livedoor.sp.blogimg.jp/lammtarra_tv/imgs/0/3/031a1885.jpg',
      'person_id'   => '93790e99-5d9e-4465-b4c5-0e052c38081b',
    ],
    [
      'name'        => '三浦恵理子',
      'image'       => 'https://img1.girl-secret.com/wp-content/uploads/2019/03/48442342d202ab61bf9bc25cb0208c52.jpg',
      'person_id'   => '90948b64-b84d-4a95-bb5e-9f0a950a6c97',
    ],
    [
      'name'        => '湊莉久',
      'image'       => 'https://stat.ameba.jp/user_images/20160115/00/sayaka-miyukilove/c6/d6/j/o0800116313541033419.jpg',
      'person_id'   => '8f18bd7d-24dc-41cc-b431-cc5d769406ec',
    ],
    [
      'name'        => '神宮寺ナオ',
      'image'       => 'https://i.pinimg.com/236x/cc/d2/ba/ccd2ba5802fe0ee4b539557d877af35f.jpg',
      'person_id'   => '4e1d1edd-7e7e-41fc-8712-5cfe98d0d42a',
    ],
    [
      'name'        => '古川いおり',
      'image'       => 'https://rr.img.naver.jp/mig?src=http%3A%2F%2F4.bp.blogspot.com%2F-b-hFocw-Mro%2FVFHy29MEsOI%2FAAAAAAAABPc%2FJRsY-g6ccXg%2Fs1600%2F1510-04s.jpg&twidth=1000&theight=0&qlt=80&res_format=jpg&op=r',
      'person_id'   => 'a7139615-efe2-4bbe-bbdf-89bef21b2bef',
    ],
    [
      'name'        => '希志あいの',
      'image'       => 'https://images-na.ssl-images-amazon.com/images/I/91LSdAsDU6L._AC_SL1500_.jpg',
      'person_id'   => '80f4db4c-c1c5-46cc-9a25-49ef6aeb99dd',
    ],
    [
      'name'        => '大槻ひびき',
      'image'       => 'https://i.pinimg.com/originals/64/78/10/647810ec3bc72eaa3f52903ab974799a.jpg',
      'person_id'   => 'e5362d2a-d4fa-45a6-92a9-dbba33505ddc',
    ],
    [
      'name'        => '園田みおん',
      'image'       => 'https://img.sirabee.com/wp/wp-content/uploads/2017/03/sirabee20170301sonodamion5-600x400.jpg',
      'person_id'   => '46eacd92-4285-4088-b304-ad80cc181499',
    ],
  ];

  public function getUnregisteredPersonInfo()
  {
    $UnregistNamePersons = [];
    $UnregistImagePersons = [];
    $allPerson = $this->getPersonList();
    foreach (self::ACTRESS_LIST as $key => $value) {
      $count = 0;
      foreach ($allPerson as $k => $val) {
        if (empty($val['persistedFaceIds'])) {
          $UnregistImagePersons[$k]['name'] = $val['name'];
          $UnregistImagePersons[$k]['person_id'] = $val['personId'];
          if ($value['name'] == $val['name']) {
            $UnregistImagePersons[$k]['image'] = $value['image'];
          }
        }
        if ($value['name'] == $val['name']) {
          $count ++;
        }
      }
      if ($count === 0) {
        $UnregistNamePersons[$key]['name'] = $value['name'];
        $UnregistNamePersons[$key]['image'] = $value['image'];
        $UnregistNamePersons[$key]['person_id'] = $value['person_id'];
      }
    }
    return [
      'unregist_name_persons'   => $UnregistNamePersons,
      'unregist_image_persons'  => $UnregistImagePersons,
    ];
  }

  /**
   * 登録している人物データを最大1000件返す
   * @return array
   */
  public static function getPersonList()
  {
    $request = new \HTTP_Request2(self::ENDPOINT . 'face/v1.0/persongroups/' . self::PERSON_GROUP_ID . '/persons');
    $url = $request->getUrl();

    $headers = array(
        // Request headers
        'Ocp-Apim-Subscription-Key' => self::KEY,
    );

    $request->setHeader($headers);

    $parameters = array(
        // Request parameters
        'start' => '',
        'top' => '1000',
    );

    $url->setQueryVariables($parameters);

    $request->setMethod(\HTTP_Request2::METHOD_GET);

    try
    {
        $response = $request->send();
        $personList = $response->getBody();
        return json_decode($personList, true);
    }
    catch (HttpException $ex)
    {
        echo $ex;
    }
  }
}