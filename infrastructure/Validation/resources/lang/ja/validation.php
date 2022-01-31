<?php 

return [
    /*
    |--------------------------------------------------------------------------
    | バリデーションの言語行
    |--------------------------------------------------------------------------
    |
    | 次の言語行には、バリデータクラスで使用されるデフォルトの
    | エラーメッセージが含まれています。これらのルールの一部には、
    | サイズルールなどの複数のバージョンがあります。
    | ここでこれらの各メッセージを自由に調整してください。
    |
    */

    'accepted' => ':attributeを承認してください。',
    'active_url' => ':attributeには有効なURLを指定してください。',
    'after' => ':attributeには:date以降の日付を指定してください。',
    'after_or_equal' => ':attributeには:dateかそれ以降の日付を指定してください。',
    'alpha' => ':attributeには英字のみからなる文字列を指定してください。',
    'alpha_dash' => ':attributeには英数字・ハイフン・アンダースコアのみからなる文字列を指定してください。',
    'alpha_num' => ':attributeには英数字のみからなる文字列を指定してください。',
    'array' => ':attributeには配列を指定してください。',
    'before' => ':attributeには:date以前の日付を指定してください。',
    'before_or_equal' => ':attributeには:dateかそれ以前の日付を指定してください。',
    'between' => [
        'numeric' => ':attributeには:min〜:maxまでの数値を指定してください。',
        'file' => ':attributeには:min〜:max KBのファイルを指定してください。',
        'string' => ':attributeには:min〜:max文字の文字列を指定してください。',
        'array' => ':attributeには:min〜:max個の要素を持つ配列を指定してください。',
    ],
    'boolean' => ':attributeには真偽値を指定してください。',
    'confirmed' => ':attributeが確認用の値と一致しません。',
    'date' => ':attributeは有効な日付ではありません。',
    'date_equals' => ':attributeは:dateと同じ日付でなければなりません。',
    'date_format' => ':attributeは:format形式と一致しません。',
    'different' => ':attributeには:otherとは異なる値を指定してください。',
    'digits' => ':attributeは:digits桁の数字でなければなりません。',
    'digits_between' => ':attributeは:min〜:max桁の数字である必要があります。',
    'dimensions' => ':attributeの画像サイズが無効です。',
    'distinct' => ':attributeに指定された値は重複しています。',
    'email' => ':attributeは有効なメールアドレスでなければなりません。',
    'ends_with' => ':attributeは、:valuesのいずれかで終了する必要があります。',
    'exists' => '選択された:attributeは無効です。',
    'file' => ':attributeはファイルでなければなりません。',
    'filled' => ':attributeには値が必要です。',
    'gt' => [
        'numeric' => ':attributeは:valueより大きくなければなりません。',
        'file' => ':attributeは:valueキロバイトより大きくなければなりません。',
        'string' => ':attributeは:value文字より大きくなければなりません。',
        'array' => ':attributeには:valueより多くのアイテムが必要です。',
    ],
    'gte' => [
        'numeric' => ':attributeは:value以上でなければなりません。',
        'file' => ':attributeは:valueキロバイト以上でなければなりません。',
        'string' => ':attributeは:value文字以上でなければなりません。',
        'array' => ':attributeには:value以上のアイテムが必要です。',
    ],
    'image' => ':attributeは画像でなければなりません。',
    'in' => '選択された:attributeは無効です。',
    'in_array' => ':attributeは:otherに存在しません。',
    'integer' => ':attributeは整数でなければなりません。',
    'ip' => ':attributeは有効なIPアドレスでなければなりません。',
    'ipv4' => ':attributeは有効なIPv4アドレスでなければなりません。',
    'ipv6' => ':attributeは有効なIPv6アドレスでなければなりません。',
    'json' => ':attributeは有効なJSON文字列でなければなりません。',
    'lt' => [
        'numeric' => ':attributeは:valueより小さくなければなりません。',
        'file' => ':attributeは:valueキロバイトより小さくなければなりません。',
        'string' => ':attributeは:value文字より小さくなければなりません。',
        'array' => ':attributeには:valueより少ないアイテムが必要です。',
    ],
    'lte' => [
        'numeric' => ':attributeは:value以下でなければなりません。',
        'file' => ':attributeは:valueキロバイト以下でなければなりません。',
        'string' => ':attributeは:value文字以下でなければなりません。',
        'array' => ':attributeには:value以下のアイテムが必要です。',
    ],
    'max' => [
        'numeric' => ':attributeは:maxより大きくてはいけません。',
        'file' => ':attributeは:maxキロバイトを超えてはいけません。',
        'string' => ':attributeは:max文字を超えてはいけません。',
        'array' => ':attributeには:max個を超えるアイテムを含めることはできません。',
    ],
    'mimes' => ':attributeは:valuesタイプのファイルでなければなりません。',
    'mimetypes' => ':attributeは:valuesタイプのファイルでなければなりません。',
    'min' => [
        'numeric' => ':attributeは:maxより小さくてはいけません。',
        'file' => ':attributeは:maxキロバイトより小さくてはいけません。',
        'string' => ':attributeは:max文字より小さくてはいけません。',
        'array' => ':attributeには少なくとも:min個のアイテムが必要です。',
    ],
    'multiple_of' => ':attributeは:valueの倍数である必要があります。',
    'not_in' => '選択された:attributeは無効です。',
    'not_regex' => ':attributeは無効な形式です。',
    'numeric' => ':attributeは数値でなければなりません。',
    'password' => 'パスワードが間違っています。',
    'present' => ':attributeが存在する必要があります。',
    'regex' => ':attributeは無効な形式です。',
    'required' => ':attributeは必須です。',
    'required_if' => ':otherが:valueの場合、:attributeは必須です。',
    'required_unless' => ':otherが:valueではない場合、:attributeは必須です。',
    'required_with' => ':valuesのうち一つでも存在する場合、:attributeは必須です。',
    'required_with_all' => ':valuesのうち全て存在する場合、:attributeは必須です。',
    'required_without' => ':valuesのうちどれか一つでも存在していない場合、:attributeは必須です。',
    'required_without_all' => ':valuesのうち全て存在していない場合、:attributeは必須です。',
    'prohibited' => ':attributeは禁止されています。',
    'prohibited_if' => ':otherが:valueの場合、:attributeは禁止されています。',
    'prohibited_unless' => ':otherが:valuesにない限り、:attributeは禁止されています。',
    'same' => ':attributeと:otherは一致する必要があります。',
    'size' => [
        'numeric' => ':attributeは:sizeでなければなりません。',
        'file' => ':attributeは:sizeキロバイトでなければなりません。',
        'string' => ':attributeは:size文字でなければなりません。',
        'array' => ':attributeには:sizeが含まれている必要があります。',
    ],
    'starts_with' => ':attributeは:valuesのいずれかで始まる必要があります。',
    'string' => ':attributeは文字列でなければなりません。',
    'timezone' => ':attributeは有効なタイムゾーンでなければなりません。',
    'unique' => ':attributeはすでに使用されています。',
    'uploaded' => ':attributeのアップロードに失敗しました。',
    'url' => ':attributeは無効な形式です。',
    'uuid' => ':attributeは有効なUUIDでなければなりません。',

    /*
    |--------------------------------------------------------------------------
    | カスタムバリデーションの言語行
    |--------------------------------------------------------------------------
    |
    | ここでは、「attribute.rule」という規則を使用して行に名前を付けて、
    | 属性のカスタム検証メッセージを指定できます。 これにより、特定の属性ルールに
    | 特定のカスタム言語行をすばやく指定できます。
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | カスタムバリデーション属性
    |--------------------------------------------------------------------------
    |
    | 次の言語行を使用して、属性プレースホルダーを「email」ではなく「E-Mail Address」などの
    | 読みやすいものに置き換えます。 これは単にメッセージをより表現力豊かにするのに役立ちます。
    |
    */

    'attributes' => [
        'kana_name' => 'かな氏名',
        'kanji_name' => '漢字氏名',
        'kana_address' => 'かな住所',
        'kanji_address' => '漢字住所',
        'birthday' => '生年月日',
        'postal_code' => '郵便番号',
        'prefecture' => '都道府県',
        'phone' => '電話番号',
        'station_line' => '最寄駅線',
        'station_name' => '最寄駅名',
        'station_time' => '最寄駅までの移動時間',
        'gender' => '性別',
        'married' => '配偶者の有無',
        'children' => '扶養家族',
        'educational_background_id' => '学歴',
        'faculty1_id' => '学部1',
        'faculty2_id' => '学部2',
        'school_name' => '学校名',
        'graduation_subject' => '学科名',
        'graduation_date' => '卒業年月日',
        'avatar_id' => 'アバター',
        'drive_license' => '普通自動車免許',
        'pr' => '自己PR',
        'introducted' => '推薦状フラグ',
        'work_number' => '転職回数',
        'job_change_experience' => '転職経験',
        'employment_status_id' => '就業状況',
        'recommendation_letters' => '推薦状',
        'recommendation_letters.*' => '推薦状',
        'certificates' => '証明書',
        'zipcode' => '郵便番号',
        'experiences' => 'Experiences',
        'experiences.*.id' => 'Experiences',
        'experiences.*.value' => 'Experiences',
        'category_id' => 'Category',
        'start_date' => 'Start date',
        'end_date' => 'End date',
        'job-criterial.desired_contract_periods_ids' => '契約期間',
        'job-criterial.employment_status_ids' => '雇用形態',
        'job-criterial.first_shift_work_time_from' => '交替１From',
        'job-criterial.first_shift_work_time_to' => '交替１To',
        'job-criterial.second_shift_work_time_from' => '交替２From',
        'job-criterial.second_shift_work_time_to' => '交替２To',
        'job-criterial.third_shift_work_time_from' => '交替３From',
        'job-criterial.third_shift_work_time_to' => '交替３To',
        'job-criterial.working_system_ids' => '勤務体制',
        'job-criterial.monthly_salary_from_id' => '月給From',
        'job-criterial.monthly_salary_to_id' => '月給To',
        'job-criterial.monthly_salary_from_value' => '年収From',
        'job-criterial.monthly_salary_to_value' => '年収To',
        'job-criterial.annual_income_from_id' => '年収From',
        'job-criterial.annual_income_to_id' => '年収To',
        'job-criterial.annual_income_from_value' => '年収From',
        'job-criterial.annual_income_to_value' => '年収To',
        'job-criterial.preferred_workplace_ids' => '希望勤務地',
        'job-criterial.start_time' => '始業時刻',
        'job-criterial.end_time' => '終業時刻',
        'job-criterial.number_holiday_per_year_id' => '年間休日日数',
        'job-criterial.passive_smoking_state_id' => '受動喫煙の状況',
        'job-criterial.language_ids' => '使用言語',
    ],
];
