<?php

return [
    'accepted'             => ':attributeを承認してください。',
    'active_url'           => ':attributeは有効なURLではありません。',
    'after'                => ':attributeは:date以降の日付にしてください。',
    'after_or_equal'       => ':attributeは:date以降の日付か同じ日付にしてください。',
    'alpha'                => ':attributeはアルファベットのみ使用できます。',
    'alpha_dash'           => ':attributeはアルファベット、数字、ダッシュ、アンダースコアのみ使用できます。',
    'alpha_num'            => ':attributeはアルファベットと数字のみ使用できます。',
    'array'                => ':attributeは配列でなければなりません。',
    'before'               => ':attributeは:date以前の日付にしてください。',
    'before_or_equal'      => ':attributeは:date以前の日付か同じ日付にしてください。',
    'between'              => [
        'numeric' => ':attributeは:minから:maxの間でなければなりません。',
        'file'    => ':attributeは:min KBから:max KBの間でなければなりません。',
        'string'  => ':attributeは:min文字から:max文字の間でなければなりません。',
        'array'   => ':attributeは:minから:maxのアイテムを含まなければなりません。',
    ],
    'boolean'              => ':attributeはtrueかfalseでなければなりません。',
    'confirmed'            => ':attribute確認用と一致していません。',
    'date'                 => ':attributeは有効な日付ではありません。',
    'date_equals'          => ':attributeは:dateと同じ日付でなければなりません。',
    'date_format'          => ':attributeは:format形式と一致していません。',
    'different'            => ':attributeと:otherは異なる必要があります。',
    'digits'               => ':attributeは:digits桁でなければなりません。',
    'digits_between'       => ':attributeは:min桁から:max桁の間でなければなりません。',
    'dimensions'           => ':attributeは無効な画像サイズです。',
    'distinct'             => ':attributeフィールドに重複した値があります。',
    'email'                => ':attributeは有効なメールアドレスでなければなりません。',
    'ends_with'            => ':attributeは以下のいずれかで終わる必要があります：:values。',
    'exists'               => '選択された:attributeは無効です。',
    'file'                 => ':attributeはファイルでなければなりません。',
    'filled'               => ':attributeフィールドは必須です。',
    'gt'                   => [
        'numeric' => ':attributeは:valueより大きくなければなりません。',
        'file'    => ':attributeは:valueキロバイトより大きくなければなりません。',
        'string'  => ':attributeは:value文字より大きくなければなりません。',
        'array'   => ':attributeは:value以上のアイテムを持っていなければなりません。',
    ],
    'gte'                  => [
        'numeric' => ':attributeは:value以上でなければなりません。',
        'file'    => ':attributeは:valueキロバイト以上でなければなりません。',
        'string'  => ':attributeは:value文字以上でなければなりません。',
        'array'   => ':attributeは:value以上のアイテムを持っていなければなりません。',
    ],
    'image'                => ':attributeは画像でなければなりません。',
    'in'                   => '選択された:attributeは無効です。',
    'in_array'             => ':attributeフィールドは:otherに存在しません。',
    'integer'              => ':attributeは整数でなければなりません。',
    'ip'                   => ':attributeは有効なIPアドレスでなければなりません。',
    'ipv4'                 => ':attributeは有効なIPv4アドレスでなければなりません。',
    'ipv6'                 => ':attributeは有効なIPv6アドレスでなければなりません。',
    'json'                 => ':attributeは有効なJSON文字列でなければなりません。',
    'lt'                   => [
        'numeric' => ':attributeは:valueより小さくなければなりません。',
        'file'    => ':attributeは:valueキロバイトより小さくなければなりません。',
        'string'  => ':attributeは:value文字より小さくなければなりません。',
        'array'   => ':attributeは:value以下のアイテムを持っていなければなりません。',
    ],
    'lte'                  => [
        'numeric' => ':attributeは:value以下でなければなりません。',
        'file'    => ':attributeは:valueキロバイト以下でなければなりません。',
        'string'  => ':attributeは:value文字以下でなければなりません。',
        'array'   => ':attributeは:value以下のアイテムを持っていなければなりません。',
    ],
    'max'                  => [
        'numeric' => ':attributeは:max以下でなければなりません。',
        'file'    => ':attributeは:maxキロバイト以下でなければなりません。',
        'string'  => ':attributeは:max文字以下でなければなりません。',
        'array'   => ':attributeは:max個以下のアイテムしか持てません。',
    ],
    'mimes'                => ':attributeは:valuesタイプのファイルでなければなりません。',
    'mimetypes'            => ':attributeは:valuesタイプのファイルでなければなりません。',
    'min'                  => [
        'numeric' => ':attributeは少なくとも:minでなければなりません。',
        'file'    => ':attributeは少なくとも:minキロバイトでなければなりません。',
        'string'  => ':attributeは少なくとも:min文字でなければなりません。',
        'array'   => ':attributeは少なくとも:min個のアイテムを持っていなければなりません。',
    ],
    'not_in'               => '選択された:attributeは無効です。',
    'not_regex'            => ':attributeの形式は無効です。',
    'numeric'              => ':attributeは数字でなければなりません。',
    'password'             => 'パスワードが正しくありません。',
    'present'              => ':attributeフィールドは存在していなければなりません。',
    'regex'                => ':attributeの形式は無効です。',
    'required'             => ':attributeフィールドは必須です。',
    'required_if'          => ':otherが:valueの場合、:attributeフィールドは必須です。',
    'required_unless'      => ':otherが:valuesでない限り、:attributeフィールドは必須です。',
    'required_with'        => ':valuesが存在する場合、:attributeフィールドは必須です。',
    'required_with_all'    => ':valuesが存在する場合、:attributeフィールドは必須です。',
    'required_without'     => ':valuesが存在しない場合、:attributeフィールドは必須です。',
    'required_without_all' => ':valuesが存在しない場合、:attributeフィールドは必須です。',
    'same'                 => ':attributeと:otherは一致していなければなりません。',
    'size'                 => [
        'numeric' => ':attributeは:sizeでなければなりません。',
        'file'    => ':attributeは:sizeキロバイトでなければなりません。',
        'string'  => ':attributeは:size文字でなければなりません。',
        'array'   => ':attributeは:size個のアイテムを含まなければなりません。',
    ],
    'starts_with'          => ':attributeは次のいずれかで始まる必要があります:values。',
    'string'               => ':attributeは文字列でなければなりません。',
    'timezone'             => ':attributeは有効なタイムゾーンでなければなりません。',
    'unique'               => ':attributeはすでに存在しています。',
    'uploaded'             => ':attributeのアップロードに失敗しました。',
    'url'                  => ':attributeは正しいURLの形式でなければなりません。',
    'uuid'                 => ':attributeは有効なUUIDでなければなりません。',
    'custom'               => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
    'attributes'           => [
        'email'    => 'メールアドレス',
        'password' => 'パスワード',
        'name'     => '名前',
        //post
        'spot'     => '留学地',
        'title'     => 'タイトル',
        'text'     => '内容',
        //comment
        'comment'     => 'コメント',

    ],
];
