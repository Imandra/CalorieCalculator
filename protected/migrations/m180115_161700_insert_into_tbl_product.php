<?php

class m180115_161700_insert_into_tbl_product extends CDbMigration
{
    public function up()
    {
        $json = '[
                      {
                        "name": "Брусника",
                        "proteins": 0.7,
                        "fats": 0.5,
                        "carbohydrates": 9.6,
                        "calories": 43
                      },
                      {
                        "name": "Клубника",
                        "proteins": 0.8,
                        "fats": 0.4,
                        "carbohydrates": 9.5,
                        "calories": 41
                      },
                      {
                        "name": "Смородина черная",
                        "proteins": 1.0,
                        "fats": 0.4,
                        "carbohydrates": 7.3,
                        "calories": 44
                      },
                      {
                        "name": "Облепиха",
                        "proteins": 1.2,
                        "fats": 5.4,
                        "carbohydrates": 5.7,
                        "calories": 82
                      },
                      {
                        "name": "Ананас",
                        "proteins": 0.4,
                        "fats": 0.2,
                        "carbohydrates": 10.6,
                        "calories": 49
                      },
                      {
                        "name": "Апельсин",
                        "proteins": 0.9,
                        "fats": 0.2,
                        "carbohydrates": 8.1,
                        "calories": 36
                      },
                      {
                        "name": "Арбуз",
                        "proteins": 0.6,
                        "fats": 0.1,
                        "carbohydrates": 5.8,
                        "calories": 25
                      },
                      {
                        "name": "Банан",
                        "proteins": 1.5,
                        "fats": 0.2,
                        "carbohydrates": 21.8,
                        "calories": 95
                      },
                      {
                        "name": "Вишня замороженная",
                        "proteins": 0.9,
                        "fats": 0.4,
                        "carbohydrates": 11.0,
                        "calories": 46
                      },
                      {
                        "name": "Грейпфрут",
                        "proteins": 0.7,
                        "fats": 0.2,
                        "carbohydrates": 6.5,
                        "calories": 29
                      },
                      {
                        "name": "Киви",
                        "proteins": 1.0,
                        "fats": 0.6,
                        "carbohydrates": 10.3,
                        "calories": 48
                      },
                      {
                        "name": "Лимон",
                        "proteins": 0.9,
                        "fats": 0.1,
                        "carbohydrates": 3.0,
                        "calories": 16
                      },
                      {
                        "name": "Манго",
                        "proteins": 0.5,
                        "fats": 0.3,
                        "carbohydrates": 11.5,
                        "calories": 67
                      },
                      {
                        "name": "Мандарин",
                        "proteins": 0.8,
                        "fats": 0.2,
                        "carbohydrates": 7.5,
                        "calories": 33
                      },
                      {
                        "name": "Персик",
                        "proteins": 0.9,
                        "fats": 0.1,
                        "carbohydrates": 11.3,
                        "calories": 46
                      },
                      {
                        "name": "Помело",
                        "proteins": 0.6,
                        "fats": 0.2,
                        "carbohydrates": 6.7,
                        "calories": 32
                      },
                      {
                        "name": "Слива",
                        "proteins": 0.8,
                        "fats": 0.3,
                        "carbohydrates": 9.6,
                        "calories": 42
                      },
                      {
                        "name": "Хурма",
                        "proteins": 0.5,
                        "fats": 0.3,
                        "carbohydrates": 15.3,
                        "calories": 66
                      },
                      {
                        "name": "Яблоко Голден",
                        "proteins": 0.5,
                        "fats": 0.2,
                        "carbohydrates": 10.7,
                        "calories": 53
                      },
                      {
                        "name": "Сыр Адыгейский",
                        "proteins": 18.5,
                        "fats": 14.0,
                        "carbohydrates": 0,
                        "calories": 240
                      },
                      {
                        "name": "Сыр Маасдам",
                        "proteins": 23.5,
                        "fats": 26.0,
                        "carbohydrates": 0,
                        "calories": 250
                      },
                      {
                        "name": "Сыр Маскарпоне",
                        "proteins": 4.8,
                        "fats": 41.5,
                        "carbohydrates": 4.8,
                        "calories": 412
                      },
                      {
                        "name": "Сыр Сиртаки",
                        "proteins": 10.0,
                        "fats": 17.0,
                        "carbohydrates": 8.0,
                        "calories": 225
                      },
                      {
                        "name": "Сыр Фета",
                        "proteins": 17.0,
                        "fats": 24.0,
                        "carbohydrates": 0,
                        "calories": 290
                      },
                      {
                        "name": "Творог 5%",
                        "proteins": 17.2,
                        "fats": 5.0,
                        "carbohydrates": 1.8,
                        "calories": 225
                      },
                      {
                        "name": "Арахис",
                        "proteins": 26.3,
                        "fats": 45.2,
                        "carbohydrates": 9.9,
                        "calories": 622
                      },
                      {
                        "name": "Вишня вяленая",
                        "proteins": 1.5,
                        "fats": 0,
                        "carbohydrates": 73.0,
                        "calories": 290
                      },
                      {
                        "name": "Грецкий орех",
                        "proteins": 15.2,
                        "fats": 65.2,
                        "carbohydrates": 7.0,
                        "calories": 654
                      },
                      {
                        "name": "Изюм",
                        "proteins": 2.9,
                        "fats": 0.6,
                        "carbohydrates": 66.0,
                        "calories": 264
                      },
                      {
                        "name": "Инжир",
                        "proteins": 3.1,
                        "fats": 0.8,
                        "carbohydrates": 57.9,
                        "calories": 257
                      },
                      {
                        "name": "Кешью",
                        "proteins": 18.5,
                        "fats": 48.5,
                        "carbohydrates": 22.5,
                        "calories": 600
                      },
                      {
                        "name": "Кунжут",
                        "proteins": 19.4,
                        "fats": 48.7,
                        "carbohydrates": 12.2,
                        "calories": 565
                      },
                      {
                        "name": "Курага",
                        "proteins": 5.2,
                        "fats": 0.3,
                        "carbohydrates": 51.0,
                        "calories": 215
                      },
                      {
                        "name": "Мак",
                        "proteins": 17.5,
                        "fats": 47.5,
                        "carbohydrates": 2.0,
                        "calories": 505
                      },
                      {
                        "name": "Миндаль сладкий",
                        "proteins": 18.6,
                        "fats": 57.7,
                        "carbohydrates": 16.2,
                        "calories": 645
                      },
                      {
                        "name": "Семена льна",
                        "proteins": 18.3,
                        "fats": 42.2,
                        "carbohydrates": 28.9,
                        "calories": 534
                      },
                      {
                        "name": "Семена укропа",
                        "proteins": 16.0,
                        "fats": 14.5,
                        "carbohydrates": 55.1,
                        "calories": 305
                      },
                      {
                        "name": "Семена чиа",
                        "proteins": 16.5,
                        "fats": 30.7,
                        "carbohydrates": 42.1,
                        "calories": 512
                      },
                      {
                        "name": "Семена тыквы",
                        "proteins": 24.5,
                        "fats": 45.8,
                        "carbohydrates": 4.7,
                        "calories": 556
                      },
                      {
                        "name": "Финики",
                        "proteins": 2.5,
                        "fats": 0.5,
                        "carbohydrates": 69.2,
                        "calories": 274
                      },
                      {
                        "name": "Фундук",
                        "proteins": 16.1,
                        "fats": 66.9,
                        "carbohydrates": 9.9,
                        "calories": 704
                      },
                      {
                        "name": "Чернослив",
                        "proteins": 2.3,
                        "fats": 0.7,
                        "carbohydrates": 57.5,
                        "calories": 231
                      },
                      {
                        "name": "Яблоки сушеные",
                        "proteins": 2.2,
                        "fats": 0.1,
                        "carbohydrates": 59.0,
                        "calories": 231
                      },
                      {
                        "name": "Ягоды годжи",
                        "proteins": 11.1,
                        "fats": 2.6,
                        "carbohydrates": 53.4,
                        "calories": 309
                      },  
                      {
                        "name": "Геркулес",
                        "proteins": 11.0,
                        "fats": 6.0,
                        "carbohydrates": 51.0,
                        "calories": 310
                      },  
                      {
                        "name": "Киноа",
                        "proteins": 14.1,
                        "fats": 6.1,
                        "carbohydrates": 57.2,
                        "calories": 368
                      },
                      {
                        "name": "Кус-кус",
                        "proteins": 3.8,
                        "fats": 0.2,
                        "carbohydrates": 21.8,
                        "calories": 112
                      },
                      {
                        "name": "Манная крупа",
                        "proteins": 10.3,
                        "fats": 1.0,
                        "carbohydrates": 67.4,
                        "calories": 328
                      },
                      {
                        "name": "Мюсли",
                        "proteins": 7.8,
                        "fats": 13.1,
                        "carbohydrates": 56.7,
                        "calories": 376
                      },
                      {
                        "name": "Пшено",
                        "proteins": 11.5,
                        "fats": 3.3,
                        "carbohydrates": 69.3,
                        "calories": 348
                      },
                      {
                        "name": "Рис белый",
                        "proteins": 6.7,
                        "fats": 0.7,
                        "carbohydrates": 78.9,
                        "calories": 344
                      },
                      {
                        "name": "Рис бурый",
                        "proteins": 7.4,
                        "fats": 1.8,
                        "carbohydrates": 72.9,
                        "calories": 337
                      },
                      {
                        "name": "Толокно",
                        "proteins": 12.5,
                        "fats": 6.0,
                        "carbohydrates": 64.9,
                        "calories": 363
                      },
                      {
                        "name": "Хлопья",
                        "proteins": 12.0,
                        "fats": 3.0,
                        "carbohydrates": 70.0,
                        "calories": 370
                      },
                      {
                        "name": "Арахисовое масло",
                        "proteins": 0,
                        "fats": 99.9,
                        "carbohydrates": 0,
                        "calories": 899
                      },
                      {
                        "name": "Горчичное масло",
                        "proteins": 0,
                        "fats": 99.8,
                        "carbohydrates": 0,
                        "calories": 898
                      },
                      {
                        "name": "Кунжутное масло",
                        "proteins": 0,
                        "fats": 99.9,
                        "carbohydrates": 0,
                        "calories": 899
                      },
                      {
                        "name": "Сливочное масло",
                        "proteins": 0.5,
                        "fats": 82.5,
                        "carbohydrates": 0.8,
                        "calories": 748
                      },
                      {
                        "name": "Топленое масло",
                        "proteins": 0.2,
                        "fats": 99.0,
                        "carbohydrates": 0,
                        "calories": 892
                      },
                      {
                        "name": "Кефир 1%",
                        "proteins": 2.8,
                        "fats": 1.0,
                        "carbohydrates": 4.0,
                        "calories": 40
                      },
                      {
                        "name": "Кефир 2%",
                        "proteins": 3.4,
                        "fats": 2.0,
                        "carbohydrates": 4.7,
                        "calories": 51
                      },
                      {
                        "name": "Кефир 2,5%",
                        "proteins": 2.8,
                        "fats": 2.5,
                        "carbohydrates": 3.9,
                        "calories": 50
                      },
                      {
                        "name": "Шоколадное молоко",
                        "proteins": 2.8,
                        "fats": 2.0,
                        "carbohydrates": 11.9,
                        "calories": 77
                      },
                      {
                        "name": "Мацони",
                        "proteins": 2.8,
                        "fats": 3.2,
                        "carbohydrates": 3.6,
                        "calories": 54
                      },
                      {
                        "name": "Молоко 2,5%",
                        "proteins": 2.8,
                        "fats": 2.5,
                        "carbohydrates": 4.7,
                        "calories": 52
                      },
                      {
                        "name": "Молоко сгущенное",
                        "proteins": 7.2,
                        "fats": 8.5,
                        "carbohydrates": 56.0,
                        "calories": 320
                      },
                      {
                        "name": "Молоко сухое",
                        "proteins": 26.0,
                        "fats": 25.0,
                        "carbohydrates": 37.5,
                        "calories": 476
                      },
                      {
                        "name": "Молоко топленое",
                        "proteins": 3.0,
                        "fats": 6.0,
                        "carbohydrates": 4.7,
                        "calories": 84
                      },
                      {
                        "name": "Ряженка 3,2%",
                        "proteins": 2.9,
                        "fats": 3.2,
                        "carbohydrates": 4.1,
                        "calories": 67
                      },
                      {
                        "name": "Сметана 20%",
                        "proteins": 2.8,
                        "fats": 20.0,
                        "carbohydrates": 3.7,
                        "calories": 205
                      },
                      {
                        "name": "Кабачок жареный",
                        "proteins": 1.1,
                        "fats": 6.0,
                        "carbohydrates": 6.7,
                        "calories": 88
                      },
                      {
                        "name": "Кабачок",
                        "proteins": 0.6,
                        "fats": 0.3,
                        "carbohydrates": 4.6,
                        "calories": 24
                      },
                      {
                        "name": "Капуста",
                        "proteins": 1.8,
                        "fats": 0.1,
                        "carbohydrates": 4.7,
                        "calories": 27
                      },
                      {
                        "name": "Капуста цветная",
                        "proteins": 2.5,
                        "fats": 0.3,
                        "carbohydrates": 5.4,
                        "calories": 30
                      },
                      {
                        "name": "Капуста брокколи",
                        "proteins": 3.0,
                        "fats": 0.4,
                        "carbohydrates": 5.2,
                        "calories": 28
                      },
                      {
                        "name": "Маслины",
                        "proteins": 2.2,
                        "fats": 10.5,
                        "carbohydrates": 5.1,
                        "calories": 166
                      },
                      {
                        "name": "Морковь",
                        "proteins": 1.3,
                        "fats": 0.1,
                        "carbohydrates": 4.5,
                        "calories": 20
                      },
                      {
                        "name": "Огурец",
                        "proteins": 0.8,
                        "fats": 0.1,
                        "carbohydrates": 2.8,
                        "calories": 15
                      },
                      {
                        "name": "Оливки",
                        "proteins": 0.8,
                        "fats": 10.7,
                        "carbohydrates": 6.3,
                        "calories": 115
                      },
                      {
                        "name": "Руккола",
                        "proteins": 2.6,
                        "fats": 0.7,
                        "carbohydrates": 2.1,
                        "calories": 25
                      },
                      {
                        "name": "Салат Айсберг",
                        "proteins": 0.9,
                        "fats": 0.1,
                        "carbohydrates": 1.8,
                        "calories": 14
                      },
                      {
                        "name": "Свекла",
                        "proteins": 1.5,
                        "fats": 0.1,
                        "carbohydrates": 8.8,
                        "calories": 43
                      },
                      {
                        "name": "Сельдерей",
                        "proteins": 0.9,
                        "fats": 0.1,
                        "carbohydrates": 2.1,
                        "calories": 12
                      },
                      {
                        "name": "Томат",
                        "proteins": 1.1,
                        "fats": 0.2,
                        "carbohydrates": 3.7,
                        "calories": 20
                      },
                      {
                        "name": "Тыква",
                        "proteins": 1.3,
                        "fats": 0.3,
                        "carbohydrates": 7.7,
                        "calories": 28
                      },
                      {
                        "name": "Укроп",
                        "proteins": 2.5,
                        "fats": 0.5,
                        "carbohydrates": 6.3,
                        "calories": 38
                      },
                      {
                        "name": "Фасоль стручковая",
                        "proteins": 2.0,
                        "fats": 0.2,
                        "carbohydrates": 3.6,
                        "calories": 24
                      },
                      {
                        "name": "Чечевица красная",
                        "proteins": 21.6,
                        "fats": 1.1,
                        "carbohydrates": 53.0,
                        "calories": 322
                      },
                      {
                        "name": "Шпинат",
                        "proteins": 2.9,
                        "fats": 0.3,
                        "carbohydrates": 2.0,
                        "calories": 22
                      }
                ]';
        $products = json_decode($json);
        foreach ($products as $product)
        {
            $this->insert('tbl_product', array(
                'name'=>$product->name, 'proteins'=>$product->proteins, 'fats'=>$product->fats,
                'carbohydrates'=>$product->carbohydrates, 'calories'=>$product->calories
            ));
        }
    }

    public function down()
    {
        echo "m180115_161700_insert_into_tbl_product does not support migration down.\n";
        return false;
    }

    /*
    // Use safeUp/safeDown to do migration with transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}