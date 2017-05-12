<?php

use yii\db\Migration;

/**
 * Handles the creation of table `dish_ingredients`.
 */
class m170510_202530_create_dish_ingredients_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('dish_ingredients', [
            'id' => $this->primaryKey(),
            'dish_id'=>$this->integer()->notNull(),
            'ingredient_id'=>$this->integer()->notNull(),
        ]);

        $this->createIndex("idx_dish_id-ingredient_id", 'dish_ingredients', ['dish_id','ingredient_id']);
        $this->addForeignKey("dish_id_fk", 'dish_ingredients','dish_id', 'dishes', 'id', "CASCADE");
        $this->addForeignKey("ingredient_id_fk", 'dish_ingredients','ingredient_id', 'ingredients', 'id', "CASCADE");
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('dish_ingredients');
    }
}
