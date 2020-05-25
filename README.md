## Тестовое задание для ЭБК

Сделано на Yii2, из шаблона basic.

### Консольная команда

`php yii divide-array --array=[1,2,3] --number=1 --userid=1`

В ответ выводится найденный индекс или -1.

### API

`POST /divide`

Тело запроса:
```json
{
    "array": [1, 2, 3],
    "number": 1
}
```

Для авторизации используется HTTP Bearer, тестовый пользователь ebc создается в одной из миграций сразу с токеном.

Пример ответа:
```json
{
    "index": -1
}
```