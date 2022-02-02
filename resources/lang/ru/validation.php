<?php

/*
|--------------------------------------------------------------------------
| Validation Language Lines
|--------------------------------------------------------------------------
|
| The following language lines contain the default error messages used by
| the validator class. Some of these rules have multiple versions such
| as the size rules. Feel free to tweak each of these messages here.
|
*/

return [
  'accepted'             => 'Вы должны принять .',
  'accepted_if'          => 'Поле  должно быть принято, когда :other соответствует :value.',
  'active_url'           => 'Поле  содержит недействительный URL.',
  'after'                => 'В поле  должна быть дата больше :date.',
  'after_or_equal'       => 'В поле  должна быть дата больше или равняться :date.',
  'alpha'                => 'Поле  может содержать только буквы.',
  'alpha_dash'           => 'Поле  может содержать только буквы, цифры, дефис и нижнее подчеркивание.',
  'alpha_num'            => 'Поле  может содержать только буквы и цифры.',
  'array'                => 'Поле  должно быть массивом.',
  'before'               => 'В поле  должна быть дата раньше :date.',
  'before_or_equal'      => 'В поле  должна быть дата раньше или равняться :date.',
  'between'              => [
    'array'   => 'Количество элементов в поле  должно быть между :min и :max.',
    'file'    => 'Размер файла в поле  должен быть между :min и :max Килобайт(а).',
    'numeric' => 'Значение поля  должно быть между :min и :max.',
    'string'  => 'Количество символов в поле  должно быть между :min и :max.',
  ],
  'boolean'              => 'Поле  должно иметь значение логического типа.',
  'confirmed'            => 'Поле  не совпадает с подтверждением.',
  'current_password'     => 'Поле  содержит некорректный пароль.',
  'date'                 => 'Поле  не является датой.',
  'date_equals'          => 'Поле  должно быть датой равной :date.',
  'date_format'          => 'Поле  не соответствует формату :format.',
  'declined'             => 'Поле  должно быть отклонено.',
  'declined_if'          => 'Поле  должно быть отклонено, когда :other равно :value.',
  'different'            => 'Поля  и :other должны различаться.',
  'digits'               => 'Длина цифрового поля  должна быть :digits.',
  'digits_between'       => 'Длина цифрового поля  должна быть между :min и :max.',
  'dimensions'           => 'Поле  имеет недопустимые размеры изображения.',
  'distinct'             => 'Поле  содержит повторяющееся значение.',
  'email'                => 'Поле  должно быть действительным электронным адресом.',
  'ends_with'            => 'Поле  должно заканчиваться одним из следующих значений: :values',
  'enum'                 => 'Выбранное значение для  некорректно.',
  'exists'               => 'Выбранное значение для  некорректно.',
  'file'                 => 'Поле  должно быть файлом.',
  'filled'               => 'Поле  обязательно для заполнения.',
  'gt'                   => [
    'array'   => 'Количество элементов в поле  должно быть больше :value.',
    'file'    => 'Размер файла в поле  должен быть больше :value Килобайт(а).',
    'numeric' => 'Значение поля  должно быть больше :value.',
    'string'  => 'Количество символов в поле  должно быть больше :value.',
  ],
  'gte'                  => [
    'array'   => 'Количество элементов в поле  должно быть :value или больше.',
    'file'    => 'Размер файла в поле  должен быть :value Килобайт(а) или больше.',
    'numeric' => 'Значение поля  должно быть :value или больше.',
    'string'  => 'Количество символов в поле  должно быть :value или больше.',
  ],
  'image'                => 'Поле  должно быть изображением.',
  'in'                   => 'Выбранное значение для  ошибочно.',
  'in_array'             => 'Поле  не существует в :other.',
  'integer'              => 'Поле  должно быть целым числом.',
  'ip'                   => 'Поле  должно быть действительным IP-адресом.',
  'ipv4'                 => 'Поле  должно быть действительным IPv4-адресом.',
  'ipv6'                 => 'Поле  должно быть действительным IPv6-адресом.',
  'json'                 => 'Поле  должно быть JSON строкой.',
  'lt'                   => [
    'array'   => 'Количество элементов в поле  должно быть меньше :value.',
    'file'    => 'Размер файла в поле  должен быть меньше :value Килобайт(а).',
    'numeric' => 'Значение поля  должно быть меньше :value.',
    'string'  => 'Количество символов в поле  должно быть меньше :value.',
  ],
  'lte'                  => [
    'array'   => 'Количество элементов в поле  должно быть :value или меньше.',
    'file'    => 'Размер файла в поле  должен быть :value Килобайт(а) или меньше.',
    'numeric' => 'Значение поля  должно быть :value или меньше.',
    'string'  => 'Количество символов в поле  должно быть :value или меньше.',
  ],
  'mac_address'          => 'Поле  должно содержать корректный MAC-адрес.',
  'max'                  => [
    'array'   => 'Количество элементов в поле  не может превышать :max.',
    'file'    => 'Размер файла в поле  не может быть больше :max Килобайт(а).',
    'numeric' => 'Значение поля  не может быть больше :max.',
    'string'  => 'Количество символов в поле  не может превышать :max.',
  ],
  'mimes'                => 'Поле  должно быть файлом одного из следующих типов: :values.',
  'mimetypes'            => 'Поле  должно быть файлом одного из следующих типов: :values.',
  'min'                  => [
    'array'   => 'Количество элементов в поле  должно быть не меньше :min.',
    'file'    => 'Размер файла в поле  должен быть не меньше :min Килобайт(а).',
    'numeric' => 'Значение поля  должно быть не меньше :min.',
    'string'  => 'Количество символов в поле  должно быть не меньше :min.',
  ],
  'multiple_of'          => 'Значение поля  должно быть кратным :value',
  'not_in'               => 'Выбранное значение для  ошибочно.',
  'not_regex'            => 'Выбранный формат для  ошибочный.',
  'numeric'              => 'Поле  должно быть числом.',
  'password'             => 'Неверный пароль.',
  'present'              => 'Поле  должно присутствовать.',
  'prohibited'           => 'Поле  запрещено.',
  'prohibited_if'        => 'Поле  запрещено, когда :other равно :value.',
  'prohibited_unless'    => 'Поле  запрещено, если :other не входит в :values.',
  'prohibits'            => 'Поле  запрещает присутствие :other.',
  'regex'                => 'Поле  имеет ошибочный формат.',
  'required'             => 'Поле  обязательно для заполнения.',
  'required_if'          => 'Поле  обязательно для заполнения, когда :other равно :value.',
  'required_unless'      => 'Поле  обязательно для заполнения, когда :other не равно :values.',
  'required_with'        => 'Поле  обязательно для заполнения, когда :values указано.',
  'required_with_all'    => 'Поле  обязательно для заполнения, когда :values указано.',
  'required_without'     => 'Поле  обязательно для заполнения, когда :values не указано.',
  'required_without_all' => 'Поле  обязательно для заполнения, когда ни одно из :values не указано.',
  'same'                 => 'Значения полей  и :other должны совпадать.',
  'size'                 => [
    'array'   => 'Количество элементов в поле  должно быть равным :size.',
    'file'    => 'Размер файла в поле  должен быть равен :size Килобайт(а).',
    'numeric' => 'Значение поля  должно быть равным :size.',
    'string'  => 'Количество символов в поле  должно быть равным :size.',
  ],
  'starts_with'          => 'Поле  должно начинаться из одного из следующих значений: :values',
  'string'               => 'Поле  должно быть строкой.',
  'timezone'             => 'Поле  должно быть действительным часовым поясом.',
  'unique'               => 'Такое значение поля  уже существует.',
  'uploaded'             => 'Загрузка поля  не удалась.',
  'url'                  => 'Поле  имеет ошибочный формат URL.',
  'uuid'                 => 'Поле  должно быть корректным UUID.',
  'custom'               => [
    'attribute-name' => [
      'rule-name' => 'custom-message',
    ],
  ],
];