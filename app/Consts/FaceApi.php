<?php

namespace App\Consts;

class FaceApi
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
      'image'       => '',
      'person_id'   => 'cccbd305-f157-4aeb-9ee5-40a9803b26d2',
    ],
    [
      'name'        => '明日花キララ',
      'image'       => '',
      'person_id'   => '30af7176-af32-4db3-8dff-7552df1ed9cd',
    ],
    [
      'name'        => '深田えいみ',
      'image'       => '',
      'person_id'   => '3fb78eb0-e646-4d6d-bfb4-efb4ef94e0be',
    ],
    [
      'name'        => '麻美ゆま',
      'image'       => '',
      'person_id'   => '50825ecd-8b37-4e07-918a-fd1b1cfd2d99',
    ],
    [
      'name'        => '紗倉まな',
      'image'       => '',
      'person_id'   => 'd171df54-1777-44ed-9a9e-6a6714c4ff52',
    ],
    [
      'name'        => '葵つかさ',
      'image'       => '',
      'person_id'   => '01d32409-ec3a-4eed-9b83-10c508746bef',
    ],
    [
      'name'        => '松下紗栄子',
      'image'       => '',
      'person_id'   => 'e6a9df47-0d05-4ded-9b6a-ff28a2de26b4',
    ],
    [
      'name'        => '高橋しょうこ',
      'image'       => '',
      'person_id'   => '946916d1-89ef-4c70-a4cf-37a5d18dfee3',
    ],
    [
      'name'        => '波多野結衣',
      'image'       => '',
      'person_id'   => 'c23b0f04-ac7b-4c22-861b-44cb1ee60183',
    ],
    [
      'name'        => '桜空もも',
      'image'       => '',
      'person_id'   => '8a873aba-930a-4722-8703-bb2618d50dd7',
    ],
    [
      'name'        => '橋下ありな',
      'image'       => '',
      'person_id'   => 'cc00f386-3504-491f-9974-daf4be0eae83',
    ],
    [
      'name'        => '鈴村あいり',
      'image'       => '',
      'person_id'   => '28ce2c91-0ae9-4db2-aafa-afe49d943820',
    ],
    [
      'name'        => '桃乃木かな',
      'image'       => '',
      'person_id'   => '3431fb31-dac4-44ab-bdb1-d4df8ab2a4dd',
    ],
    [
      'name'        => '君島みお',
      'image'       => '',
      'person_id'   => '6583acd7-6ecb-4b8f-8ebb-70c3ebea5d57',
    ],
    [
      'name'        => '上原亜衣',
      'image'       => '',
      'person_id'   => '21297ccc-a11e-4ec2-b2a0-bac85ff1dee4',
    ],
    [
      'name'        => 'JULIA',
      'image'       => '',
      'person_id'   => '401dde21-dcc3-4a3b-8a62-884d3f9a51b2',
    ],
    [
      'name'        => '天使もえ',
      'image'       => '',
      'person_id'   => '74c99700-6996-4b51-9212-c1865264dfc4',
    ],
    [
      'name'        => '伊藤舞雪',
      'image'       => '',
      'person_id'   => '4723f608-75aa-491c-9c8f-762210a0ed84',
    ],
    [
      'name'        => '吉沢明歩',
      'image'       => '',
      'person_id'   => 'c253819d-88c2-4523-b407-06f4620617a8',
    ],
    [
      'name'        => '蓮実クレア',
      'image'       => '',
      'person_id'   => 'f582baac-9b3c-4700-9e8b-4d6baa1e22b1',
    ],
    [
      'name'        => 'あやみ旬果',
      'image'       => '',
      'person_id'   => '7fbe5f6d-0cdc-45ed-a9e7-2e8a683d791b',
    ],
    [
      'name'        => '石原莉奈',
      'image'       => '',
      'person_id'   => '09792a0b-0b88-4b70-9e37-796cf55a59fe',
    ],
    [
      'name'        => '小島みなみ',
      'image'       => '',
      'person_id'   => '0591385c-2979-4c34-aa44-0399c1951064',
    ],
    [
      'name'        => '相沢みなみ',
      'image'       => '',
      'person_id'   => '10aeced9-a08e-4e18-99d3-37e2848042ad',
    ],
    [
      'name'        => '風間ゆみ',
      'image'       => '',
      'person_id'   => '99f20496-387d-4435-879e-4f342efa3bdf',
    ],
    [
      'name'        => '希崎ジェシカ',
      'image'       => '',
      'person_id'   => '4ce115a0-4927-4023-9705-e4b92b7df19a',
    ],
    [
      'name'        => '白石茉莉奈',
      'image'       => '',
      'person_id'   => 'a684d697-ae7c-47be-a73c-f39a9c5ce64b',
    ],
    [
      'name'        => '水野朝陽',
      'image'       => '',
      'person_id'   => 'fad99111-2262-4bd5-9f32-710f34bd0639',
    ],
    [
      'name'        => 'Rio',
      'image'       => '',
      'person_id'   => '0a36cecc-2553-4e57-88e0-cf63ac86a95b',
    ],
    [
      'name'        => 'AIKA',
      'image'       => '',
      'person_id'   => 'b85c8ebe-772f-4b07-9b89-05b20796f12c',
    ],
    [
      'name'        => '美谷朱里',
      'image'       => '',
      'person_id'   => 'eea45fc0-b6a8-4bfa-876d-73dc78031559',
    ],
    [
      'name'        => '松永さな',
      'image'       => '',
      'person_id'   => '54c2e971-08d2-40d4-b46a-dab9585458f3',
    ],
    [
      'name'        => '松岡ちな',
      'image'       => '',
      'person_id'   => 'bdda44b2-924c-4cad-99a1-83ed372d5a00',
    ],
    [
      'name'        => '宇都宮しをん',
      'image'       => '',
      'person_id'   => 'b84f3c8a-9838-4d5c-9ddb-65b1ec68c74e',
    ],
    [
      'name'        => '天海つばさ',
      'image'       => '',
      'person_id'   => '3eec38c4-803e-4815-a369-799828c1ea73',
    ],
    [
      'name'        => '吉川あいみ',
      'image'       => '',
      'person_id'   => 'f04012d1-5039-4685-822f-46ef69fec6dc',
    ],
    [
      'name'        => '夢乃あいか',
      'image'       => '',
      'person_id'   => '93790e99-5d9e-4465-b4c5-0e052c38081b',
    ],
    [
      'name'        => '三浦恵理子',
      'image'       => '',
      'person_id'   => '90948b64-b84d-4a95-bb5e-9f0a950a6c97',
    ],
    [
      'name'        => '湊莉久',
      'image'       => '',
      'person_id'   => '8f18bd7d-24dc-41cc-b431-cc5d769406ec',
    ],
    [
      'name'        => '神宮寺ナオ',
      'image'       => '',
      'person_id'   => '4e1d1edd-7e7e-41fc-8712-5cfe98d0d42a',
    ],
    [
      'name'        => '古川いおり',
      'image'       => '',
      'person_id'   => 'a7139615-efe2-4bbe-bbdf-89bef21b2bef',
    ],
    [
      'name'        => '希志あいの',
      'image'       => '',
      'person_id'   => '80f4db4c-c1c5-46cc-9a25-49ef6aeb99dd',
    ],
  ];

  public static function getPersonInfo()
  {
    $UnregisteredPersonInfo = [];
    $RegisteredPersonInfo = [];
    foreach (self::ACTRESS_LIST as $key => $val) {
      if (empty($val['person_id'])) {
        $UnregisteredPersonInfo[$key]['name'] = $val['name'];
        $UnregisteredPersonInfo[$key]['image'] = $val['image'];
        $UnregisteredPersonInfo[$key]['person_id'] = $val['person_id'];
      } else {
        $RegisteredPersonInfo[$key]['name']       = $val['name'];
        $RegisteredPersonInfo[$key]['image']      = $val['image'];
        $RegisteredPersonInfo[$key]['person_id']  = $val['person_id'];
      }
    }
    return [
      'registered_person_info'    => $RegisteredPersonInfo, 
      'unregistered_person_info'  => $UnregisteredPersonInfo,
    ];
  }
}