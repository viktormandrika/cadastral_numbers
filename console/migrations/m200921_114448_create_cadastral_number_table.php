<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cadastral_number}}`.
 */
class m200921_114448_create_cadastral_number_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            '{{%cadastral_number}}',
            [
                'id' => $this->primaryKey(),
                'cadastralNumber' => $this->string()->notNull()->unique()->comment( 'Кадастровый номер' ),
                'address' => $this->string()->notNull()->comment( 'Адрес' ),
                'price' => $this->decimal( 10, 4 )->notNull()->comment( 'Цена' ),
                'area' => $this->decimal( 10, 4 )->notNull()->comment( 'Площадь' )
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable( '{{%cadastral_number}}' );
    }
}
