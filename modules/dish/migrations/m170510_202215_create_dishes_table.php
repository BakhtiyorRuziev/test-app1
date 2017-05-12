<?php

use yii\db\Migration;

/**
 * Handles the creation of table `dishes`.
 */
class m170510_202215_create_dishes_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('dishes', [
            'id' => $this->primaryKey(),
            'name'=>$this->string()->notNull()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('dishes');
    }
}
