<?php

use yii\db\Migration;

/**
 * Handles the creation of table `ingredients`.
 */
class m170510_202437_create_ingredients_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('ingredients', [
            'id' => $this->primaryKey(),
            'name'=>$this->string()->notNull(),
            'is_hide'=>$this->boolean()->defaultValue(false)
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('ingredients');
    }
}
