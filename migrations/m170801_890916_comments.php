<?php

use yii\db\Migration;

class m170801_890916_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        // 评论表
        $this->createTable('{{%comment}}', [
            'id' => $this->primaryKey(),
			'parent_id' => $this->integer()->notNull()->defaultValue(0),
			'user_id' => $this->integer()->notNull(),
			'user_agent' => $this->string()->notNull(),
            'content' => $this->string()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
			'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        // 投票表
        $this->createTable('{{%vote}}', [
            'id' => $this->primaryKey(),
			'comment_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'score' => $this->smallInteger()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%comment}}');
		$this->dropTable('{{%vote}}');
    }
}
